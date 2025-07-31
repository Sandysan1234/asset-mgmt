<?php

namespace App\Controllers;

use App\Models\AssetModel;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class Qrbarcode extends BaseController
{
  protected $assetModel;
  public function __construct()
  {
    $this->assetModel = new AssetModel();
  }
  public function index()
  {
    $data = [
      'title' => 'Generate QR Code | Asset Managed',
      'qrList' => []
    ];
    return view('qrcode/index', $data);
  }
  public function multiple()
  {
    $jumlah = $this->request->getPost('jumlah');

    // $assets = $this->assetModel->findAll($jumlah);
    $assets = $this->assetModel->getWithRelasi(null, $jumlah); // ambil 10 data

    $writer = new PngWriter();
    $qrList = [];
    // dd($assets);
    foreach ($assets as $as) {
      $qrcode = new QrCode(
        data: base_url('asset/detail/' . $as['id_asset']),
        encoding: new Encoding('UTF-8'),
        errorCorrectionLevel: ErrorCorrectionLevel::Low,
        size: 200,
        margin: 10,
        roundBlockSizeMode: RoundBlockSizeMode::Margin,
        foregroundColor: new Color(0, 0, 0),
        backgroundColor: new Color(255, 255, 255)
      );

      $logoPath = FCPATH . 'assets/images/logo-jmi.png';
      $logo = file_exists($logoPath) ? new Logo(
        path: $logoPath,
        resizeToWidth: 50,
        punchoutBackground: true
      ) : null;

      $result = $writer->write($qrcode, $logo, null);
      $qrList[] = [
        'nama_asset'    => $as['nama_asset'],
        'no_asset'      => $as['no_asset'],
        'tgl_perolehan' => $as['tgl_perolehan'],
        'qr' => $result->getDataUri()
      ];
    }
    return view('qrcode/index', [
      'title' => 'QR Code Asset',
      'qrList' => $qrList
    ]);
  }
}
