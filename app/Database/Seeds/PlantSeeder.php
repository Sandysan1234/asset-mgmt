<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class PlantSeeder extends Seeder
{
    public function run()
    {
        //
        $faker = \Faker\Factory::create('id_ID');

		for ($i = 0; $i < 10; $i++) {
			$data = [

				'kode_plant'    => $faker->regexify('[A-Z]{3}[0-4]{3}'),
				'nama_plant'    => $faker->city(),
				'alamat'		=> $faker->address(),
				'status'              => $faker->numberBetween(0, 1),
				'created_at'		  => Time::now(),
				'updated_at'		  => Time::createFromTimestamp($faker->unixTime()),
			];
			$this->db->table('plant')->insert($data);
		}
    }
}
