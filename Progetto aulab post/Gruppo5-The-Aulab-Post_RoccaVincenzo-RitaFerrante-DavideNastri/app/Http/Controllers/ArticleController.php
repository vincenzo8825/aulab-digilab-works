<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Str;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ArticleController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'byCategory', 'byAuthor', 'articleSearch', 'byTag']);
    }

    public function index(Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            // Usa Scout per la ricerca
            $articlesQuery = Article::search($query);
            $allArticles = $articlesQuery->get()
                                 ->where('is_accepted', true)
                                 ->sortByDesc('created_at');
            
            // Converte in paginazione manualmente
            $page = request()->get('page', 1);
            $perPage = 6;
            $articles = new \Illuminate\Pagination\LengthAwarePaginator(
                $allArticles->forPage($page, $perPage),
                $allArticles->count(),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        } else {
            $articles = Article::where('is_accepted', true)
                              ->orderBy('created_at', 'desc')
                              ->paginate(6);
        }
        
        return view('article.index', compact('articles', 'query'));
    }

    public function byCategory(Category $category, Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            // Usa Scout per la ricerca
            $articlesQuery = Article::search($query);
            $articles = $articlesQuery->get()
                                 ->where('is_accepted', true)
                                 ->where('category_id', $category->id)
                                 ->sortByDesc('created_at');
            
            // Converte in paginazione
            $page = request()->get('page', 1);
            $perPage = 6;
            $articles = new \Illuminate\Pagination\LengthAwarePaginator(
                $articles->forPage($page, $perPage),
                $articles->count(),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        } else {
            $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(4);
        }
        
        $popularArticles = Article::where('is_accepted', true)
                                ->orderBy('created_at', 'desc')
                                ->take(3)
                                ->get();
        
        $allCategories = Category::withCount(['articles' => function($query) {
            $query->where('is_accepted', true);
        }])->get();
        
        return view('article.by-category', compact('category', 'articles', 'popularArticles', 'allCategories', 'query'));
    }

    public function byAuthor(User $user, Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            // Usa Scout per la ricerca
            $articlesQuery = Article::search($query);
            $articles = $articlesQuery->get()
                                 ->where('is_accepted', true)
                                 ->where('user_id', $user->id)
                                 ->sortByDesc('created_at');
            
            // Converte in paginazione
            $page = request()->get('page', 1);
            $perPage = 6;
            $articles = new \Illuminate\Pagination\LengthAwarePaginator(
                $articles->forPage($page, $perPage),
                $articles->count(),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        } else {
            $articles = $user->articles()
                            ->where('is_accepted', true)
                            ->orderBy('created_at', 'desc')
                            ->paginate(6);
        }
        
        return view('article.by-author', compact('user', 'articles', 'query'));
    }

    public function byTag(Tag $tag, Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            // Usa Scout per la ricerca
            $articlesQuery = Article::search($query);
            $allArticles = $articlesQuery->get()
                                        ->where('is_accepted', true);
            
            // Filtra per tag
            $articleIds = $tag->articles()->pluck('articles.id');
            $articles = $allArticles->whereIn('id', $articleIds)
                                   ->sortByDesc('created_at');
            
            // Converte in paginazione
            $page = request()->get('page', 1);
            $perPage = 4;
            $articles = new \Illuminate\Pagination\LengthAwarePaginator(
                $articles->forPage($page, $perPage),
                $articles->count(),
                $perPage,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
        } else {
            $articles = $tag->articles()
                            ->where('is_accepted', true)
                            ->orderBy('created_at', 'desc')
                            ->paginate(4);
        }
        
        $popularArticles = Article::where('is_accepted', true)
                                ->orderBy('created_at', 'desc')
                                ->take(3)
                                ->get();
        
        $allCategories = Category::withCount(['articles' => function($query) {
            $query->where('is_accepted', true);
        }])->get();
        
        return view('article.by-tag', compact('tag', 'articles', 'popularArticles', 'allCategories', 'query'));
    }

    public function show(Article $article)
    {
        $tags = $article->tags;
        return view('article.show', compact('article', 'tags'));
    }

    // In the create method, make sure you have something like this:
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('article.create', compact('categories', 'tags'));
    }

    // Nel metodo store
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'subtitle' => 'required|min:5|max:500',
            'body' => 'required|min:10',
            'image' => 'image|required',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'array',
        ]);
    
        $imagePath = $request->file('image')->store('images', 'public');
    
        $article = Article::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'image' => $imagePath,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->title),
        ]);

        if($request->has('tags')) {
            $article->tags()->attach($request->tags);
        }
    
        // Modifica qui: reindirizza alla pagina di creazione con un messaggio
        return redirect()->route('article.create')->with('message', 'Articolo creato con successo, verrà revisionato a breve');
        
        // Oppure, se preferisci reindirizzare alla dashboard dello scrittore:
        // return redirect()->route('writer.dashboard')->with('message', 'Articolo creato con successo, verrà revisionato a breve');
    }

    public function edit(Article $article)
    {
        if(Auth::id() !== $article->user_id) {
            return redirect()->back()->with('error', 'Non sei autorizzato a modificare questo articolo');
        }
        
        // Rimuovi questa verifica o modificala per permettere la modifica anche degli articoli pubblicati
        if($article->is_accepted === true) {
            return redirect()->back()->with('error', 'Non puoi modificare un articolo già pubblicato');
        }
        
        $categories = Category::all();
        $tags = Tag::all();
        return view('article.edit', compact('article', 'categories', 'tags'));
    }

    // Rimuovi questa riga duplicata
    // use Illuminate\Support\Facades\Storage;
    
    // Modifica il metodo update esistente
    public function update(Request $request, Article $article)
    {
        // Verifica che l'utente corrente sia il proprietario dell'articolo
        if(Auth::id() !== $article->user_id) {
            return redirect()->back()->with('error', 'Non sei autorizzato a modificare questo articolo');
        }
        
        // Validazione dei dati
        $validated = $request->validate([
            'title' => 'required|min:5',
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'required|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        // Aggiorna i dati dell'articolo
        $article->title = $validated['title'];
        $article->subtitle = $validated['subtitle'];
        $article->body = $validated['body'];
        $article->category_id = $validated['category_id'];
        
        // Gestione dell'immagine
        if($request->hasFile('image')) {
            // Se c'è già un'immagine, elimina quella vecchia
            if($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            
            // Salva la nuova immagine
            $article->image = $request->file('image')->store('images', 'public');
        }
        
        // Importante: reimpostare lo stato dell'articolo a "in revisione"
        $article->is_accepted = NULL;
        
        // Salva le modifiche
        $article->save();
        
        // Aggiorna i tag - assicurati che i tag vengano sincronizzati correttamente
        $article->tags()->sync($validated['tags']);
        
        return redirect()->route('writer.dashboard')->with('message', 'Articolo modificato con successo e rimesso in revisione');
    }
    
    // Aggiungi il metodo destroy
    public function destroy(Article $article)
    {
        // Verifica che l'utente corrente sia il proprietario dell'articolo
        if(Auth::id() !== $article->user_id) {
            return redirect()->back()->with('error', 'Non sei autorizzato a eliminare questo articolo');
        }
        
        // Salva l'immagine per la cancellazione
        $image = $article->image;
        
        // Elimina l'articolo
        $article->delete();
        
        // Cancella l'immagine dallo storage - modificato per usare il disco 'public'
        if($image) {
            Storage::disk('public')->delete($image);
        }
        
        return redirect(route('writer.dashboard'))->with('message', 'Articolo eliminato con successo');
    }

    public function articleSearch(Request $request)
    {
        $query = $request->input('query');
        $categoryId = $request->input('category_id');
        
        if (empty($query)) {
            return redirect()->route('homepage');
        }
        
        // Cerca gli articoli usando Scout
        $articlesQuery = Article::search($query);
        
        // Converti i risultati in una collezione Eloquent
        $articles = $articlesQuery->get();
        
        // Filtra solo gli articoli accettati
        $articles = $articles->where('is_accepted', true);
        
        // Se è specificata una categoria, filtra per quella categoria
        if ($categoryId) {
            $articles = $articles->where('category_id', $categoryId);
        }
        
        return view('article.search-index', [
            'articles' => $articles,
            'query' => $query
        ]);
    }

    
}