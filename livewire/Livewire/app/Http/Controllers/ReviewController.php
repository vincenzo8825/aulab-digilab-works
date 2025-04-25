<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $validated = $request->validate([
            'content' => 'required|string|min:10',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $user = auth()->user();

        $existingReview = $user->reviews()->where('article_id', $article->id)->first();

        if ($existingReview) {
            return back()->with('error', 'Hai già recensito questo articolo');
        }

        $review = new Review([
            'content' => $validated['content'],
            'rating' => $validated['rating'],
            'user_id' => $user->id,
            'article_id' => $article->id,
        ]);

        $review->save();

        return back()->with('success', 'Recensione aggiunta con successo');
    }

    public function edit(Review $review)
    {
        $this->authorize('update', $review);

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);

        $validated = $request->validate([
            'content' => 'required|string|min:10',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review->update($validated);

        return redirect()->route('article_show', $review->article)->with('success', 'Recensione aggiornata con successo');
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);

        $review->delete();

        return back()->with('success', 'Recensione eliminata con successo');
    }

    public function userReviews()
    {
        $reviews = auth()->user()->reviews()->with('article')->latest()->paginate(10);
        return view('reviews.user', compact('reviews'));
    }
}
