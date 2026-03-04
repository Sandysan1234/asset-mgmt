<?php

namespace App\Controllers;

use App\Models\AssetModel;
use App\Models\CostcenterModel;
use App\Models\PlantModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class Qrbarcode extends BaseController
{
    protected $assetModel;
    protected $groupModel;
    protected $userModel;
    protected $costcenterModel;
    protected $plantModel;

    public function __construct()
    {
        $this->assetModel = new AssetModel();
        $this->groupModel = new GroupModel();
        $this->userModel = new UserModel();
        $this->costcenterModel = new CostcenterModel();
        $this->plantModel = new PlantModel();
    }

    public function index()
    {
        $picGroup = $this->groupModel->where('name', 'pic')->first();
        $picUsers = [];

        if ($picGroup) {
            $picUsers = $this->userModel
                ->select('users.id, users.fullname, users.username')
                ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                ->where('auth_groups_users.group_id', $picGroup->id)
                ->where('users.active', 1)
                ->groupBy('users.id')
                ->findAll();
        }


        $data = [
            'title' => 'Generate QR Code | Asset Management System',
            'qrList' => [],
            'picList' => $picUsers,
            'costCenterList' => $this->costcenterModel
                ->select('id_cost_center, nama_cost_center')
                ->orderBy('id_cost_center', 'ASC')
                ->findAll(),
            'plants' => $this->plantModel
                ->select('id_plant, nama_plant')
                ->orderBy('nama_plant', 'ASC')
                ->findAll(),
        ];

        return view('qrcode/index', $data);
    }

    public function multiple()
    {
        // Ambil input dari form
        $noAssets = $this->request->getPost('no_asset');
        $idPic = $this->request->getPost('id_pic');
        $idCostCenter = $this->request->getPost('id_cost_center');
        $idPlant = $this->request->getPost('id_plant'); // diperbaiki: id_plant (konsisten)
        $limit = $this->request->getPost('limit');

        // Validasi limit (maks 100)
        $limit = (!empty($limit) && is_numeric($limit)) ? min((int)$limit, 100) : null;

        $assets = [];

        // 1. Prioritas: input manual no_asset
        if (!empty($noAssets)) {
            $noAssetsArr = array_map('trim', explode(',', $noAssets));
            $assets = $this->assetModel
                ->whereIn('no_asset', $noAssetsArr)
                ->findAll();

            if (!$assets) {
                return redirect()->back()->with('error', 'Asset dengan nomor tersebut tidak ditemukan');
            }
        }
        // 2. Filter berdasarkan dropdown (PIC, Cost Center, Plant)
        elseif (!empty($idPic) || !empty($idCostCenter) || !empty($idPlant)) {
            $builder = $this->assetModel;

            if (!empty($idPic)) {
                $builder->where('id_pic', $idPic);
            }
            if (!empty($idCostCenter)) {
                $builder->where('id_cost_center', $idCostCenter);
            }
            if (!empty($idPlant)) {
                $builder->where('id_plant', $idPlant);
            }

            if ($limit !== null) {
                $builder->limit($limit);
            }

            $assets = $builder->findAll();

            if (empty($assets)) {
                return redirect()->back()->with('error', 'Tidak ada asset yang sesuai dengan filter yang dipilih');
            }
        }
        // 3. Tidak ada input sama sekali
        else {
            return redirect()->back()->with('error', 'Harap pilih filter atau masukkan nomor asset');
        }

        // === GENERATE QR ===
        $writer = new PngWriter();
        $qrList = [];

        foreach ($assets as $as) {
            $qrcode = new QrCode(
                data: base_url('asset/detail/' . $as['id_asset']),
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::Low,
                size: 300,
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
                'qr'            => $result->getDataUri()
            ];
        }

        // Muat ulang data dropdown agar tetap muncul setelah submit
        $picGroup = $this->groupModel->where('name', 'pic')->first();
        $picUsers = $picGroup
            ? $this->userModel
            ->select('users.id, users.fullname, users.username')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->where('auth_groups_users.group_id', $picGroup->id)
            ->where('users.active', 1)
            ->groupBy('users.id') // <--- TAMBAHKAN INI untuk menghilangkan duplikat
            ->findAll()
            : [];

        return view('qrcode/index', [
            'title' => 'QR Code Asset',
            'qrList' => $qrList,
            'picList' => $picUsers,
            'costCenterList' => $this->costcenterModel
                ->select('id_cost_center, nama_cost_center')
                ->orderBy('nama_cost_center', 'ASC')
                ->findAll(),
            'plants' => $this->plantModel
                ->select('id_plant, nama_plant')
                ->orderBy('nama_plant', 'ASC')
                ->findAll(),
        ]);
    }
}
