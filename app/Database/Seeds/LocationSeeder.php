<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i=0; $i < 10 ; $i++) { 
            $data =[
                'kode_lokasi'   => $faker->regexify('[A-Z]{3}[0-9]{3}'),
                'nama_lokasi'   => $faker->state(),
                'jenis_lokasi'  => $faker->city(),
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ];
            $this->db->table('lokasi')->insert($data);
        }
    }
}
