<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    // Remove the constructor with middleware since it's already applied in routes
    
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }
    
    // Add the missing create method
    public function create()
    {
        return view('admin.tags.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);
        
        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name), // Genera lo slug dal nome
        ]);
        
        return redirect()->route('admin.tags.index')
            ->with('message', 'Tag creato con successo!');
    }
    
    // Aggiungi il metodo edit mancante
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }
    
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $tag->id,
        ]);
        
        $tag->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name), 
        ]);
        
        return redirect()->route('admin.tags.index')->with('success', 'Tag aggiornato con successo!');
    }
    
    public function destroy(Tag $tag)
    {
        // Salva il nome del tag prima di eliminarlo
        $tagName = $tag->name;
        
        // Rimuovi le relazioni con gli articoli
        $tag->articles()->detach();
        
        // Elimina il tag
        $tag->delete();
        
        // Imposta il messaggio di sessione
        return redirect()->route('admin.tags.index')->with('message', "Il tag '$tagName' è stato eliminato con successo");
    }
}