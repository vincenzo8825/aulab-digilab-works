<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {

        $articles = Article::all();
        // dd($posts);
        // compact('posts');
        return view('welcome', ['articles'=>$articles]);
    }
}
