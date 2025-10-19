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

    // Form Tambah
    // public function create()
    // {
    //     return view('admin/users/create');
    // }

    // // Simpan Baru
    // public function store()
    // {
    //     $rules = [
    //         'username' => 'required|min_length[3]|max_length[30]|is_unique[users.username]',
    //         'email'    => 'required|valid_email|is_unique[users.email]',
    //         'fullname' => 'permit_empty|max_length[255]',
    //         'password' => 'required|min_length[8]',
    //     ];

    //     if (! $this->validate($rules)) {
    //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     }

    //     $data = [
    //         'username' => $this->request->getPost('username'),
    //         'email'    => $this->request->getPost('email'),
    //         'fullname' => $this->request->getPost('fullname'),
    //         'active_login' => 'tidak',
    //         'password' => $this->request->getPost('password'),
    //     ];

    //     $this->userModel->withGroup('user'); // opsional: assign role default
    //     $this->userModel->save($data);

    //     return redirect()->to('/admin/users')->with('message', 'User berhasil ditambahkan.');
    // }

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




// namespace App\Controllers\Admin;

// use App\Controllers\BaseController;
// use Myth\Auth\Models\GroupModel;
// use Myth\Auth\Models\PermissionModel;
// use App\Models\UserModel;

// class Users extends BaseController
// {
//     protected $groupModel;
//     protected $permissionModel;
//     protected $userModel;

//     public function __construct()
//     {
//         $this->groupModel = new GroupModel();
//         $this->permissionModel = new PermissionModel();
//         $this->userModel = new UserModel();
//     }

//     // Daftar semua role
//     public function index()
//     {
//         $data = [
//             'title' => 'Users | Jayamas Asset Management System',
//             'users' => $this->userModel->orderBy('username', 'ASC')->findAll(),
//         ];
//         return view('admin/users/index', $data);
//     }
    














//     // Form Tambah
//     // public function create()
//     // {
//     //     $data = [
//     //         'title' => 'Users | Jayamas Asset Management System',
//     //         'users' => $this->userModel->orderBy('username', 'ASC')->findAll(),
//     //     ];
//     //     return view('admin/users/create', $data);
//     // }

//     // Simpan Baru
//     // public function store()
//     // {
//     //     $rules = [
//     //         'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
//     //         'email'    => 'required|valid_email|is_unique[users.email]',
//     //         'fullname' => 'permit_empty|max_length[255]',
//     //         'password' => 'required|min_length[8]',
//     //     ];

//     //     if (! $this->validate($rules)) {
//     //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
//     //     }

//     //     $data = [
//     //         'username' => $this->request->getPost('username'),
//     //         'email'    => $this->request->getPost('email'),
//     //         'fullname' => $this->request->getPost('fullname'),
//     //         'active_login' => 'tidak',
//     //         'password' => $this->request->getPost('password'),
//     //     ];

//     //     $this->userModel->withGroup('user'); // opsional: assign role default
//     //     $this->userModel->save($data);

//     //     return redirect()->to('/admin/users')->with('message', 'User berhasil ditambahkan.');
//     // }

//     // Form Edit
//     // public function edit($id)
//     // {
//     //     $data = [
//     //         'title' => 'users',
//     //         'users' => $this->userModel->find($id),
//     //         'validation'  => \Config\Services::validation(),

//     //     ];
//     //     return view('admin/users/edit', $data);
//     // }
//     // public function edit($id)
//     // {
//     //     // $user = $this->userModel->find($id);
//     //     $data = [
//     //         'title' => 'Users | Jayamas Asset Management System',
//     //         'validation' => \Config\services::validation(),
//     //         'user' => $this->userModel->find($id),
//     //     ];
//     //     // if (!$data) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

//     //     return view('admin/users/edit', $data);
//     // }

//     // Update
//     // public function update($id)
//     // {

