<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    // GET 
    // post
    // Muestra todas las publicaciones
    public function index()
    {
        $posts = Post::all();    

        $posts->each(function ($post) {
            $category = $post->category()->get()->first();
            $post->category = $category->name;
            $post->comments = $post->comments()->get();        
            $user = $post->user()->get()->first();
            $post->userName = $user->name;
            $post->avatar = $user->avatar;
            $post->likes = $post->likes()->count();        
        });

        return response()->json( $posts );
    }

    // POST 
    // post
    // Almacena una publicación
    public function store(Request $request)
    {
        return "Post store";
    }

    // GET 
    // post/{post_id}
    // Muestra una publicación en especifico
    public function show($id)
    {        
        $post = Post::find($id);    

        $category = $post->category()->get()->first();
        $post->category = $category->name;
        $post->comments = $post->comments()->get();        
        $user = $post->user()->get()->first();
        $post->userName = $user->name;
        $post->avatar = $user->avatar;
        $post->likes = $post->likes()->count();        

        return response()->json( $post );
    }

    // PUT/PATCH
    // post/{post_id}
    // Actualiza una publicación en especifico
    public function update(Request $request, $id)
    {
        return "Post update";
    }

    // DELETE
    // post/{post_id}
    // Elimina una publicación
    public function destroy($id)
    {
        return "Post destroy";
    }
}
