<?php

namespace App\Controllers;

use App\Models\AssetModel;
use App\Models\StockopnameModel;

class Stockopname extends BaseController
{
    protected $stockopnameModel;

  public function __construct()
  {
    $this->stockopnameModel = new StockopnameModel();
  }
    public function index(): string
    {
        $stockopname = $this->stockopnameModel->findAll();
        $data = [
            'title'     => 'Plant | Asset Management System',
            'stocks' => $stockopname,
        ];
        return view('stockopname/index', $data);

    }
    public function create(): string
    {
        $data = [
            'title'     => 'Stock Opname | Asset Management System',

        ];
        // dd(config('Auth'));
        return view('stockopname/create', $data);
    }
    public function cekAsset()
    {
        $assetId = $this->request->getGet('id');

        if (!$assetId || !is_numeric($assetId)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'ID tidak valid'
            ])->setStatusCode(400);
        }

        $model = new AssetModel();
        $asset = $model->find($assetId);

        if ($asset) {
            return $this->response->setJSON([
                'status' => 'success',
                'data' => $asset
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Asset tidak ditemukan'
            ])->setStatusCode(404);
        }
    }

    public function saveAll()
    {
        $dataList = $this->request->getJSON();
        // dd($dataList);

        if (!is_array($dataList) || empty($dataList)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Tidak ada data untuk disimpan.'
            ])->setStatusCode(400)
                ->setHeader('X-CSRF-TOKEN', csrf_hash());
        }

        // 🔢 Generate no_transaksi: SO/2025/04/001
        $db = db_connect();

        $tahun = date('Y');
        $bulan = date('m');
        $prefix = "SO/{$tahun}/{$bulan}";

        // Cari transaksi terakhir dengan prefix ini
        $last = $db->table('stock_opname')
            ->select('no_transaksi')
            ->like('no_transaksi', $prefix)
            ->orderBy('no_transaksi', 'DESC')
            ->get()->getRow();

        // Tentukan nomor urut
        $urut = $last ? (int) substr($last->no_transaksi, -3) + 1 : 1;
        $no_transaksi = $prefix . '/' . sprintf("%03d", $urut); // SO/2025/04/001

        // Simpan ke database
        $model = new \App\Models\StockopnameModel();
        $savedCount = 0;
        $errors = [];

        foreach ($dataList as $data) {
            $rules = [
                'no_asset'     => 'required|string|max_length[50]',
                'nama_asset'   => 'required|string|max_length[100]',
                'status_asset' => 'required|in_list[Ada,Tidak Ada]',
                'created_by'   => 'required|string'
            ];

            if (!$this->validateData((array)$data, $rules)) {
                $errors[] = "No Asset: {$data->no_asset} - " . implode(', ', $this->validator->getErrors());
                continue;
            }

            $saveData = [
                'no_transaksi'    => $no_transaksi,           // ✅
                'no_asset'        => $data->no_asset,
                'nama_asset'      => $data->nama_asset,
                'status_asset'    => $data->status_asset,
                'tgl_stockopname' => date('Y-m-d'),
                'created_by'      => $data->created_by,
            ];

            if ($model->insert($saveData)) {
                $savedCount++;
            } else {
                $dbErrors = $model->errors();
                $errorMsg = is_array($dbErrors) ? implode(', ', $dbErrors) : $dbErrors;
                $errors[] = "Gagal simpan {$data->no_asset}: " . ($errorMsg ?: 'Unknown error');

                // log_message('error', 'Insert Gagal - Data: ' . json_encode($saveData));
                // log_message('error', 'Model Errors: ' . print_r($dbErrors, true));
            }
        }

        if ($savedCount > 0) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => "Berhasil simpan {$savedCount} data.",
                'saved'   => $savedCount,
                'no_transaksi' => $no_transaksi  // ✅ Kirim ke frontend
            ])->setHeader('X-CSRF-TOKEN', csrf_hash());
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Semua data gagal disimpan.',
                'errors'  => $errors
            ])->setStatusCode(500)
                ->setHeader('X-CSRF-TOKEN', csrf_hash());
        }
    }
    // public function saveAll()
    // {
    //     $dataList = $this->request->getJSON();
    //     // dd($dataList);

    //     if (!is_array($dataList) || empty($dataList)) {
    //         return $this->response->setJSON([
    //             'status' => 'error',
    //             'message' => 'Tidak ada data untuk disimpan.'
    //         ])->setStatusCode(400)
    //             ->setHeader('X-CSRF-TOKEN', csrf_hash());
    //     }

    //     $model = new \App\Models\StockOpnameModel();
    //     $savedCount = 0;
    //     $errors = [];

    //     foreach ($dataList as $data) {
    //         // Validasi input
    //         $rules = [
    //             'no_asset'     => 'required|string|max_length[50]',
    //             'nama_asset'   => 'required|string|max_length[100]',
    //             'status_asset' => 'required|in_list[Ada,Tidak Ada]',
    //             // Hapus validasi tgl_stockopname dari input karena kita set otomatis
    //             'created_by'   => 'required|string'
    //         ];

    //         if (!$this->validateData((array)$data, $rules)) {
    //             $errors[] = "No Asset: {$data->no_asset} - " . implode(', ', $this->validator->getErrors());
    //             continue;
    //         }

    //         // Siapkan data untuk disimpan
    //         $saveData = [
    //             'no_asset'        => $data->no_asset,
    //             'nama_asset'      => $data->nama_asset,
    //             'status_asset'    => $data->status_asset,
    //             'tgl_stockopname' => date('Y-m-d'),           // Otomatis hari ini
    //             'created_by'      => $data->created_by,
    //         ];

    //         // Coba simpan
    //         if ($model->insert($saveData)) {
    //             $savedCount++;
    //         } else {
    //             // 🔍 Ambil error dari model
    //             $dbErrors = $model->errors();
    //             $errorMsg = is_array($dbErrors) ? implode(', ', $dbErrors) : $dbErrors;
    //             $errors[] = "Gagal simpan {$data->no_asset}: " . ($errorMsg ?: 'Unknown error');

    //             // 🔹 Log ke file
    //             log_message('error', 'Insert Gagal - Data: ' . json_encode($saveData));
    //             log_message('error', 'Model Errors: ' . print_r($dbErrors, true));
    //         }
    //     }

    //     if ($savedCount > 0) {
    //         return $this->response->setJSON([
    //             'status'  => 'success',
    //             'message' => "Berhasil simpan {$savedCount} data.",
    //             'saved'   => $savedCount
    //         ])->setHeader('X-CSRF-TOKEN', csrf_hash());
    //     } else {
    //         return $this->response->setJSON([
    //             'status'  => 'error',
    //             'message' => 'Semua data gagal disimpan.',
    //             'errors'  => $errors
    //         ])->setStatusCode(500)
    //             ->setHeader('X-CSRF-TOKEN', csrf_hash());
    //     }
    // }


    // Simpan hasil stock opname
    // public function saveAll()
    // {
    //     $dataList = $this->request->getJSON();

    //     if (!is_array($dataList) || empty($dataList)) {
    //         return $this->response->setJSON([
    //             'status' => 'error',
    //             'message' => 'Tidak ada data untuk disimpan.'
    //         ])->setStatusCode(400);
    //     }

    //     $model = new \App\Models\StockOpnameModel();
    //     $savedCount = 0;
    //     $errors = [];

    //     foreach ($dataList as $data) {
    //         $rules = [
    //             'no_asset'     => 'required|string|max_length[50]',
    //             'nama_asset'   => 'required|string|max_length[100]',
    //             'status_asset' => 'required|in_list[Ada,Tidak Ada]',
    //             // 'tgl_stockopname' => 'required|valid_date',
    //             'created_by'   => 'required|string'
    //         ];

    //         if (!$this->validateData((array)$data, $rules)) {
    //             $errors[] = "No Asset: {$data->no_asset} - " . implode(', ', $this->validator->getErrors());
    //             continue;
    //         }

    //         $saveData = [
    //             'no_asset'        => $data->no_asset,
    //             'nama_asset'      => $data->nama_asset,
    //             'status_asset'    => $data->status_asset,
    //             'tgl_stockopname' => date('Y-m-d'),
    //             'created_by'      => $data->created_by
    //         ];

    //         if ($model->insert($saveData)) {
    //             $savedCount++;
    //         } else {
    //             $errors[] = "Gagal simpan: {$data->no_asset}";
    //         }
    //     }

    //     if ($savedCount > 0) {
    //         return $this->response->setJSON([
    //             'status'  => 'success',
    //             'message' => 'Data berhasil disimpan.',
    //             'saved'   => $savedCount
    //         ])->setStatusCode(200);
    //     } else {
    //         return $this->response->setJSON([
    //             'status'  => 'error',
    //             'message' => 'Semua data gagal disimpan.',
    //             'errors'  => $errors
    //         ])->setStatusCode(500);
    //     }
    // }
}
