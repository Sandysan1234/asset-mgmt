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
            'title' => 'Roles | RFHM Management System',
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
            'title' => 'Manage Roles | RFHM Management Asset'
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

        $usersInGroup = $this->groupModel->getUsersForGroup((int) $id);

        // Hanya anggap "ada user" jika user_id TIDAK NULL
        $hasRealUser = false;
        foreach ($usersInGroup as $row) {
            if (!empty($row['user_id'])) {
                $hasRealUser = true;
                break;
            }
        }

        if ($hasRealUser) {
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
            'title' => "Edit Roles | RFHM Management Asset"
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
