<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Daftar User
    public function index()
    {
        // $data['users'] = $this->userModel->orderBy('username', 'ASC')->findAll();
        $data = [
            'users' => $this->userModel->orderBy('username','ASC')->findAll(),
            'title' => 'users'
        ];
        return view('admin/users/index', $data);
    }

    // Form Edit
    public function edit($id)
    {
        $users = $this->userModel->find($id);
        if (!$users) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        return view('admin/users/edit', ['users' => $users,'title'=>'users']);
    }

    // Update
    public function update($id)
    {
        $user = $this->userModel->find($id);
        if (!$user) return redirect()->back()->with('error', 'User tidak ditemukan.');

        $rules = [
            'username' => "required|min_length[3]|max_length[30]|is_unique[users.username,id,{$id}]",
            'email'    => "required|valid_email|is_unique[users.email,id,{$id}]",
            'fullname' => 'permit_empty|max_length[255]',
            // 'active_login' => 'in_list[aktif,tidak]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'fullname' => $this->request->getPost('fullname'),
            'active_login' => $this->request->getPost('active_login'),
        ];

        // Jika ingin ubah password, tambahkan logika terpisah
        $this->userModel->update($id, $data);

        return redirect()->to('/admin/users')->with('message', 'User berhasil diperbarui.');
    }

    // Hapus
    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/admin/users')->with('message', 'User berhasil dihapus.');
    }
}

