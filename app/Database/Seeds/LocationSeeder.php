<?php

// namespace App\Database\Seeds;

// use CodeIgniter\I18n\Time;
// use CodeIgniter\Database\Seeder;

// class LocationSeeder extends Seeder
// {
//     public function run()
//     {
//         $faker = \Faker\Factory::create('id_ID');

//         // for ($i=0; $i < 10 ; $i++) { 
//         //     $data =[
//         //         'kode_lokasi'   => $faker->regexify('[A-Z]{3}[0-9]{3}'),
//         //         'nama_lokasi'   => $faker->state(),
//         //         'jenis_lokasi'  => $faker->city(),
//         //         'status'        => $faker->numberBetween(0,1),
//         //         'created_at'    => Time::now(),
//         //         'updated_at'    => Time::now(),
//         //     ];
//         //     $this->db->table('lokasi')->insert($data);
//         // }
//         $data = [
//             [
//                 'kode_lokasi'   => 'G0001',
//                 'nama_lokasi'   => 'Gedung 1',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0002',
//                 'nama_lokasi'   => 'Gedung 2',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0003',
//                 'nama_lokasi'   => 'Gedung 3',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0004',
//                 'nama_lokasi'   => 'Gedung 4',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0005',
//                 'nama_lokasi'   => 'Gedung 5',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0006',
//                 'nama_lokasi'   => 'Gedung 6',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0007',
//                 'nama_lokasi'   => 'Gedung 7',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0008',
//                 'nama_lokasi'   => 'Gedung 8',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0009',
//                 'nama_lokasi'   => 'Gedung 9',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0010',
//                 'nama_lokasi'   => 'Gedung 10',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0011',
//                 'nama_lokasi'   => 'Gedung 11',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0012',
//                 'nama_lokasi'   => 'Gedung 12',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0013',
//                 'nama_lokasi'   => 'Gedung 13',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0014',
//                 'nama_lokasi'   => 'Gedung 14',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0015',
//                 'nama_lokasi'   => 'Gedung 15',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0016',
//                 'nama_lokasi'   => 'Gedung 16',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0017',
//                 'nama_lokasi'   => 'Gedung 17',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0018',
//                 'nama_lokasi'   => 'Gedung Depan',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0019',
//                 'nama_lokasi'   => 'Gedung Injection / Assembling',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0020',
//                 'nama_lokasi'   => 'Gudang 1',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0021',
//                 'nama_lokasi'   => 'Gudang 2',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0022',
//                 'nama_lokasi'   => 'Gedung MTC/QC/EM',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0022',
//                 'nama_lokasi'   => 'Gedung MTC/QC/EM',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0023',
//                 'nama_lokasi'   => 'Office',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0023',
//                 'nama_lokasi'   => 'Office',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0024',
//                 'nama_lokasi'   => 'Gedung HRD/GA',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0025',
//                 'nama_lokasi'   => 'Office baru',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0026',
//                 'nama_lokasi'   => 'Lab Pusat',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0027',
//                 'nama_lokasi'   => 'Gedung A',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0028',
//                 'nama_lokasi'   => 'Gedung B',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'G0029',
//                 'nama_lokasi'   => 'Sparepart',
//                 'jenis_lokasi'  => 'Gedung',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],

//             [
//                 'kode_lokasi'   => 'L001',
//                 'nama_lokasi'   => 'Lantai 1',
//                 'jenis_lokasi'  => 'Lantai',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'L002',
//                 'nama_lokasi'   => 'Lantai 2',
//                 'jenis_lokasi'  => 'Lantai',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'L003',
//                 'nama_lokasi'   => 'Lantai 3',
//                 'jenis_lokasi'  => 'Lantai',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],

//             [
//                 'kode_lokasi'   => 'L201',
//                 'nama_lokasi'   => 'Lantai 1',
//                 'jenis_lokasi'  => 'Lantai',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'L202',
//                 'nama_lokasi'   => 'Lantai 2',
//                 'jenis_lokasi'  => 'Lantai',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'L203',
//                 'nama_lokasi'   => 'Lantai 3',
//                 'jenis_lokasi'  => 'Lantai',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],

//             [
//                 'kode_lokasi'   => 'L301',
//                 'nama_lokasi'   => 'Lantai 1',
//                 'jenis_lokasi'  => 'Lantai',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'L302',
//                 'nama_lokasi'   => 'Lantai 2',
//                 'jenis_lokasi'  => 'Lantai',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'L303',
//                 'nama_lokasi'   => 'Lantai 3',
//                 'jenis_lokasi'  => 'Lantai',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],



