<?php

namespace App\Controllers;

use App\Models\AssetModel;


class User extends BaseController
{
    protected $assetModel;
    public function __construct()
    {
        $this->assetModel = new AssetModel();
    }
    public function index(): string
    {
        $db = \Config\Database::connect();
        $total_asset = $db->table('asset')
            ->where('deleted_at', null)
            ->countAllResults();


        $data = [
            'title' => 'User | Asset Management System',
            'total_asset' => $total_asset,
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
