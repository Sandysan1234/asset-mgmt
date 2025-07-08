<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Web | Jayamas Asset',
            'komik' => $this->komikModel->getKomik(),
        ];



        return view('komik/index', $data);
    }
    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug),
        ];

        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul komik" . $slug . 'tidak ditemukan');
        }


        return view('komik/detail', $data);
    }
    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation(),

        ];


        return view('komik/create', $data);
    }
    public function save()
    {
        // helper('form');

        $data = $this->request->getPost();

        if (!$this->validateData($data,[
            'judul' => 'required|is_unique[komik.judul]',


        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/komik/create')->withInput();
        }


        $slug = url_title($this->request->getPost('judul'), '-', true);
        $this->komikModel->save([
            'judul'     => $this->request->getPost('judul'),
            'slug'      => $slug,
            'penulis'   => $this->request->getPost('penulis'),
            'penerbit'  => $this->request->getPost('penerbit'),
            'sampul'    => $this->request->getPost('sampul'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/komik');
    }
}
