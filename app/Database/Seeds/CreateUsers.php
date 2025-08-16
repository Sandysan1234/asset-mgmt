<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
// use CodeIgniter\Shield\Authentication\Passwords\Password;
use CodeIgniter\I18n\Time;
use Myth\Auth\Password;



class CreateUsers extends Seeder
{
	public function run()
	{
		$data = [
			[
				'email'         => 'sandy@gmail.com',
				'username'      => 'sandy',
				'fullname'      => 'Rizy Rahmahdian Sandy',
				'password_hash' => Password::hash('1qaz'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'santi@example.com',
				'username'      => 'santi',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'nazilla@example.com',
				'username'      => 'nazilla',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'afif@example.com',
				'username'      => 'afif',
				'password_hash' => Password::hash('Jayamas2025'),
				'fullname'      => null,
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'ayunda@example.com',
				'username'      => 'ayunda',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'baktiar@example.com',
				'username'      => 'baktiar',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'annisa@example.com',
				'username'      => 'annisa',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'sasa@example.com',
				'username'      => 'sasa',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'okmah@example.com',
				'username'      => 'okmah',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'ferdy@example.com',
				'username'      => 'ferdy',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'dian@example.com',
				'username'      => 'dian',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'rinda@example.com',
				'username'      => 'rinda',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'hazmi@example.com',
				'username'      => 'hazmi',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'iswatun@example.com',
				'username'      => 'iswatun',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'nia@example.com',
				'username'      => 'nia',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'dwiky@example.com',
				'username'      => 'dwiky',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'ana@example.com',
				'username'      => 'ana',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'sony@example.com',
				'username'      => 'sony',
				'fullname'      => null,
				'password_hash' => password_hash('Jayamas2025', PASSWORD_DEFAULT), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],

		];
		$this->db->table('users')->insertBatch($data);
	}
}
