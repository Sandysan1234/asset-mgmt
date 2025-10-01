<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class LifetimeSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $pola = [0,2, 4, 8, 16, 20]; // nilai masa_berlaku yang diinginkan


        for ($i = 0; $i < 6; $i++) {
            $data = [
                'kode_lifetime'   => $faker->regexify('[A-Z]{5}[0-4]{3}'),
                'masa_berlaku'    => $faker->randomElement($pola),
                'status'          => 1,
                'created_at'      => Time::now(),
                'updated_at'      => Time::createFromTimestamp($faker->unixTime()),
            ];
            $this->db->table('lifetime')->insert($data);
        }
    }
}
