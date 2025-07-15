<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class LifetimeSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i=0; $i <10 ; $i++) { 
            $data=[
                'kode_lifetime'   => $faker->regexify('[A-Z]{5}[0-4]{3}'),
                'masa_berlaku'    => $faker->numberBetween(0, 20),
                'status'          => $faker->numberBetween(0,1),
                'created_at'      => Time::now(),
                'updated_at'	  => Time::createFromTimestamp($faker->unixTime()),
            ];
            $this->db->table('lifetime')->insert($data);
        }
    }
}
