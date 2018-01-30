<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        if (!session('user')) {
            return redirect('login/choose');
        }

        return view('home');
    }
}
