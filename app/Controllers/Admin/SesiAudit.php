<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SesiAuditModel;
use App\Models\AssetModel;
use App\Models\AuditEventAssetModel;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Stmt\Label;


class SesiAudit extends BaseController
{
  public function index()
  {
    $sesiModel = new SesiAuditModel();
    
    $data = [
        // Ambil semua sesi, urutkan dari yang terbaru
        'sesi_list' => $sesiModel->orderBy('created_at', 'DESC')->findAll(),
        'title'     => 'Audit | Asset Management System',

    ];

    // Tampilkan view dan kirim data $sesi_list ke dalamnya
    return view('admin/sesi_audit/index', $data);
  }

  public function new()
  {
    $data = [
      'title'=> 'New | Asset Management System',
    ];
    return view('admin/sesi_audit/new_form', $data);
  }

  public function create()
  {
    $sesiModel = new SesiAuditModel();
    $assetModel = new AssetModel();
    $eventAssetModel = new AuditEventAssetModel();

    // 1. Simpan Sesi Audit Baru
    $dataSesi = [
        'nama_sesi'     => $this->request->getPost('nama_sesi'),
        'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
        'status'        => 'OPEN',
    ];
    $sesiModel->insert($dataSesi);
    $idSesiBaru = $sesiModel->getInsertID();

    // 2. Ambil SEMUA aset
    // Pastikan Anda hanya mengambil aset yang aktif dan punya PIC
    $allAssets = $assetModel->where('status', 5) // Asumsi status 5 = Aktif
                            ->where('id_pic IS NOT NULL')
                            ->findAll();

    // 3. Siapkan data batch untuk 'audit_event_assets'
    $dataTugasAudit = [];
    foreach ($allAssets as $asset) {
        $dataTugasAudit[] = [
            'id_sesi'   => $idSesiBaru,
            'id_asset'  => $asset['id_asset'],
            'id_pic'    => $asset['id_pic'],
            'status_audit' => 'BELUM_AUDIT'
        ];
    }

    // 4. Masukkan semua tugas ke DB (Gunakan batch insert agar cepat)
    if (!empty($dataTugasAudit)) {
        $eventAssetModel->insertBatch($dataTugasAudit);
    }

    return redirect()->to('/admin/sesi-audit')->with('message', 'Sesi Audit berhasil dimulai!');
  }

  public function detail($id_sesi)
  {
    $sesiModel = new SesiAuditModel();
    $eventAssetModel = new AuditEventAssetModel();

    $sesi = $sesiModel->find($id_sesi);

    if (!$sesi) {
      # code...
      throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Sesi Audit Tidak Ditemukan");
      
    }

    $detailAset = $eventAssetModel
    ->select('
    audit_event_assets.*,
    asset.no_asset,
    asset.nama_asset,
    asset.id_lokasi_area,
    users.fullname as nama_pic
    ')
    ->join('asset','asset.id_asset = audit_event_assets.id_asset')
    ->join('users','users.id= audit_event_assets.id', 'left')
    ->where('audit_event_assets.id_sesi', $id_sesi)
    ->findAll();

    $data=[
      'title'       => 'Detail Sesi Audit',
      'sesi'        => $sesi,
      'detail_list' => $detailAset,
    ];

    return view('admin/sesi_audit/detail', $data);

  }
  public function close($id_sesi)
  {
    $sesiModel = new SesiAuditModel();
    

    // Cek apakah sesi ada
    $sesi = $sesiModel->find($id_sesi);
    if (!$sesi) {
        return redirect()->back()->with('error', 'Sesi tidak ditemukan.');
    }

    // Update Status menjadi CLOSED dan isi Tanggal Selesai hari ini
    $sesiModel->update($id_sesi, [
        'status'          => 'CLOSED',
        'tanggal_selesai' => date('Y-m-d') // Otomatis set tanggal hari ini
    ]);

    return redirect()->back()->with('message', 'Sesi Audit berhasil DITUTUP. Audit selesai.');
  }
  public function delete($id_sesi)
  {
    $sesiModel = new SesiAuditModel();
    $eventAssetModel = new AuditEventAssetModel();

    $sesi = $sesiModel->find($id_sesi);
    if (!$sesi) {
      # code...
      return redirect()->back()->with('error', 'Sesi Tidak ditemukan');
    }

    if ($sesi['status'] =='CLOSED'){
      return redirect()->back()->with('error', 'Sesi Audit yang sudah ditutup tidak bisa dihapus') ;
    }
    $eventAssetModel->where('id_sesi', $id_sesi)->delete();
    $sesiModel->delete($id_sesi);
    return redirect()->back()->with('message', 'Sesi Audit Berhasil DIHAPUS');
  }
}