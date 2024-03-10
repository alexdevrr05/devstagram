<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post)
    {
        /**
         *  como se usa $post no es necesario
         *  declarar el campo "post_id" en "$fillable" */
        
        $post->likes()->create([
        //  'user_id' => auth()->user()->id,
         'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Request $request, Post $post)
    {
        // gracias a la relacion "likes" que tenemos en el modelo de User.php
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
