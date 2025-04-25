<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(Article $article)
    {
        $user = auth()->user();
        
        if ($user->favorites()->where('article_id', $article->id)->exists()) {
            $user->favorites()->detach($article);
            $message = 'Articolo rimosso dai preferiti';
        } else {
            $user->favorites()->attach($article);
            $message = 'Articolo aggiunto ai preferiti';
        }
        
        return back()->with('success', $message);
    }
    
    public function index()
    {
        $favorites = auth()->user()->favorites()->latest()->paginate(10);
        return view('favorites.index', compact('favorites'));
    }
}