<?php

namespace App\Controllers;

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
    public function index()
    {
        $data = [
            'title' => 'Generate QR Code | Asset Managed',
            
        ];
        return view('qrcode/index' , $data);
    }
    public function generate($id)
    {
        helper('filesystem'); // Pastikan helper ini aktif untuk save file
        $asset = model('App\Models\AssetModel')->find($id);
        if (!$asset) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Asset dengan ID $id tidak ditemukan");
        }

        $writer = new PngWriter();

        // // URL menuju halaman detail asset
        // $url = base_url('asset/detail/' . $id);

        $qrCode = new QrCode(
            data: base_url('asset/detail/' . $id),
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::Low,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(0, 0, 0),
            backgroundColor: new Color(255, 255, 255)
        );

        // Tambahkan logo jika file ada
        $logoPath = FCPATH . 'assets/images/logo-jmi.png';
        $logo = file_exists($logoPath) ? new Logo(
            path: $logoPath,
            resizeToWidth: 70,
            punchoutBackground: true
        ) : null;

        // Tambahkan label
        $label = new Label(
            text: 'Scan Asset',
            textColor: new Color(255, 0, 0)
        );

        // Generate QR
        $result = $writer->write($qrCode, $logo, $label);

        // Simpan ke file writable/qrcodes/asset-{id}.png
        $savePath = WRITEPATH . 'qrcodes/';
        if (!is_dir($savePath)) {
            mkdir($savePath, 0755, true);
        }

        $result->saveToFile($savePath . 'asset-' . $id . '.png');

        // Redirect kembali ke halaman detail
        session()->setFlashdata('pesan', 'QR Code berhasil dibuat');
        return redirect()->to('/asset');
    }
}
