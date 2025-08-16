<?php

namespace App\Controllers;


use CodeIgniter\HTTP\ResponseInterface;

use App\Models\AssetModel;
use App\Models\PlantModel;
use App\Models\CostcenterModel;



class Transaksi extends BaseController
{
  protected $assetModel;
  protected $plantModel;
  protected $costcenterModel;

  public function __construct()
  {
    $this->assetModel = new AssetModel();
    $this->costcenterModel  = new CostcenterModel();
    $this->plantModel  = new PlantModel();
  }
  public function index(): string
  {
    // pr untuk data yang di load
    $plants = $this->plantModel->select('id_plant, nama_plant')->orderBy('nama_plant')->findAll();
    $costcenters = $this->costcenterModel->select('id_cost_center, nama_cost_center')->orderBy('nama_cost_center')->findAll();
    // $asset = $this->assetModel->getWithRelasi();


    $data = [
      'title' => 'Perpindahan Asset | Asset Managed',
      'plants' => $plants,
      'costcenters' => $costcenters
      // 'asset' => $asset,
      // 'no_asset' => $this->assetModel->select('no_asset')->findAll()

    ];
    return view('transaksi/index', $data);
  }
  public function suggestAsset(): ResponseInterface
  {
    $term = trim((string) $this->request->getGet('term'));
    if (mb_strlen($term) < 2) {
      return $this->response->setJSON([]);
    }


    // >>>> Panggil MODEL (semua query ada di Model)
    $rows = $this->assetModel->suggestByNoAsset($term, 10);

    $out = array_map(function ($r) {
      return [
        'label'  => ($r['no_asset'] ?? '') . ' — ' . ($r['nama_asset'] ?? ''),
        'value'  => $r['no_asset'] ?? '',
        'id_asset'      => $r['id_asset'] ?? null,
        'asset_class'   => $r['asset_class'] ?? '',
        'plant'         => $r['plant'] ?? '',
        'cost_center'   => $r['cost_center'] ?? '',
        'no_asset'      => $r['no_asset'] ?? '',
        'sub_asset'     => $r['sub_asset'] ?? '',
        'nama_asset'    => $r['nama_asset'] ?? '',
        'tgl_perolehan' => empty($r['tgl_perolehan']) ? '' : date('Y-m-d', strtotime($r['tgl_perolehan'])),
        'area'          => $r['area'] ?? '',
        'gedung'        => $r['gedung'] ?? '',
        'lantai'        => $r['lantai'] ?? '',
        'id_assetclass'    => $r['id_assetclass'] ?? null,
        'id_plant'          => $r['id_plant'] ?? null,
        'id_cost_center'    => $r['id_cost_center'] ?? null,
        'id_lokasi_area'    => $r['id_lokasi_area'] ?? null,
        'id_lokasi_gedung'  => $r['id_lokasi_gedung'] ?? null,
        'id_lokasi_lantai'  => $r['id_lokasi_lantai'] ?? null,
      ];
    }, $rows);


    return $this->response->setJSON($out);
  }
  public function save() {}
}
