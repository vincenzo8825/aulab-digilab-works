<x-layout>
    <x-slot name="sidebar">
        @include('components.sidebar')
    </x-slot>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Quiz: {{ $quiz->title }}</h2>
            <a href="{{ route('employee.courses.show', $course) }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Torna al corso
            </a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <h5 class="mb-2">Informazioni Quiz</h5>
                        <p class="mb-1"><strong>Punteggio minimo per superare:</strong> {{ $quiz->passing_score }}%</p>
                        <p class="mb-1"><strong>Tentativo:</strong> {{ $attemptsUsed + 1 }} di {{ $quiz->attempts_allowed }}</p>
                        <p class="mb-0"><strong>Domande totali:</strong> {{ $quiz->questions->count() }}</p>
                    </div>
                    <div>
                        <div class="d-flex align-items-center">
                            <div class="fs-5 me-2"><i class="fas fa-clock"></i></div>
                            <div id="timer" class="fs-4">
                                @if($quiz->time_limit)
                                    {{ $quiz->time_limit }}:00
                                @else
                                    --:--
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="progress mb-3">
                    <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div id="question-counter">Domanda 1 di {{ $quiz->questions->count() }}</div>
                    <div>
                        <button type="button" id="prev-btn" class="btn btn-outline-secondary me-2" disabled>Precedente</button>
                        <button type="button" id="next-btn" class="btn btn-outline-primary">Successiva</button>
                    </div>
                </div>
            </div>
        </div>

        <form action="{{ route('employee.courses.quiz.submit', $course) }}" method="POST" id="quizForm">
            @csrf

            @foreach($quiz->questions as $index => $question)
                <div class="card mb-4 question-card" id="question-{{ $question->id }}">
                    <div class="card-header">
                        <h5 class="mb-0">Domanda {{ $index + 1 }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <p class="mb-1"><strong>{{ $question->text }}</strong></p>
                            <small class="text-muted">Punti: {{ $question->points }}</small>
                        </div>

                        @if($question->type === 'multiple_choice')
                            <div class="mb-3">
                                <p class="mb-2 text-muted"><small>Seleziona tutte le risposte corrette</small></p>
                                @foreach($question->answers as $answer)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $answer->id }}" id="answer-{{ $answer->id }}">
                                        <label class="form-check-label" for="answer-{{ $answer->id }}">
                                            {{ $answer->text }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @elseif($question->type === 'single_choice')
                            <div class="mb-3">
                                <p class="mb-2 text-muted"><small>Seleziona la risposta corretta</small></p>
                                @foreach($question->answers as $answer)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}" id="answer-{{ $answer->id }}">
                                        <label class="form-check-label" for="answer-{{ $answer->id }}">
                                            {{ $answer->text }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @elseif($question->type === 'true_false')
                            <div class="mb-3">
                                <p class="mb-2 text-muted"><small>Seleziona vero o falso</small></p>
                                @foreach($question->answers as $answer)
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}" id="answer-{{ $answer->id }}">
                                        <label class="form-check-label" for="answer-{{ $answer->id }}">
                                            {{ $answer->text }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @elseif($question->type === 'text')
                            <div class="mb-3">
                                <p class="mb-2 text-muted"><small>Inserisci la tua risposta</small></p>
                                <div class="form-group">
                                    <textarea class="form-control" name="answers[{{ $question->id }}]" rows="3" placeholder="Scrivi la tua risposta qui"></textarea>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

            <div class="d-flex justify-content-between mb-4">
                <button type="button" class="btn btn-secondary" id="prev-question-bottom">
                    <i class="fas fa-arrow-left me-1"></i> Domanda precedente
                </button>

                <button type="button" class="btn btn-primary" id="next-question-bottom">
                    Domanda successiva <i class="fas fa-arrow-right ms-1"></i>
                </button>
            </div>

            <div class="card mb-4" id="submit-card" style="display: none;">
                <div class="card-body">
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Attenzione:</strong> Una volta inviato il quiz, non potrai tornare indietro.
                        Assicurati di aver risposto a tutte le domande.
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check-circle me-1"></i> Invia il quiz
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quizForm = document.getElementById('quizForm');
            const questionCards = document.querySelectorAll('.question-card');
            const progressBar = document.getElementById('progress-bar');
            const questionCounter = document.getElementById('question-counter');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const prevBtnBottom = document.getElementById('prev-question-bottom');
            const nextBtnBottom = document.getElementById('next-question-bottom');
            const submitCard = document.getElementById('submit-card');

            let currentQuestion = 0;
            const totalQuestions = questionCards.length;

            // Nascondi tutte le domande tranne la prima
            questionCards.forEach((card, index) => {
                if (index !== 0) {
                    card.style.display = 'none';
                }
            });

            // Aggiorna il contatore e la barra di avanzamento
            function updateUI() {
                // Aggiorna il contatore
                questionCounter.textContent = `Domanda ${currentQuestion + 1} di ${totalQuestions}`;

                // Abilita/disabilita i pulsanti
                prevBtn.disabled = currentQuestion === 0;
                prevBtnBottom.disabled = currentQuestion === 0;

                if (currentQuestion === totalQuestions - 1) {
                    nextBtn.style.display = 'none';
                    nextBtnBottom.style.display = 'none';
                    submitCard.style.display = 'block';
                } else {
                    nextBtn.style.display = 'block';
                    nextBtnBottom.style.display = 'block';
                    submitCard.style.display = 'none';
                }

                // Calcola e aggiorna la barra di avanzamento
                const progress = Math.round((currentQuestion + 1) / totalQuestions * 100);
                progressBar.style.width = `${progress}%`;
                progressBar.textContent = `${progress}%`;
                progressBar.setAttribute('aria-valuenow', progress);
            }

            // Funzione per passare alla domanda precedente
            function goToPrevQuestion() {
                if (currentQuestion > 0) {
                    questionCards[currentQuestion].style.display = 'none';
                    currentQuestion--;
                    questionCards[currentQuestion].style.display = 'block';
                    updateUI();
                }
            }

            // Funzione per passare alla domanda successiva
            function goToNextQuestion() {
                if (currentQuestion < totalQuestions - 1) {
                    questionCards[currentQuestion].style.display = 'none';
                    currentQuestion++;
                    questionCards[currentQuestion].style.display = 'block';
                    updateUI();
                }
            }

            // Eventi pulsanti
            prevBtn.addEventListener('click', goToPrevQuestion);
            nextBtn.addEventListener('click', goToNextQuestion);
            prevBtnBottom.addEventListener('click', goToPrevQuestion);
            nextBtnBottom.addEventListener('click', goToNextQuestion);

            // Timer per il quiz
            @if($quiz->time_limit)
                let timeLeft = {{ $quiz->time_limit * 60 }};
                const timerElement = document.getElementById('timer');

                const timer = setInterval(function() {
                    timeLeft--;

                    if (timeLeft <= 0) {
                        clearInterval(timer);
                        quizForm.submit();
                        return;
                    }

                    const minutes = Math.floor(timeLeft / 60);
                    const seconds = timeLeft % 60;
                    timerElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                    // Avviso quando mancano 5 minuti
                    if (timeLeft === 300) {
                        const alertDiv = document.createElement('div');
                        alertDiv.className = 'alert alert-warning alert-dismissible fade show';
                        alertDiv.innerHTML = `
                            <strong>Attenzione!</strong> Mancano solo 5 minuti alla fine del quiz.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        `;
                        document.querySelector('.container').insertBefore(alertDiv, document.querySelector('.card'));
                    }

                    // Cambia colore del timer negli ultimi 60 secondi
                    if (timeLeft <= 60) {
                        timerElement.classList.add('text-danger');
                    }
                }, 1000);
            @endif
        });
    </script>
    @endpush
</x-layout>
