<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleUpdateForm extends Component
{
    public $article;
    public $title;
    public $subtitle;
    public $description;

    public function mount(){
        $this->title = $this->article->title;
        $this->subtitle = $this->article->subtitle;
        $this->description = $this->article->description;
    }

    protected $rules = [
        'title' => 'required',
        'subtitle' => 'required',
        'description' => 'required',
    ];

    protected $messages = [
        'title.required' => 'Il titolo è obbligatorio',
        'subtitle.required' => 'Il sottotitolo è obbligatorio',
        'description.required' => 'La descrizione è obbligatoria',
    ];

    public function article_update(){
        $this->article->update([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'description' => $this->description,
        ]);

    }
    public function delete($id)
{
    $article = Article::find($id);
    if ($article) {
        $article->delete();
        session()->flash('message', 'Articolo eliminato con successo!');
    }
}
    public function render()
    {
        return view('livewire.article-update-form');
    }
}
