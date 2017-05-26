<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    // GET 
    // user
    // Muestra todos los usuarios que sigue cierto usuario
    public function index($id)
    {
        return "UserController@index";
    }

    // POST 
    // user/{user_id}
    // Muestra a un usuario en especifico
    public function show(Request $request, $id)
    {        
        return "UserController@show";
    }

    // POST 
    // user
    // Registra un usuario
    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $password = Hash::make($password);
        $name = $request->input('name');
        $gender = $request->input('gender');
        // $avatar = $request->input('avatar');

        $user = new User();        
        $user->email    = $email;
        $user->password = $password;
        $user->name     = $name;
        $user->gender   = $gender;
        // $user->avatar   = $avatar;
        $user->save();

        //return view('home');
        return response()->json( $user );
    }
   
    // PUT/PATCH 
    // user/{user_id}
    // Actualiza la informacion del usuario
    public function update(Request $request, $id)
    {
        return "UserController@update";        
    }

    // DELETE
    // user
    // Elimina un usuario
    public function destroy(Request $request)
    {        
        return "UserController@destroy";
    }
}
