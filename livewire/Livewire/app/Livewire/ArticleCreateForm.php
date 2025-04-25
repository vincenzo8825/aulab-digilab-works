<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleCreateForm extends Component
{

    public $title;
    public $subtitle;
    public $description;

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

    public function article_store()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        
        // Add the authenticated user's ID to the validated data
        $validated['user_id'] = auth()->id();
        
        // Create the article with all required fields
        Article::create($validated);
        
        // Reset the form fields
        $this->reset(['title', 'subtitle', 'description']);
        
        // Show success message
        session()->flash('message', 'Articolo creato con successo');
    }

    protected function clearForm(){
        $this->title = "";
        $this->subtitle = "";
        $this->description = "";
    }

    public function render()
    {
        return view('livewire.article-create-form');
    }
}
