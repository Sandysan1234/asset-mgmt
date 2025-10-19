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
				'username'      => 'shanti',
				'fullname'      => 'Shanti Rachimiwati',
				'password_hash' => Password::hash('Jayamas2025'), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'fa2.jmi@onemed.co.id',
				'username'      => 'nazilla',
				'fullname'      => 'Nazilla Deva',
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
				'fullname'      => 'Afif Nuzia A',
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'ayunda@example.com',
				'username'      => 'ayunda',
				'fullname'      => 'Ayunda Nevy',
				'password_hash' => Password::hash('Jayamas2025'), // password di-hash
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'baktiar@example.com',
				'username'      => 'baktiar',
				'fullname'      => 'Ahmad Baktiar Kris Aziz',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'annisa@example.com',
				'username'      => 'annisa',
				'fullname'      => 'Annisa Sahara',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'sasa@example.com',
				'username'      => 'sasa',
				'fullname'      => 'Salsabila',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'sap.care@onemed.co.id',
				'username'      => 'okmah',
				'fullname'      => 'Okmah Indah M',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'it.jmi@onemed.co.id',
				'username'      => 'ferdy',
				'fullname'      => 'Ferdy Agung',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'dian@example.com',
				'username'      => 'dian',
				'fullname'      => 'Dian Rizky W',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'rinda@example.com',
				'username'      => 'rinda',
				'fullname'      => 'Rindha Dhea Rosalia',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'it3.jmi@onemed.co.id',
				'username'      => 'hazmi',
				'fullname'      => 'M. Hazmi',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'iswatun@example.com',
				'username'      => 'iswatun',
				'fullname'      => 'Iswatun Chasanah',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'QC nia.qc@onemed.co.id',
				'username'      => 'nia',
				'fullname'      => 'Nia Wahyu Distyarini',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'dwiky@example.com',
				'username'      => 'dwiky',
				'fullname'      => 'Ainur Dwiky',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'anna_pajak@onemed.co.id',
				'username'      => 'ana',
				'fullname'      => 'Ana Pratiwi',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'retno@example.com',
				'username'      => 'retno',
				'fullname'      => 'Retnowati',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'co.2000.jmi@onemed.co.id',
				'username'      => 'ariesta',
				'fullname'      => 'Ariesta Maharani W',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'sony@example.com',
				'username'      => 'sony',
				'fullname'      => 'Sony Raharjo',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'herlien@example.com',
				'username'      => 'herlien',
				'fullname'      => 'Herlien Sri A',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'mgr.prodkrian@onemed.co.id',
				'username'      => 'sudar',
				'fullname'      => 'Sudarwiyono',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'riza.jmi@onemed.co.id',
				'username'      => 'riza',
				'fullname'      => 'Riza Hasyim',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'ka.injection@onemed.co.id',
				'username'      => 'apit',
				'fullname'      => 'Apit Agus Saputra',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'produksi.assembling@onemed.co.id',
				'username'      => 'hanif',
				'fullname'      => 'Achmad Hanif Arianto',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'mervin@onemed.co.id',
				'username'      => 'mervin',
				'fullname'      => 'Mervin Jordan J',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'yeni@example.com',
				'username'      => 'yeni',
				'fullname'      => 'Yeni Noviyanti',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'fa1.jmi@onemed.co.id',
				'username'      => 'haida',
				'fullname'      => 'Nur Haida Hafni',
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
			[
				'email'         => 'nanang@example.com',
				'username'      => 'nanang',
				'fullname'      => 'Nanang Purwantoko',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'erif@example.com',
				'username'      => 'erif',
				'fullname'      => 'Erif Yudiono',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'satiyo@example.com',
				'username'      => 'satiyo',
				'fullname'      => 'Satiyo',
				'password_hash' => Password::hash('Jayamas2025'),
				'active'        => 1,
				'force_pass_reset' => 0,
				'created_at'    => Time::now(),
				'updated_at'    => Time::now()
			],
			[
				'email'         => 'joko@example.com',
				'username'      => 'joko',
				'fullname'      => 'Joko Sugiyanto',
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
