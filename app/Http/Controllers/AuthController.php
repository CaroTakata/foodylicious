<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
                
        $result = new \stdClass();
        $result->user = new \stdClass();
        $result->user = User::where('email', $email)->first();

        if ($result->user == null) 
        {
            $result->msg = "Fail";
        } 
        else
        {
            if (Hash::check($password, $result->user->password))
            {
                $result->msg = "Success";
            } 
            else 
            {
                $result->msg = "Fail";
                $result->user = null;
            }
        }        

        return response()->json( $result );
    }
}
