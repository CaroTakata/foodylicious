<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Post;
use App\User;
use App\Category;

Route::get('/', function () {
    return view('welcome');
});

// Prueba para confirmar que traiga bien todo de la Base de Datos
Route::get('/test', function () {

    $users = User::all();

    foreach ($users as $user) {
        // Seguidos y seguidores
        $user->following = $user->following()->get();
        $user->followers = $user->followers()->get();

        // Obtenemos todas las publicaciones de un usuario
        $posts = $user->posts()->get();

        // Agregamos las categorias como nombre y no como objeto
        $posts->each(function ($post) {
            $category = $post->category()->get()->first();
            $post->category = $category->name;
            $post->comments = $post->comments()->get();
        });

        // Una vez que modificamos las categorias de las publicaciones
        // actualizamos las publicaciones
        $user->posts = $posts;
    }
    
    return response()
            ->json( $users );
});
