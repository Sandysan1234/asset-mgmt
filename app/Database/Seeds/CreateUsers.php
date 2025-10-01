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
				'fullname'      => 'santi',
				'password_hash' => Password::hash('Jayamas2025'), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'fa2.jmi@onemed.co.id',
				'username'      => 'nazilla',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'afif.nuzia@onemed.co.id',
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
				'password_hash' => Password::hash('Jayamas2025'), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'baktiar@example.com',
				'username'      => 'baktiar',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'annisa@example.com',
				'username'      => 'annisa',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'sasa@example.com',
				'username'      => 'sasa',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'sap.care@onemed.co.id',
				'username'      => 'okmah',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'it.jmi@onemed.co.id',
				'username'      => 'ferdy',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'dian@example.com',
				'username'      => 'dian',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'rinda@example.com',
				'username'      => 'rinda',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'it3.jmi@onemed.co.id',
				'username'      => 'hazmi',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'iswatun@example.com',
				'username'      => 'iswatun',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'QC nia.qc@onemed.co.id',
				'username'      => 'nia',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'dwiky@example.com',
				'username'      => 'dwiky',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'anna_pajak@onemed.co.id',
				'username'      => 'ana',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'retno@example.com',
				'username'      => 'retno',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'co.2000.jmi@onemed.co.id',
				'username'      => 'ariesta',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'sony@example.com',
				'username'      => 'sony',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'herlien@example.com',
				'username'      => 'herlien',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'mgr.prodkrian@onemed.co.id',
				'username'      => 'sudar',
				'fullname'      => 'Sudar Wiyono',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'riza.jmi@onemed.co.id',
				'username'      => 'riza',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'ka.injection@onemed.co.id',
				'username'      => 'apit',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'produksi.assembling@onemed.co.id',
				'username'      => 'hanif',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'mervin@onemed.co.id',
				'username'      => 'mervin',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'yeni@example.com',
				'username'      => 'yeni',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'fa1.jmi@onemed.co.id',
				'username'      => 'haida',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'hilda@example.com',
				'username'      => 'hilda',
				'fullname'      => null,
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'qa.jmi@onemed.co.id',
				'username'      => 'rizky',
				'fullname'      => 'Rizky Heru',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'dept.itjmi@gmail.com',
				'username'      => 'tka',
				'fullname'      => 'test kabag asal',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'nsyafriska@gmail.com',
				'username'      => 'tkt',
				'fullname'      => 'Tes Kabag Tujuan',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => '221080200145@umsida.ac.id',
				'username'      => 'tes_dir',
				'fullname'      => 'Tes Direksi',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'afinzdi@gmail.com',
				'username'      => 'tes_fin',
				'fullname'      => 'Tes Finanace Manager',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			
			

		];
		$this->db->table('users')->insertBatch($data);
	}
}
