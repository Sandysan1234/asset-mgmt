<?php

namespace App\Models;

use CodeIgniter\Model;
use Faker\Generator;
use Myth\Auth\Authorization\GroupModel;
use Myth\Auth\Entities\User;
// use app\Entities\User;


/**
 * @method User|null first()
 */
class UserModel extends Model
{
    protected $table          = 'users';
    protected $primaryKey     = 'id';
    protected $returnType     = 'App\Entities\User';
    // protected $returnType     = 'object';
    protected $useSoftDeletes = true;
    protected $allowedFields  = [
        'email',
        'username',
        'password_hash',
        'reset_hash',
        'reset_at',
        'reset_expires',
        'activate_hash',
        'status',
        'status_message',
        'active',
        'force_pass_reset',
        'permissions',
        'deleted_at',
        'fullname',
        'active_login', // <-- INI!
    ];
    protected $useTimestamps   = true;
    // protected $validationRules = [
    //     'email'         => 'required|valid_email|is_unique[users.email,id,{id}]',
    //     'email'         => 'required|is_unique[users.email,id,{id}]',
    //     'username'      => 'required|is_unique[users.username,id,{id}]',
        // 'password_hash' => 'required',
    // ];
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $afterInsert        = ['addToGroup'];

    /**
     * The id of a group to assign.
     * Set internally by withGroup.
     *
     * @var int|null
     */
    protected $assignGroup;

    /**
     * Logs a password reset attempt for posterity sake.
     */
    public function logResetAttempt(string $email, ?string $token = null, ?string $ipAddress = null, ?string $userAgent = null)
    {
        $this->db->table('auth_reset_attempts')->insert([
            'email'      => $email,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'token'      => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Logs an activation attempt for posterity sake.
     */
    public function logActivationAttempt(?string $token = null, ?string $ipAddress = null, ?string $userAgent = null)
    {
        $this->db->table('auth_activation_attempts')->insert([
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'token'      => $token,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Sets the group to assign any users created.
     *
     * @return $this
     */
    public function withGroup(string $groupName)
    {
        $group = $this->db->table('auth_groups')->where('name', $groupName)->get()->getFirstRow();

        $this->assignGroup = $group->id;

        return $this;
    }

    /**
     * Clears the group to assign to newly created users.
     *
     * @return $this
     */
    public function clearGroup()
    {
        $this->assignGroup = null;

        return $this;
    }

    /**
     * If a default role is assigned in Config\Auth, will
     * add this user to that group. Will do nothing
     * if the group cannot be found.
     *
     * @param mixed $data
     *
     * @return mixed
     */
    protected function addToGroup($data)
    {
        if (is_numeric($this->assignGroup)) {
            $groupModel = model(GroupModel::class);
            $groupModel->addUserToGroup($data['id'], $this->assignGroup);
        }

        return $data;
    }

    /**
     * Faked data for Fabricator.
     */
    public function fake(Generator &$faker): User
    {
        return new User([
            'email'    => $faker->email(),
            'username' => $faker->userName(),
            'password' => bin2hex(random_bytes(16)),
        ]);
    }
    public function getUsersByPermissionNames(array $permissionNames)
    {
        // Ambil ID permission berdasarkan nama
        $permissions = model('PermissionModel')
            ->select('id')
            ->whereIn('name', $permissionNames)
            ->findAll();

        $permissionIds = array_column($permissions, 'id');

        if (empty($permissionIds)) {
            return [];
        }

        // Ambil user yang punya permission tersebut
        return $this->select('users.id, users.fullname, users.username, users.email')
            ->join('auth_users_permissions', 'auth_users_permissions.user_id = users.id')
            ->whereIn('auth_users_permissions.permission_id', $permissionIds)
            ->where('users.active', 1)
            ->groupBy('users.id') // hindari duplikat
            ->orderBy('users.username', 'ASC')
            ->findAll();
    }
}
