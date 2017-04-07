<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return response()->json([
                'success' => true,
                'token' => Auth::user()->api_token
            ]);
        } else {
            return response()->json([
                'success' => false
            ]); 
        }
    }

    public function userinfo()
    {
        $this->middleware('auth');
        if (Auth::check()) {
            return response()->json([
                'success' => true,
                'user' => Auth::user()
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
}
