<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
//        var_dump(session('user'));

        return view('home');
    }
}
