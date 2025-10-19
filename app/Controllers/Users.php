<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\PermissionModel;

class Users extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        // Query untuk ambil user, group, dan permission
        $db = \Config\Database::connect();

        // Ambil user + group + permission (dari group DAN individual)
        // $users = $db->query("
        //     SELECT 
        //         u.id,
        //         u.username,
        //         u.email,
        //         u.fullname,
        //         u.active,
        //         COALESCE(g.name, 'No Group') as group_name,
        //         COALESCE(g.description, '-') as group_description,
        //         -- Gabungkan semua permission: dari group + individual
        //         GROUP_CONCAT(
        //             DISTINCT p.name 
        //             ORDER BY p.name 
        //             SEPARATOR ', '
        //         ) as permissions
        //     FROM users u
        //     -- Join ke group
        //     LEFT JOIN auth_groups_users gu ON gu.user_id = u.id
        //     LEFT JOIN auth_groups g ON g.id = gu.group_id
        //     -- Join ke permission dari group
        //     LEFT JOIN auth_groups_permissions ggp ON ggp.group_id = g.id
        //     LEFT JOIN auth_permissions p ON p.id = ggp.permission_id
        //     -- Gabung dengan permission langsung ke user
        //     LEFT JOIN auth_users_permissions uap ON uap.user_id = u.id
        //     LEFT JOIN auth_permissions p2 ON p2.id = uap.permission_id
        //     -- Gabung permission dari group dan individual
        //     GROUP BY u.id
        //     ORDER BY u.username
        // ")->getResultArray();
        $users = $db->query("
            SELECT 
                u.id,
                u.username,
                u.email,
                u.fullname,
                u.active,
                MAX(COALESCE(g.name, 'No Group')) as group_name,
                MAX(COALESCE(g.description, '-')) as group_description,
                GROUP_CONCAT(
                    DISTINCT p.name 
                    ORDER BY p.name 
                    SEPARATOR ', '
                ) as permissions
            FROM users u
            LEFT JOIN auth_groups_users gu ON gu.user_id = u.id
            LEFT JOIN auth_groups g ON g.id = gu.group_id
            LEFT JOIN auth_groups_permissions ggp ON ggp.group_id = g.id
            LEFT JOIN auth_permissions p ON p.id = ggp.permission_id
            LEFT JOIN auth_users_permissions uap ON uap.user_id = u.id
            LEFT JOIN auth_permissions p2 ON p2.id = uap.permission_id
            GROUP BY u.id, u.username, u.email, u.fullname, u.active
            ORDER BY u.username
        ")->getResultArray();

        // Ubah string permission jadi array
        foreach ($users as &$user) {
            $perms = $user['permissions'] ?? '';
            $user['permissions_list'] = $perms ? array_map('trim', explode(',', $perms)) : [];
        }

        return view('users/index', [
            'title' => 'Daftar Pengguna & Hak Akses',
            'users' => $users
        ]);
    }
}
