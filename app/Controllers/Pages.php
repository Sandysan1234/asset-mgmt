<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data =[
            'title'=> 'Web | RFHM Asset',
        ];
        return view('pages/home', $data);
    }
    public function about()
    {
        $data =[
            'title'=> 'About me',
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data =[
            'title'=> 'Contact Us',
            'alamat'=>[
                [
                    'tipe'=>'rumah',
                    'alamat'=> 'Jl. ABC 123',
                    'kota'=> 'Bandung'
                ],
                [
                    'tipe'=>'gedung',
                    'alamat'=>'Jl. mekarsari 333',
                    'kota'=> 'Jakarta'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
    

}
