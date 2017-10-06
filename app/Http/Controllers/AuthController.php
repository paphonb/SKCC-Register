<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function user()
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
