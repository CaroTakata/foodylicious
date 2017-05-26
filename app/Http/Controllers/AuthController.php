<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $password = Hash::make($password);
        
        $result = new \stdClass();

        if (Hash::check('secret', $password))
        {
            $result->user = new \stdClass();
            $result->user = User::where('email', $email)->first();

            if ($result->user == null) 
            {
                $result->msg = "Fail";
            } 
            else
            {
                $result->msg = "Success";
            }
        } 
        else 
        {
            $result->msg = "Fail";
        }

        return response()->json( $result );
    }
}
