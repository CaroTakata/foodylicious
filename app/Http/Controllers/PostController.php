<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

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
        $user = User::find($id);
        $user->posts = $user->posts()->get(); 

        return response()->json( $user );
    }

    // POST 
    // like/{post_id}
    // Muestra una publicación en especifico
    public function like(Request $request, $id)
    {        
        $post = Post::find($id);
        $user_id = $request->input('user_id');
        $post->likes()->attach($user_id);
        $post->save();

        $response = new \stdClass();
        $response->msg = "Success";
        
        return response()->json( $response );
    }

    // PUT/PATCH
    // post/{post_id}
    // Actualiza una publicación en especifico
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $title = $request->input('title');
        $description = $request->input('description');
        $ingredients = $request->input('ingredients');
        $method = $request->input('method');
        
        $post->title = $title;
        $post->description = $description;
        $post->ingredients = $ingredients;
        $post->method = $method;
        $post->save();
        
        $response = new \stdClass();        
        $response->msg = "Success";        
        $response->post = $post;
        
        return response()->json( $response );
    }

    // DELETE
    // post/{post_id}
    // Elimina una publicación
    public function delete_post(Request $request)
    {
        $id = $request->input('id');
        $post = Post::find($id);
        $post->delete();

        $response = new \stdClass();        
        $response->msg = "Success";
        
        return response()->json( $response );
    }
}
