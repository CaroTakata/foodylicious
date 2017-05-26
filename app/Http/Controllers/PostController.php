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
        $title = $request->input('title');
        $description = $request->input('description');
        $ingredients = $request->input('ingredients');
        $user_id = $request->input('user_id');
        $method = $request->input('method');
        $file = $request->file('file');

        $response = new \stdClass();

        if($file == null)
        {
            $response->msg = "Fail";
        }        
        else
        {
            $fileName = $file->getClientOriginalName();
            $file->move(public_path().'/img/publicaciones/',  $fileName);

            $post = new Post();
            $post->title = $title;
            $post->description = $description;
            $post->ingredients = $ingredients;
            $post->method = $method;
            $post->image = $fileName;
            $post->user_id = $user_id;
            $post->category_id = 1;
            $post->save();
            
            $response->msg = "Success";
            $response->post = $post;            
        }        

        return response()->json( $response );
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
        $post->user_id = $user->id;
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
