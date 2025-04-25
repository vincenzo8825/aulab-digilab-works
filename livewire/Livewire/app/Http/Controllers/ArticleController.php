<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ArticleController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article', [
            'except' => ['index']
        ]);
    }
    
    public function index()
    {
        // If you're using a controller method, make sure it returns the correct view
        return view('article_index');
    }
    
    public function create()
    {
        return view('articles.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        
        // Add the authenticated user's ID
        $validated['user_id'] = auth()->id();
        
        // Create the article with all required fields
        Article::create($validated);
        
        return redirect()->route('article_index')->with('success', 'Articolo creato con successo');
    }
    
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }
    
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        
        $article->update($validated);
        
        return redirect()->route('article_index')->with('success', 'Articolo aggiornato con successo');
    }
    
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        
        $article->delete();
        
        return redirect()->route('article_index')->with('success', 'Articolo eliminato con successo');
    }
    
    public function show(Article $article)
    {
        $article->load(['reviews.user', 'favoritedBy']);
        return view('articles.show', compact('article'));
    }
}
