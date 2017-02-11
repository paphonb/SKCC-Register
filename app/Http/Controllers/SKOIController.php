<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SKOIController extends Controller
{

    public function index()
    {
        return view('skoi');
    }

    public function register()
    {
        return view('reg-skoi');
    }

    public function registerSubmit()
    {

    }
}