//             [
//                 'kode_lokasi'   => 'L004',
//                 'nama_lokasi'   => 'Lantai 4',
//                 'jenis_lokasi'  => 'Lantai',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'L005',
//                 'nama_lokasi'   => 'Lantai 5',
//                 'jenis_lokasi'  => 'Lantai',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi' => 'A0000',
//                 'nama_lokasi' => 'Office Utama',
//                 'jenis_lokasi' => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi' => 'A0001',
//                 'nama_lokasi' => 'Finance',
//                 'jenis_lokasi' => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'A0002',
//                 'nama_lokasi'   => 'Gudang',
//                 'jenis_lokasi'  => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'A0003',
//                 'nama_lokasi'   => 'Kantin',
//                 'jenis_lokasi'  => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'A0004',
//                 'nama_lokasi'   => 'Office HRD/GA',
//                 'jenis_lokasi'  => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'A0005',
//                 'nama_lokasi'   => 'Office Belakang',
//                 'jenis_lokasi'  => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'A0006',
//                 'nama_lokasi'   => 'Pos Security',
//                 'jenis_lokasi'  => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'A0007',
//                 'nama_lokasi'   => 'Ruang Produksi',
//                 'jenis_lokasi'  => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'A0008',
//                 'nama_lokasi'   => 'Ruang Elektromedik',
//                 'jenis_lokasi'  => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'A0009',
//                 'nama_lokasi'   => 'Ruang Engineering',
//                 'jenis_lokasi'  => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'A0010',
//                 'nama_lokasi'   => 'Ruang Tamu',
//                 'jenis_lokasi'  => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'A0011',
//                 'nama_lokasi'   => 'Ruang QC/QA',
//                 'jenis_lokasi'  => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'A0012',
//                 'nama_lokasi'   => 'Showroom',
//                 'jenis_lokasi'  => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//             [
//                 'kode_lokasi'   => 'A0013',
//                 'nama_lokasi'   => 'Workshop',
//                 'jenis_lokasi'  => 'Area',
//                 'status'        => 1,
//                 'created_at'    => Time::now(),
//                 'updated_at'    => Time::now(),
//             ],
//         ];
//         $this->db->table('lokasi')->insertBatch($data);
//     }
// }




namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        $now = Time::now();
        $data = [];

        // === GEDUNG ===
        $gedungList = [
            'Gedung 1',
            'Gedung 2',
            'Gedung 3',
            'Gedung 4',
            'Gedung 5',
            'Gedung 6',
            'Gedung 7',
            'Gedung 8',
            'Gedung 9',
            'Gedung 10',
            'Gedung 11',
            'Gedung 12',
            'Gedung 13',
            'Gedung 14',
            'Gedung 15',
            'Gedung 16',
            'Gedung 17',
            'Gedung Depan',
            'Gedung Injection / Assembling',
            'Gudang 1',
            'Gudang 2',
            'Gedung MTC/QC/EM',
            'Office',
            'Gedung HRD/GA',
            'Office baru',
            'Lab Pusat',
            'Gedung A',
            'Gedung B',
            'Sparepart'
        ];

        foreach ($gedungList as $index => $nama) {
            $kode = 'G' . str_pad($index + 1, 4, '0', STR_PAD_LEFT);
            $data[] = [
                'kode_lokasi'   => $kode,
                'nama_lokasi'   => $nama,
                'jenis_lokasi'  => 'Gedung',
                'status'        => 1,
                'created_at'    => $now,
                'updated_at'    => $now,
            ];
        }

        // === LANTAI UMUM (L001 - L005) ===
        for ($i = 1; $i <= 5; $i++) {
            $kode = 'L' . str_pad($i, 3, '0', STR_PAD_LEFT);
            $data[] = [
                'kode_lokasi'   => $kode,
                'nama_lokasi'   => "Lantai $i",
                'jenis_lokasi'  => 'Lantai',
                'status'        => 1,
                'created_at'    => $now,
                'updated_at'    => $now,
            ];
        }

        // === LANTAI PER GEDUNG ===
        // Format: L{nomor_gedung}{nomor_lantai} → L201, L202, L301, dst
        $gedungLantai = [
            2 => 3, // Gedung 2 → 3 lantai (L201, L202, L203)
            3 => 3, // Gedung 3 → 3 lantai (L301, L302, L303)
            // Tambahkan gedung lain jika perlu:
            // 4 => 4, // Gedung 4 → 4 lantai
        ];

        foreach ($gedungLantai as $gedungId => $jumlahLantai) {
            for ($lantai = 1; $lantai <= $jumlahLantai; $lantai++) {
                $kode = 'L' . $gedungId . str_pad($lantai, 2, '0', STR_PAD_LEFT);
                $data[] = [
                    'kode_lokasi'   => $kode,
                    'nama_lokasi'   => "Lantai $lantai",
                    'jenis_lokasi'  => 'Lantai',
                    'status'        => 1,
                    'created_at'    => $now,
                    'updated_at'    => $now,
                ];
            }
        }

        
        $areaList = [
            'Showroom',
            'HRD/GA',
            'Office Injection/Assembling',
            'Office Assembling/Packing',
            'Office Gudang',
            'Finance',
            'Sales',
            'Resepsionis',
            'IT',
            'RND',
            'Exim',
            'Purchasing',
            'Direksi',
            'Controlling',



            'IT',
            'Controlling',
            'QA',
            'Ruang Meeting',
            'Showroom',
            'Office Produksi',


            'IT',
            'Controlling',
            'K3',
            'Produksi',
            'Office Gudang',
            'Office Sparepart'
        ];

        foreach ($areaList as $index => $nama) {
            $kode = 'A' . str_pad($index, 4, '0', STR_PAD_LEFT);
            $data[] = [
                'kode_lokasi'   => $kode,
                'nama_lokasi'   => $nama,
                'jenis_lokasi'  => 'Area',
                'status'        => 1,
                'created_at'    => $now,
                'updated_at'    => $now,
            ];
        }

        // Insert semua
        $this->db->table('lokasi')->insertBatch($data);
    }
}
