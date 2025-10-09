<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\PermissionModel;
use App\Models\UserModel;

class Roles extends BaseController
{
    protected $groupModel;
    protected $permissionModel;
    protected $userModel;

    public function __construct()
    {
        $this->groupModel = new GroupModel();
        $this->permissionModel = new PermissionModel();
        $this->userModel = new UserModel();
    }

    // Daftar semua role
    public function index()
    {
        $data = [
            'groups' => $this->groupModel->orderBy('name', 'ASC')->findAll(),
            'title' => 'Roles | Jayamas Management System',
        ];
        return view('admin/roles/index', $data);
    }

    // Kelola role tertentu (permission + user)
    public function manage($groupId)
    {
        $group = $this->groupModel->find($groupId);
        if (!$group) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil semua permission
        $allPermissions = $this->permissionModel->orderBy('name', 'ASC')->findAll();
        // Ambil permission yang sudah di-assign ke role ini
        $assignedPerms = $this->groupModel->getPermissionsForGroup($groupId);
        $assignedPermIds = array_column($assignedPerms, 'id');

        // Ambil semua user
        $allUsers = $this->userModel->orderBy('username', 'ASC')->findAll();
        // Ambil user yang sudah di role ini
        $usersInGroup = $this->groupModel->getUsersForGroup($groupId);
        $userIdsInGroup = array_column($usersInGroup, 'id');

        $data = [
            'group' => $group,
            'allPermissions' => $allPermissions,
            'assignedPermIds' => $assignedPermIds,
            'allUsers' => $allUsers,
            'userIdsInGroup' => $userIdsInGroup,
            'title' => 'Manage Roles | Jayamas Management Asset'
        ];

        return view('admin/roles/manage', $data);
    }

    // --- Permission Management ---
    public function addPermission()
    {
        $groupId = $this->request->getPost('group_id');
        $permId = $this->request->getPost('permission_id');

        // Ambil permission yang sudah di-assign ke group
        $assignedPerms = $this->groupModel->getPermissionsForGroup($groupId);
        $assignedPermIds = array_column($assignedPerms, 'id');

        // Cek apakah permission sudah ada
        if (!in_array($permId, $assignedPermIds)) {
            $this->groupModel->addPermissionToGroup($permId, $groupId);
        }
        return redirect()->back()->with('message', 'Permission ditambahkan.');
    }

    public function removePermission($groupId, $permId)
    {
        $this->groupModel->removePermissionFromGroup($permId, $groupId);
        return redirect()->back()->with('message', 'Permission dihapus.');
    }

    // --- User Management ---
    public function addUser()
    {
        $groupId = $this->request->getPost('group_id');
        $userId = $this->request->getPost('user_id');

        if (!$groupId || !$userId) {
            return redirect()->back()->with('error', 'Data tidak lengkap.');
        }

        // Cek apakah user sudah di group
        $usersInGroup = $this->groupModel->getUsersForGroup($groupId);
        $userIds = array_column($usersInGroup, 'user_id');
        if (!in_array($userId, $userIds)) {
            $this->groupModel->addUserToGroup($userId, $groupId);
        }

        return redirect()->back()->with('message', 'User ditambahkan ke role.');
    }

    public function removeUser($groupId, $userId)
    {
        $this->groupModel->removeUserFromGroup($userId, (int) $groupId);
        return redirect()->back()->with('message', 'User dihapus dari role.');
    }

    // --- Role Management ---
    public function createRole()
    {
        $name = $this->request->getPost('roles');
        if (empty($name)) {
            return redirect()->back()->with('error', 'Nama role tidak boleh kosong.');
        }

        $this->groupModel->insert(['name' => $name]);
        return redirect()->to('/admin/roles')->with('message', 'Role berhasil dibuat.');
    }

    public function deleteRole($id)
    {

        $usersInGroup = $this->groupModel->getGroupsForUser($id);
        if (!empty($usersInGroup)) {
            return redirect()->back()->with('error', 'Tidak bisa hapus role yang masih digunakan.');
        }

        $this->groupModel->delete($id);
        return redirect()->to('/admin/roles')->with('message', 'Role dihapus.');
    }
    // Tampilkan form edit
    public function edit($id)
    {
        $role = $this->groupModel->find($id);
        if (! $role) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/roles/edit', [
            'role' => $role,
            'title'=> "Edit Roles | Jayamas Management Asset"
        ]);
    }

    // Proses update
    public function update($id)
    {
        $role = $this->groupModel->find($id);
        if (! $role) {
            return redirect()->back()->with('error', 'Role tidak ditemukan.');
        }

        $name = $this->request->getPost('name');

        // Validasi: pastikan name unik, kecuali milik diri sendiri
        $rules = [
            'name' => "required|max_length[255]|is_unique[auth_groups.name,id,{$id}]",
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->groupModel->update($id, ['name' => $name]);

        return redirect()->to('/admin/roles')->with('message', 'Role berhasil diperbarui.');
    }
}
// namespace App\Controllers\Admin;

