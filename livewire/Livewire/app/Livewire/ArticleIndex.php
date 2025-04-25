<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleIndex extends Component
{

    public function updating(){
        $articles = Article::all();
    }

    public function render()
    {
        $articles = Article::with(['user', 'favoritedBy', 'reviews'])->latest()->get();
        return view('livewire.article-index', [
            'articles' => $articles
        ]);
    }
}
