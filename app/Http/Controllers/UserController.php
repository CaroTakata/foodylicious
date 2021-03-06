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
        $user = User::find($id);
        
        $response = new \stdClass();
        $response->msg = "Success";
        $response->user = $user;
        $response->post = $user->posts()->get(); 

        return response()->json( $response );
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
        $file = $request->file('file');
        $birthdate = $request->input('birthdate');

        $response = new \stdClass();

        if($file == null)
        {
            $response->msg = "Fail";
        }        
        else
        {
            $fileName = $file->getClientOriginalName();
            $file->move(public_path().'/img/usuarios/',  $fileName);
            $user = new User();        
            $user->email     = $email;
            $user->password  = $password;
            $user->name      = $name;
            $user->gender    = $gender;
            $user->avatar    = $fileName;
            $user->birthdate = $birthdate;
            $user->save();
            
            $response->msg = "Success";
            $response->user = $user;            
        }        

        return response()->json( $response );
    }
   
    // PUT/PATCH 
    // user/{user_id}
    // Actualiza la informacion del usuario
    public function update(Request $request, $id)
    {        
        return "UserController@update";
    }

    // POST
    // user/{user_id}
    // Actualiza la informacion del usuario
    public function update_profile(Request $request, $id)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $birthdate = $request->input('birthdate');
        $gender = $request->input('gender');        
        $file = $request->file('file');

        $response = new \stdClass();
        $user = User::find($id);

        if($file == null)
        {
            $response->image = "No image";
            $user->name         = $name;
            $user->email        = $email;
            $user->birthdate    = $birthdate;
            $user->gender       = $gender;
            $user->save();
            
            $response->msg = "Success";
            $response->user = $user;     
        }        
        else
        {
            $response->msg = "Success";
            $response->image = "Image";
            $fileName = $file->getClientOriginalName();
            $file->move(public_path().'/img/usuarios/',  $fileName);
            
            $user->name         = $name;
            $user->email        = $email;
            $user->birthdate    = $birthdate;
            $user->gender       = $gender;
            $user->avatar       = $file->getClientOriginalName();
            $user->save();
            
            $response->msg = "Success";
            $response->user = $user;     
        }

        return response()->json( $response );
    }

    // DELETE
    // user
    // Elimina un usuario
    public function destroy(Request $request)
    {        
        return "UserController@destroy";
    }
}
