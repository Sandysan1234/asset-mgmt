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
        $data =[
            'title'=> 'Login',
        ];
        return view('auth/login', $data);
        
    }
    
    public function register(): string
    {
        // return view('welcome_message');
        $data =[
            'title'=> 'Register',
        ];
        return view('auth/register', $data);
    }
    public function forgot(): string
    {
        // return view('welcome_message');
        $data =[
            'title'=> 'Forgot',
        ];
        return view('auth/forgot', $data);
    }
    public function user(): string
    {
        // return view('welcome_message');
        return view('user/index');
    }

}