//     //     $data = $this->request->getPost();
//     //     if (!$this->validateData($data, [
//     //         'username' => [
//     //             'label' => 'username',
//     //             'rules' => 'required|is_unique[users.username,id,{id}]',
//     //             'errors' => [
//     //                 'required' => '{field} belum diisi',
//     //                 'is_unique' => '{field} sudah ada',
//     //             ]
//     //         ],
//     //         'fullname' => [
//     //             'label' => 'fullname',
//     //             'rules' => 'required|is_unique[users.fullname,id,' . $id . ']',
//     //             'errors' => [
//     //                 'required' => '{field} belum diisi',
//     //                 'is_unique' => '{field} sudah ada',
//     //             ]
//     //         ],
//     //         'email' => [
//     //             'label' => 'email',
//     //             'rules' => 'required|is_unique[users.email,id,' . $id . ']',
//     //             'errors' => [
//     //                 'required' => '{field} belum diisi',
//     //                 'is_unique' => '{field} sudah ada',
//     //             ]
//     //         ]

//     //     ])) {
//     //         return redirect()->to('/admin/users/edit/' . $id)->withInput();
//     //     }
//     //     $this->userModel->save([
//     //         'id'     => $id,
//     //         'username'   => $this->request->getPost('username'),
//     //         'email'        => $this->request->getPost('email'),
//     //         'fullname'   => $this->request->getPost('fullname'),
//     //         'active_login' => $this->request->getPost('active_login') === 'aktif' ? 'aktif' : null,


//     //     ]);
//     //     session()->setFlashdata('pesan', 'Data Berhasil Diubah');
//     //     return redirect()->to('admin/users');
//     // $user = $this->userModel->find($id);
//     // if (!$user) return redirect()->back()->with('error', 'User tidak ditemukan.');

//     // $rules = [
//     //     'username' => 'required|is_unique[users.username,id,' . $id . ']',
//     //     'email'    => "required|is_unique[users.email,id," . $id . "]",
//     //     'fullname' => 'max_length[255]',
//     //     // 'active_login' => 'in_list[aktif,tidak]',
//     // ];

//     // if (! $this->validate($rules)) {
//     //     dd($this->validator->getErrors()); // 👈 lihat error apa yang muncul

//     //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
//     // }

//     // $data = [
//     //     'username' => $this->request->getPost('username'),
//     //     'email'    => $this->request->getPost('email'),
//     //     'fullname' => $this->request->getPost('fullname'),
//     //     'active_login' => $this->request->getPost('active_login') === 'aktif' ? 'aktif' : null,
//     // ];
//     // // dd($data);

//     // // Jika ingin ubah password, tambahkan logika terpisah
//     // echo "Sebelum update";
//     // // exit; // 👈 cek apakah sampai sini

//     // $this->userModel->save($id, $data);

//     // echo "Setelah update";
//     // exit; // 👈 kalau tidak muncul, berarti update gagal/gagal dieksekusi
//     // $this->userModel->update($id, $data);
//     // return redirect()->to('/admin/users')->with('message', 'User berhasil diperbarui.');
//     // }

//     // Hapus
//     // public function delete($id)
//     // {
//     //     $this->userModel->delete($id);
//     //     return redirect()->to('/admin/users')->with('message', 'User berhasil dihapus.');
//     // }


//     // public function edit($id)
//     // {
//     //     $data = [
//     //         'title' => 'users',
//     //         'users' => $this->usermodel->find($id),
//     //         'validation'  => \Config\Services::validation(),

//     //     ];
//     //     return view('admin/users/edit', $data);
//     // }
//     // public function update($id)
//     // {
//     //     $data = $this->request->getPost();

//     //     if (!$this->validateData($data, [
//     //         'usernmae' => [
//     //             'label' => 'username',
//     //             'rules' => 'required|is_unique[users.username,id,{id}]',
//     //             // 'rules'=> 'required|is_unique[users.username,id,' . $id . ']',
//     //             'errors' => [
//     //                 'required'  => '{field} harus diisi',
//     //                 'is_unique'  => '{field} sudah terdaftar',
//     //             ]
//     //         ]
//     //     ])) {
//     //         return redirect()->to('/admin/users/edit' . $id)->withInput();
//     //     }
//     //     $this->usermodel->save([
//     //         'id'     => $id,
//     //         'username'   => $this->request->getPost('username'),
//     //         'email'   => $this->request->getPost('email'),
//     //         'fullname'        => $this->request->getPost('fullname'),
//     //         'active_login'        => $this->request->getPost('active_login') == 'aktif' ? 'aktif' : null,
//     //     ]);
//     //     session()->setFlashdata('pesan', 'Data Berhasil Diubah');
//     //     return redirect()->to('admin/users');
//     // }
// }
