<?php

namespace App\Controllers;

class Location extends BaseController
{
    protected $locationModel;
    
    public function index(): string
    {
        $location  = $this->locationModel->findAll();
        $data =[
            'title'     => 'Location | Asset Managed',
            'location'  => $location,
        ];
        return view('location/index', $data);
    }
}
