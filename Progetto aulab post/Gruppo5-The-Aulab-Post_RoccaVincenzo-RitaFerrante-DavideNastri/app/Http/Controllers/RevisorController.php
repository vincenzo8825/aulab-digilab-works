<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard()
    {
        // Articoli da revisionare
        $pending_articles = Article::where('is_accepted', NULL)->orderBy('created_at', 'desc')->get();
        
        // Articoli pubblicati
        $accepted_articles = Article::where('is_accepted', true)->orderBy('updated_at', 'desc')->get();
        
        // Articoli rifiutati
        $rejected_articles = Article::where('is_accepted', false)->orderBy('updated_at', 'desc')->get();
        
        // Calcola il numero totale di revisioni (accettate + rifiutate)
        $total_reviews = $accepted_articles->count() + $rejected_articles->count();
        
        return view('revisor.dashboard', compact(
            'pending_articles', 
            'accepted_articles', 
            'rejected_articles', 
            'total_reviews'
        ));
    }
    
    public function acceptArticle(Article $article)
    {
        // Aggiorniamo lo stato dell'articolo
        $article->is_accepted = true;
        $article->save();
        
        return redirect()->back()->with('message', 'Articolo approvato con successo');
    }
    
    public function rejectArticle(Article $article)
    {
        $article->update([
            'is_accepted' => false,
        ]);
        
        return redirect()->back()->with('message', 'Articolo rifiutato con successo');
    }
    
    public function revertToReview(Article $article)
    {
        // Impostiamo is_accepted a null per indicare che è in revisione
        $article->is_accepted = null; // Questo lo metterà negli articoli da revisionare
        $article->save();
        
        return redirect()->back()->with('message', 'Articolo rimesso in revisione con successo');
    }
}