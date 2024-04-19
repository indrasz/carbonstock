<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function loginWithEmail()
    {
        return view('pages.auth.login-with-email');
    }


    public function register()
    {
        return view('pages.auth.register');
    }

    public function validateUser()
    {
        return redirect()->route('dashboard');
    }

    public function createUser()
    {
        return redirect()->route('dashboard');
    }
}
