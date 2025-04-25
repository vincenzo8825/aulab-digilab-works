<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('articles')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name), // Genera lo slug dal nome
        ]);

        return redirect()->route('admin.categories.index')
            ->with('message', 'Categoria creata con successo!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name), // Genera lo slug dal nome
        ]);

        return redirect()->route('admin.categories.index')
            ->with('message', 'Categoria aggiornata con successo!');
    }

    public function destroy(Category $category)
    {
        // Salva il nome della categoria prima di eliminarla
        $categoryName = $category->name;
        
        // Verifica se ci sono articoli associati
        if ($category->articles()->count() > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Non puoi eliminare questa categoria perché ci sono articoli associati.');
        }

        // Elimina la categoria
        $category->delete();

        // Imposta il messaggio di sessione
        return redirect()->route('admin.categories.index')
            ->with('message', "La categoria '$categoryName' è stata eliminata con successo");
    }
}