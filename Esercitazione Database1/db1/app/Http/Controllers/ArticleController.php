<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCreateRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create(){
        return view('article.create');
    }
    public function store(ArticleCreateRequest $request){
// dd ($request->all());
        $articolo = Article::create([
            // chiave = nome della colonna da compilare
            // valore = ciò che dobbiamo salvare nel database
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'body' => $request->input('body'),
            'image'=> $request->has('image')?$request->file('image')->storeAs('images',trim($request->title)."jpg",'public'):'dev3-jpg'
        ]);

return redirect()->route('homepage')->with('success',"Article". $articolo->title."condiviso");
    }
}
