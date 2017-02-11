<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SKITController extends Controller
{

    public function index()
    {
        return view('skit');
    }

    public function register()
    {
        return view('reg-skit');
    }

    public function registerSubmit()
    {

    }
}
