<?php

namespace App\Controllers;

class Vendor extends BaseController
{
    public function vendor()
    {
        $data =[
            'title'=> 'Web | Jayamas Asset',
        ];
        return view('vendor/vendor', $data);
    }
}
