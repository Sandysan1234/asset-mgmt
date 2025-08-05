<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        // for ($i=0; $i < 10 ; $i++) { 
        //     $data =[
        //         'kode_lokasi'   => $faker->regexify('[A-Z]{3}[0-9]{3}'),
        //         'nama_lokasi'   => $faker->state(),
        //         'jenis_lokasi'  => $faker->city(),
        //         'status'        => $faker->numberBetween(0,1),
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::createFromTimestamp($faker->unixTime())
        //     ];
        //     $this->db->table('lokasi')->insert($data);
        // }
        $data = [
            [
                'kode_lokasi'   => 'G0001',
                'nama_lokasi'   => 'Gedung 1',
                'jenis_lokasi'  => 'Gedung',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'G0002',
                'nama_lokasi'   => 'Gedung 2',
                'jenis_lokasi'  => 'Gedung',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'G0003',
                'nama_lokasi'   => 'Gedung 3',
                'jenis_lokasi'  => 'Gedung',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'G0004',
                'nama_lokasi'   => 'Gedung 4',
                'jenis_lokasi'  => 'Gedung',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'G0005',
                'nama_lokasi'   => 'Gedung 5',
                'jenis_lokasi'  => 'Gedung',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'G0006',
                'nama_lokasi'   => 'Gedung 6',
                'jenis_lokasi'  => 'Gedung',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'G0007',
                'nama_lokasi'   => 'Gedung 7',
                'jenis_lokasi'  => 'Gedung',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'G0008',
                'nama_lokasi'   => 'Gedung 8',
                'jenis_lokasi'  => 'Gedung',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'G0009',
                'nama_lokasi'   => 'Gedung 9',
                'jenis_lokasi'  => 'Gedung',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'G0010',
                'nama_lokasi'   => 'Gedung 10',
                'jenis_lokasi'  => 'Gedung',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'G0011',
                'nama_lokasi'   => 'Gedung 11',
                'jenis_lokasi'  => 'Gedung',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'G0012',
                'nama_lokasi'   => 'Gedung 2',
                'jenis_lokasi'  => 'Gedung',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'L001',
                'nama_lokasi'   => '1',
                'jenis_lokasi'  => 'Lantai',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'L002',
                'nama_lokasi'   => '2',
                'jenis_lokasi'  => 'Lantai',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'L003',
                'nama_lokasi'   => '3',
                'jenis_lokasi'  => 'Lantai',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'L004',
                'nama_lokasi'   => '4',
                'jenis_lokasi'  => 'Lantai',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi'   => 'L005',
                'nama_lokasi'   => '5',
                'jenis_lokasi'  => 'Lantai',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
            [
                'kode_lokasi' => 'A0001',
                'nama_lokasi' => 'FINANCE',
                'jenis_lokasi' => 'Area',
                'status'        => $faker->numberBetween(0,1),
                'created_at'  => '2025-07-16',
                'update_at'   => '2025-07-16',
            ],
            [
                'kode_lokasi'   => 'A0002',
                'nama_lokasi'   => 'Gudang',
                'jenis_lokasi'  => 'Area',
                'status'        => $faker->numberBetween(0,1),
                'created_at'    => Time::now(),
                'updated_at'    => Time::createFromTimestamp($faker->unixTime())
            ],
        ];
        $this->db->table('lokasi')->insertBatch($data);
    }
}
