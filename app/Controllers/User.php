<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'User | Asset Managed',
        ];
        return view('user/index', $data);
    }
    // public function login(): string
    // {
    //     // return view('welcome_message');
    //     $data =[
    //         'title'=> 'Login',
    //     ];
    //     return view('auth/login', $data);
        
    // }
    
    // public function register(): string
    // {
    //     // return view('welcome_message');
    //     $data =[
    //         'title'=> 'Register',
    //     ];
    //     return view('auth/register', $data);
    // }
    // public function forgot(): string
    // {
    //     // return view('welcome_message');
    //     $data =[
    //         'title'=> 'Forgot',
    //     ];
    //     return view('auth/forgot', $data);
    // }
    
    

}
