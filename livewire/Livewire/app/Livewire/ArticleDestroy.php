<?php
namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleDestroy extends Component
{
    public $article;

    public function delete()
    {
        $this->article->delete();
        session()->flash('message', 'Articolo eliminato correttamente');
        return redirect()->route('article_index');
    }

    public function render()
    {
        return view('livewire.article-destroy');
    }
}

