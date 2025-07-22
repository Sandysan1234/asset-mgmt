<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class AssetSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i=0; $i <10 ; $i++) { 
            $data=[
                'no_asset'      => $faker->regexify('[A-Z]{3}[0-9]{3}'),
                'sub_asset'     => $faker->regexify('[A-Z]{3}[0-9]{3}'),
                'nama_asset'    => $faker->word(),
                'serial_number' => $faker->numberBetween(10000,99999),
                'batch_number'  => $faker->regexify('[A-Z]{5}[0-9]{5}'),
                'merek'         => $faker->word(),
                'spek'          => $faker->sentence(5),
                'tgl_perolehan' => Time::createFromTimestamp($faker->unixTime()),
                'harga'         => $faker->randomFloat(2),
                'no_po'         => $faker->regexify('[A-Z]{5}[0-9]{5}'),
				'status'        => $faker->numberBetween(0, 5),
                'id_assetclass' => $faker->numberBetween(1, 10),
                'id_vendor'     => $faker->numberBetween(1, 10),
                'id_cost_center'=> $faker->numberBetween(1, 10),
                'id_plant'      => $faker->numberBetween(1, 10),
                'id_lifetime'   => $faker->numberBetween(1, 10),
                'id_pic'        => $faker->numberBetween(1, 10),
                'id_user_asset' => $faker->numberBetween(1, 10),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime()),
                'modified_by'   => $faker->name('male' | 'female'),
            ];
            $this->db->table('asset')->insert($data);
        }
    }
}
