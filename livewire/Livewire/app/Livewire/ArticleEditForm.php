<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ArticleEditForm extends Component
{
    use AuthorizesRequests;

    public $article;
    public $title;
    public $subtitle;
    public $description;

    public function mount(Article $article)
    {
        $this->authorize('update', $article);
        $this->article = $article;
        $this->title = $article->title;
        $this->subtitle = $article->subtitle;
        $this->description = $article->description;
    }

    public function update()
    {
        $this->authorize('update', $this->article);
        
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        
        $this->article->update($validated);
        
        session()->flash('success', 'Articolo aggiornato con successo');
        
        return redirect()->route('article_index');
    }

    public function render()
    {
        return view('livewire.article-edit-form');
    }
}

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

