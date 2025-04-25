<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\User;
use App\Models\UserQuiz;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{
    /**
     * Display the quiz for the user to take
     *
     * @param Course $course
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function take(Course $course)
    {
        $quiz = $course->quiz;

        if (!$quiz) {
            return redirect()->back()->with('error', 'Il corso non ha un quiz disponibile.');
        }

        // Controlla se l'utente ha già fatto il quiz e quanti tentativi ha fatto
        $userQuizzes = UserQuiz::where('user_id', Auth::id())
            ->where('quiz_id', $quiz->id)
            ->get();

        $attemptsUsed = $userQuizzes->count();
        $canTakeQuiz = $attemptsUsed < $quiz->attempts_allowed;
        $bestScore = $userQuizzes->max('score') ?? 0;
        $hasPassed = $bestScore >= $quiz->passing_score;

        if (!$canTakeQuiz && !$hasPassed) {
            return redirect()->back()->with('error', 'Hai esaurito i tentativi disponibili per questo quiz.');
        }

        // Carica il quiz con le domande e risposte
        $quiz->load(['questions' => function($query) {
            $query->with('answers');
        }]);

        return view('employee.courses.quiz.take', compact('course', 'quiz', 'attemptsUsed', 'canTakeQuiz', 'bestScore', 'hasPassed'));
    }

    /**
     * Submit quiz answers and calculate results
     *
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitAnswers(Request $request, Course $course)
    {
        $quiz = $course->quiz;

        if (!$quiz) {
            return redirect()->route('employee.courses.show', $course)
                ->with('error', 'Il corso non ha un quiz.');
        }

        // Valida che ci siano risposte
        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required',
        ]);

        // Carica il quiz con le domande e risposte corrette
        $quiz->load(['questions' => function($query) {
            $query->with(['answers' => function($query) {
                $query->where('is_correct', true);
            }]);
        }]);

        // Calcola il punteggio
        $totalPoints = $quiz->questions->sum('points');
        $earnedPoints = 0;
        $answersLog = [];
        $startTime = session('quiz_start_time');
        $timeSpent = $startTime ? Carbon::now()->diffInSeconds(Carbon::parse($startTime)) : 0;

        foreach ($quiz->questions as $question) {
            $questionId = $question->id;
            $userAnswer = $validated['answers'][$questionId] ?? null;

            // Salva le risposte dell'utente per riferimento futuro
            $answersLog[$questionId] = [
                'question_text' => $question->text,
                'question_type' => $question->type,
                'points' => $question->points,
                'user_answer' => $userAnswer,
                'correct_answers' => $question->answers->pluck('text')->toArray(),
                'is_correct' => false
            ];

            // Controlla se la risposta è corretta in base al tipo di domanda
            $isCorrect = false;

            switch ($question->type) {
                case 'multiple_choice':
                    // Per domande a scelta multipla, tutte le risposte selezionate devono essere corrette
                    $userAnswers = is_array($userAnswer) ? $userAnswer : [];
                    $correctAnswerIds = $question->answers->pluck('id')->toArray();
                    $isCorrect = count($userAnswers) === count($correctAnswerIds) &&
                                empty(array_diff($userAnswers, $correctAnswerIds));
                    break;

                case 'single_choice':
                case 'true_false':
                    // Per domande a scelta singola, la risposta deve corrispondere a una risposta corretta
                    $correctAnswerId = $question->answers->first()->id ?? null;
                    $isCorrect = $userAnswer == $correctAnswerId;
                    break;

                case 'text':
                    // Per domande di testo, controlla se la risposta contiene le parole chiave
                    // Questo è un approccio semplice, potrebbe essere migliorato in futuro
                    $userAnswerText = strtolower(trim($userAnswer));
                    $correctAnswerText = strtolower(trim($question->answers->first()->text ?? ''));

                    // Se la risposta corretta è vuota, consideriamo la risposta dell'utente come non corretta
                    if (empty($correctAnswerText)) {
                        $isCorrect = false;
                    } else {
                        // Possiamo implementare diverse strategie per il confronto del testo
                        // 1. Corrispondenza esatta
                        $isCorrect = $userAnswerText === $correctAnswerText;

                        // 2. Oppure verificare se contiene le parole chiave (opzionale)
                        if (!$isCorrect && strpos($userAnswerText, $correctAnswerText) !== false) {
                            $isCorrect = true;
                        }
                    }
                    break;
            }

            // Aggiorna il punteggio se la risposta è corretta
            if ($isCorrect) {
                $earnedPoints += $question->points;
                $answersLog[$questionId]['is_correct'] = true;
            }
        }

        // Calcola il punteggio percentuale
        $score = $totalPoints > 0 ? round(($earnedPoints / $totalPoints) * 100) : 0;
        $passed = $score >= $quiz->passing_score;

        // Salva il risultato del quiz
        $userQuiz = new UserQuiz([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
            'score' => $score,
            'passed' => $passed,
            'answers_log' => json_encode($answersLog),
            'time_spent' => $timeSpent,
            'completed_at' => now(),
        ]);

        $userQuiz->save();

        // Se l'utente ha superato il quiz, aggiorna lo stato del corso
        if ($passed) {
            DB::table('course_user')
                ->where('user_id', Auth::id())
                ->where('course_id', $course->id)
                ->update([
                    'status' => 'completed',
                    'completed_at' => now()
                ]);
        }

        return redirect()->route('employee.courses.quiz.results', ['course' => $course, 'userQuiz' => $userQuiz])
            ->with('success', 'Quiz completato con successo.');
    }

    /**
     * Display the results of a completed quiz
     *
     * @param Course $course
     * @return \Illuminate\View\View
     */
    public function showResults(Course $course)
    {
        $user = Auth::user();
        $quiz = $course->quiz;

        if (!$quiz) {
            return redirect()->route('employee.courses.show', $course)
                ->with('error', 'Questo corso non ha un quiz associato.');
        }

        $userQuiz = $quiz->userQuizzes()
            ->where('user_id', $user->id)
            ->latest('completed_at')
            ->first();

        if (!$userQuiz || !$userQuiz->completed_at) {
            return redirect()->route('employee.courses.show', $course)
                ->with('error', 'Non hai ancora completato il quiz.');
        }

        $attemptsUsed = $quiz->userQuizzes()
            ->where('user_id', $user->id)
            ->count();

        return view('employee.courses.quiz.results', [
            'course' => $course,
            'quiz' => $quiz,
            'userQuiz' => $userQuiz,
            'attemptsUsed' => $attemptsUsed
        ]);
    }
}
