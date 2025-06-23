<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function login(): string
    {
        // return view('welcome_message');
        return view('auth/login');
    }
    
    public function register(): string
    {
        // return view('welcome_message');
        return view('auth/register');
    }
    public function user(): string
    {
        // return view('welcome_message');
        return view('user/index');
    }

}
