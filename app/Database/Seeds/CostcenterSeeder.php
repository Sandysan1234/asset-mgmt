<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;


use CodeIgniter\Database\Seeder;

class CostcenterSeeder extends Seeder
{
	public function run()
	{
		// $data = [
		// 	[
		// 		'kode_cost_center'    => '748327fhfh',
		// 		'nama_cost_center'    => 'lalala',
		// 		'status'              => '1',
		// 		'created_at'					=> Time::now(),
		// 		'updated_at'					=> Time::now(),
		// 	],
		// 	[
		// 		'kode_cost_center'    => '748327fhfh',
		// 		'nama_cost_center'    => 'lalala',
		// 		'status'              => '1',
		// 	],
		// ];

		// // Simple Queries
		// $this->db->query('INSERT INTO cost_center (kode_cost_center, nama_cost_center, status) VALUES(:kode_cost_center:, :nama_cost_center:, :status:)', $data);

		// // Using Query Builder
		// // $this->db->table('users')->insert($data);

		$faker = \Faker\Factory::create('id_ID');

		for ($i = 0; $i < 10; $i++) {
			$data = [

				'kode_cost_center'    => $faker->regexify('[A-Z]{3}[0-4]{3}'),
				'nama_cost_center'    => $faker->name('male' | 'female'),
				'status'              => $faker->numberBetween(0, 1),
				'created_at'		  => Time::now(),
				'updated_at'		  => Time::createFromTimestamp($faker->unixTime()),
			];
			$this->db->table('cost_center')->insert($data);
		}
	}
}
