<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Logika untuk proses login
    }

    public function redirectToGoogle()
    {
        // Logika untuk mengarahkan ke login Google
    }

    public function handleGoogleCallback()
    {
        // Logika untuk menangani callback login Google
    }
}
