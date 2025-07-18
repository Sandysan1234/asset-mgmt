<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class AssetSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

		for ($i = 0; $i < 10; $i++) {
			$data = [

				'kode_assetclass'     => $faker->regexify('[A-Z]{3}[0-4]{3}'),
				'nama_assetclass'     => $faker->word(),
				'status'              => $faker->numberBetween(0, 1),
				'created_at'		  => Time::now(),
				'updated_at'		  => Time::createFromTimestamp($faker->unixTime()),
			];
			$this->db->table('assetclass')->insert($data);
		}
    }
}
