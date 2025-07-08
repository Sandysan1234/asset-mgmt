<?php

namespace App\Controllers;

class Form extends BaseController
{
    protected $helpers = ['form'];

    public function index()
    {
        $data = [
            'title' => 'lalal',
        ];
        if (! $this->request->is('post')) {
            return view('coba');
        }

        $rules = [
            'kode_vendor' => 'required',
            'nama_vendor' => 'required',
            'alamat'      => 'required',
            'status'      => 'required|in_list[0,1]'
        ];

        $data = $this->request->getPost(array_keys($rules));

        if (! $this->validateData($data, $rules)) {
            return view('coba');
        }

        // If you want to get the validated data.
        $validData = $this->validator->getValidated();

        return view('success');
    }
}