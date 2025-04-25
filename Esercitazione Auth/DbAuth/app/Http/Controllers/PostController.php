<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;

class PostController extends Controller
{
    // Mostra la vista per creare un nuovo post
    public function create()
    {
        return view('post.create');
    }

    // Memorizza il post nel database
    public function store(PostCreateRequest $request)
    {
        $post = Post::create([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'body' => $request->input('body'),
            'img' => $request->has('img') ? $request->file('img')->storeAs('images', trim($request->title) . ".jpg", 'public') : 'dev5.jpg'
        ]);

        return redirect()->route('post.index')->with('success', "Post '" . $post->title . "' pubblicato!");
    }

    // Recupera tutti i post e li passa alla vista index
    public function index()
    {
        $posts = Post::all(); // Recupera tutti i post dal database
        return view('post.index', compact('posts')); // Passa i post alla vista
    }
}
