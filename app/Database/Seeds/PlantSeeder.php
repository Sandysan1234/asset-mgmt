<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class PlantSeeder extends Seeder
{
	// public function run()
	// {
	//     //
	//     $faker = \Faker\Factory::create('id_ID');

	// 	for ($i = 0; $i < 10; $i++) {
	// 		$data = [

	// 			'kode_plant'    => $faker->regexify('[A-Z]{3}[0-4]{3}'),
	// 			'nama_plant'    => $faker->city(),
	// 			'alamat'		=> $faker->address(),
	// 			'status'              => $faker->numberBetween(0, 1),
	// 			'created_at'		  => Time::now(),
	// 			'updated_at'		  => Time::createFromTimestamp($faker->unixTime()),
	// 		];
	// 		$this->db->table('plant')->insert($data);
	// 	}
	// }
	public function run()
	{
		$data = [
			[
				'kode_plant'    => '1000',
				'nama_plant'    => 'Krian',
				'alamat'		=> 'Tundungan, Sidomojo, Kec. Krian, Kabupaten Sidoarjo, Jawa Timur 61262',
				'status'        => '1',
				'created_at'	=> Time::now(),
				'updated_at'	=> Time::now(),
			],
			[
				'kode_plant'    => '2000',
				'nama_plant'    => 'Mojoagung',
				'alamat'		=> 'Kebonsari, Karangwinongan, Kec. Mojoagung, Kabupaten Jombang, Jawa Timur 61482',
				'status'        => '1',
				'created_at'	=> Time::now(),
				'updated_at'	=> Time::now(),
			],
			[
				'kode_plant'    => '3000',
				'nama_plant'    => 'Batang',
				'alamat'		=> 'Mangunsari, Kedawung, Kec. Banyuputih, Kabupaten Batang, Jawa Tengah',
				'status'        => '1',
				'created_at'	=> Time::now(),
				'updated_at'	=> Time::now(),
			],
		];
		$this->db->table('plant')->insertBatch($data);
	}
}