// use App\Controllers\BaseController;
// use Myth\Auth\Models\GroupModel;
// use Myth\Auth\Models\PermissionModel;
// use Myth\Auth\Models\UserModel;

// class Roles extends BaseController
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

//     // Daftar Role + Assign Permission
//     public function index()
//     {
//         $data = [
//             'groups'      => $this->groupModel->orderBy('name', 'ASC')->findAll(),
//             'permissions' => $this->permissionModel->orderBy('name', 'ASC')->findAll(),
//             'groupModel'    => $this->groupModel,
//             'title' => 'Roles | Jayamas Asset',

//         ];

//         return view('admin/roles/index', $data);
//     }

//     // Buat Role Baru
//     public function create()
//     {
//         if ($this->request->getMethod() === 'post') {
//             $name = $this->request->getPost('name');
//             if (empty($name)) {
//                 return redirect()->back()->with('error', 'Nama role tidak boleh kosong.');
//             }

//             $this->groupModel->insert(['name' => $name]);
//             return redirect()->to('/admin/roles')->with('message', 'Role berhasil dibuat.');
//         }
//     }

//     // Assign Permission ke Role
//     public function assignPermission()
//     {
//         $groupId = $this->request->getPost('group_id');
//         $permissionId = $this->request->getPost('permission_id');

//         if (!$groupId || !$permissionId) {
//             return redirect()->back()->with('error', 'Data tidak lengkap.');
//         }

//         // Cek apakah sudah ada
//         $exists = $this->groupModel->hasPermission($groupId, $permissionId);
//         if (!$exists) {
//             $this->groupModel->addPermissionToGroup($permissionId, $groupId);
//         }

//         return redirect()->back()->with('message', 'Permission berhasil ditambahkan ke role.');
//     }

//     // Hapus Permission dari Role
//     public function removePermission($groupId, $permissionId)
//     {
//         $this->groupModel->removePermissionFromGroup($permissionId, $groupId);
//         return redirect()->back()->with('message', 'Permission dihapus dari role.');
//     }

//     // Hapus Role
//     public function delete($id)
//     {
//         // Cek apakah role digunakan oleh user
//         $usersInGroup = $this->groupModel->getUsersForGroup($id);
//         if (!empty($usersInGroup)) {
//             return redirect()->back()->with('error', 'Tidak bisa menghapus role yang sedang digunakan oleh user.');
//         }

//         $this->groupModel->delete($id);
//         return redirect()->to('/admin/roles')->with('message', 'Role berhasil dihapus.');
//     }

//     // Di dalam class Roles

//     public function users($groupId)
//     {
//         $group = $this->groupModel->find($groupId);
//         if (!$group) {
//             throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
//         }

//         // Ambil semua user
//         $allUsers = $this->userModel->orderBy('username', 'ASC')->findAll();
//         // Ambil user yang sudah di role ini
//         $usersInGroup = $this->groupModel->getUsersForGroup($groupId);
//         $userIdsInGroup = array_column($usersInGroup, 'id');

//         $data = [
//             'title'=>'User | Jayamas Management Asset',
//             'group' => $group,
//             'allUsers' => $allUsers,
//             'userIdsInGroup' => $userIdsInGroup,
//         ];

//         return view('admin/roles/users', $data);
//     }

//     public function assignUserToRole()
//     {
//         $userId = $this->request->getPost('user_id');
//         $groupId = $this->request->getPost('group_id');

//         if (!$userId || !$groupId) {
//             return redirect()->back()->with('error', 'Data tidak lengkap.');
//         }

//         // Cek apakah user sudah di group
//         $usersInGroup = $this->groupModel->getUsersForGroup($groupId);
//         $userIds = array_column($usersInGroup, 'id');

//         if (!in_array($userId, $userIds)) {
//             service('authentication')->assignUserToGroup($userId, $groupId);
//         }

//         return redirect()->back()->with('message', 'User berhasil ditambahkan ke role.');
//     }

//     public function removeUserFromRole($userId, $groupId)
//     {
//         service('authentication')->removeUserFromGroup($userId, $groupId);
//         return redirect()->back()->with('message', 'User dihapus dari role.');
//     }
// }
