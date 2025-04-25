<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Models\Category;


class ArticleController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['index', 'show', 'showCategoryArticles'])
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('article.index', ["articles" => Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $categories = Category::all();
    return view('article.create', compact('categories'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $article = Article::create([
        'title' => $request->title,
        'body' => $request->body,
        'img' => $request->has('img') ? $request->file('img')->store('images', 'public') : 'images/default.jpg',
        'user_id' => Auth::user()->id
    ]);

    $article->categories()->attach($request->categories);

    return redirect()->route('homepage')->with('success', 'Articolo memorizzato con successo!');
}
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        // $user = $article->user;
        $user = User::where('id', $article->user_id)->first();
        $articleBySameUser = $user->articles;
        return view('article.show', compact('article', 'articleBySameUser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
{
    if ($article->user_id == Auth::id()) {
        $categories = Category::all();
        return view('article.edit', compact('article', 'categories'));
    }
    return redirect()->route('homepage')->with('fail', 'Non sei autorizzato');
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
{
    $article->update([
        'title' => $request->title,
        'body' => $request->body,
        'img' => $request->has('img') ? $request->file('img')->store('images', 'public') : $article->img
    ]);

    $article->categories()->sync($request->categories);

    return redirect()->route('homepage')->with('success', 'Articolo modificato con successo!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('article.index')->with('success', 'Articolo cancellato con successo!');
    }
    public function showCategoryArticles($categoryId)
{
    // Recupera la categoria
    $category = Category::findOrFail($categoryId);

    // Query base per tutti gli articoli in questa categoria
    $query = Article::whereHas('categories', function ($query) use ($category) {
        $query->where('categories.id', $category->id);
    })->with('categories');

    // Se sei in un contesto autenticato, filtra per user_id
    if (Auth::check()) {
        $query->where('user_id', Auth::id());
    }

    $articles = $query->get();

    return view('category.articles', compact('articles', 'category'));
}

}
