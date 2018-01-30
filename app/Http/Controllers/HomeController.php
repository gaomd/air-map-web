<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
//        var_dump(session('user'));

        if (!session('user')) {
            return redirect('login/choose');
        }

        return view('home');
    }
}
