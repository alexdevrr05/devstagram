<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // protege la ruta (solo se muestra si hay una sesion iniciada)
        $this->middleware('auth');
    }

    public function index(User $user)
    {

        // Filtramos por usuario y paginamos
        $posts = Post::where('user_id', $user->id)->paginate(20);

        return view('dashboard', [
            'user' => $user,
            // hace disponible los posts en la vista
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('posts.create'); 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required',
        ]); 

        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id,
        // ]);

        // 2a forma de crear registros
        // $post = new Post;
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id  = auth()->user()->id;
        // $post->save();

        // 3ra forma de crear registros
        // "posts" es el nombre de la relacion que existe en el modelo User.php
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('posts.index', [
            'user' => auth()->user()->username,
        ]); 
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

}
