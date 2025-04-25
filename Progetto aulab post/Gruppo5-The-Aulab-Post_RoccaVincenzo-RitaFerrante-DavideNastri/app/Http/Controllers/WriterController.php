<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriterController extends Controller
{
    public function dashboard()
    {
        $pendingArticles = Article::where('user_id', Auth::id())->whereNull('is_accepted')->get();
        $acceptedArticles = Article::where('user_id', Auth::id())->where('is_accepted', true)->get();
        $rejectedArticles = Article::where('user_id', Auth::id())->where('is_accepted', false)->get();
        
        return view('writer.dashboard', compact('pendingArticles', 'acceptedArticles', 'rejectedArticles'));
    }
}