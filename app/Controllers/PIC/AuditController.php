<?php
// app/Controllers/PIC/AuditController.php
namespace App\Controllers\PIC;

use App\Controllers\BaseController;
use App\Models\SesiAuditModel;
use App\Models\AuditEventAssetModel;
use App\Models\LogAuditModel;
use App\Models\AssetModel;
use CodeIgniter\API\ResponseTrait;

class AuditController extends BaseController
{
    use ResponseTrait; // Mengaktifkan fungsionalitas respond, fail, failNotFound, dll.
    protected $id_pic;
    protected $sesiAktif;

    public function __construct()
    {
        // Asumsi ID PIC disimpan di session setelah login
        //$this->id_pic = session()->get('id'); 
        $this->id_pic = user_id();
        
        
        $sesiModel = new SesiAuditModel();
        $this->sesiAktif = $sesiModel->getActiveSession();
    }

    // Tampilkan Dashboard PIC
    // Tampilkan Dashboard PIC
    public function index()
    {
        
        //dd(user_id());
        if (!$this->sesiAktif) {
            return view('pic/audit_no_session', ['title' => 'Sesi Tidak Aktif | Asset Management System']);
        }

        $eventAssetModel = new AuditEventAssetModel();
        
        $stats = [
            'title'     => 'Asset Log | Asset Management System',
            'total' => $eventAssetModel->where('id_pic', $this->id_pic)
                                      ->where('id_sesi', $this->sesiAktif['id_sesi'])
                                      ->countAllResults(),
            'sudah' => $eventAssetModel->where('id_pic', $this->id_pic)
                                      ->where('id_sesi', $this->sesiAktif['id_sesi'])
                                      ->where('status_audit !=', 'BELUM_AUDIT')
                                      ->countAllResults(),
        ];
        $stats['belum'] = $stats['total'] - $stats['sudah'];

        // / --- TAMBAHKAN KODE INI UNTUK MENGAMBIL LIST ASET ---
        // $eventAssetModel = new AuditEventAssetModel(); // Harus dideklarasikan lagi jika di dalam function

        // Mengambil list aset milik PIC ini di sesi aktif
        $dataAset = $eventAssetModel
        ->select(
            'audit_event_assets.*, asset.nama_asset, asset.no_asset, asset.id_lokasi_area, lokasi.nama_lokasi as nama_lokasi' ) 
        ->join('asset', 'asset.id_asset = audit_event_assets.id_asset')
        ->join('lokasi', 'lokasi.id_lokasi= asset.id_lokasi_area')
        ->where('audit_event_assets.id_pic', $this->id_pic)
        ->where('audit_event_assets.id_sesi', $this->sesiAktif['id_sesi'])
        ->findAll();

        // --- UPDATE array $stats untuk dikirim ke View ---
        $stats['list_aset'] = $dataAset;
        $stats['sesiAktif'] = $this->sesiAktif; // Kirim info sesi juga

        return view('pic/audit_dashboard', $stats);
    }

    // Tampilkan Halaman Pindai
    public function scan()
    {
        $data=[
            'title'=> 'Scan | Asset Management System'
        ];
        if (!$this->sesiAktif) {
            return redirect()->to('/pic/audit')->with('error', 'Tidak ada Jadwal Stockopname aktif.');
        }
        return view('pic/scan_page', $data);
    }


    // === API KEAMANAN ===
    // Endpoint yang dituju oleh JavaScript pemindai
    public function checkAsset()
    {
        // Keamanan 1: Hanya izinkan request AJAX
        if (!$this->request->isAJAX()) {
            return $this->fail('Invalid request method.');
        }

        $qrUrl = $this->request->getPost('qr_data');
        if (empty($qrUrl)) {
            return $this->fail('QR Data Kosong.', 400);
        }
        
        // Keamanan 2: Parsing URL untuk ID, cegah SQL Injection
        $path = parse_url($qrUrl, PHP_URL_PATH);
        $segments = explode('/', $path);
        $id_asset_scanned = end($segments);

        // Keamanan 3: Pastikan ID adalah angka
        if (!is_numeric($id_asset_scanned)) {
            $this->log($qrUrl, 'INVALID_FORMAT');
            return $this->fail('Format QR tidak valid.', 400);
        }
        
        $id_asset_scanned = (int)$id_asset_scanned; // Casting ke integer
        
        // Keamanan 4: Cek Otorisasi (Otomatis terfilter Query Builder)
        $eventAssetModel = new AuditEventAssetModel();
        $assetStatus = $eventAssetModel
            ->where('id_sesi', $this->sesiAktif['id_sesi'])
            ->where('id_asset', $id_asset_scanned)
            ->first();

        // Skenario 1: Aset tidak ada di "daftar tugas" audit ini
        if (!$assetStatus) {
            $this->log($qrUrl, 'ASET_TIDAK_TERDAFTAR');
            return $this->failNotFound('Aset tidak terdaftar di Stockopname ini.');
        }

        // Skenario 2: Otorisasi (Aset bukan milik PIC yang login)
        if ($assetStatus['id_pic'] != $this->id_pic) {
            $this->log($qrUrl, 'BUKAN_ASET_PIC');
            return $this->failForbidden('Ini bukan aset Anda.');
        }

        // Skenario 3: SUKSES
        // Update status di daftar tugas
        $eventAssetModel->update($assetStatus['id'], [
            'status_audit'  => 'TERVERIFIKASI',
            'last_audit_at' => date('Y-m-d H:i:s')
        ]);

        // Catat di Log
        $this->log($qrUrl, 'TERVERIFIKASI');
        
        // Kirim respon sukses ke frontend
        $assetModel = new AssetModel();
        $assetInfo = $assetModel->find($id_asset_scanned);

        return $this->respond([
            'status'  => 'success',
            'message' => 'TERVERIFIKASI',
            'data'    => [
                'nama_asset' => $assetInfo['nama_asset'],
                'no_asset'   => $assetInfo['no_asset']
            ]
        ]);
    }
    public function verifyByInput()
    {
        if (!$this->request->isAJAX()) return $this->failForbidden();
        if (!$this->sesiAktif) return $this->fail('Tidak ada sesi audit aktif.');

        $input = $this->request->getPost('input_data');
        
        if (empty($input)) return $this->fail('Input tidak boleh kosong');

        // 1. Parsing Input (URL atau No Asset)
        $id_asset_target = null;
        $no_asset_target = null;

        // Cek jika input berupa URL lengkap
        if (preg_match('/\/asset\/detail\/(\d+)$/', $input, $matches)) {
            $id_asset_target = $matches[1];
        } else {
            // Anggap sebagai No Asset
            $no_asset_target = $input;
        }

        // 2. Query Pencarian yang Efektif
        $eventAssetModel = new AuditEventAssetModel();
        
        // Cari di tabel audit (tugas) dan join ke master aset
        // Kita cari berdasarkan (ID Asset dari URL) ATAU (No Asset dari input)
        // DAN harus milik PIC ini & Sesi ini
        $tugas = $eventAssetModel
            ->select('audit_event_assets.id, audit_event_assets.status_audit, asset.nama_asset, asset.no_asset')
            ->join('asset', 'asset.id_asset = audit_event_assets.id_asset')
            ->where('audit_event_assets.id_sesi', $this->sesiAktif['id_sesi'])
            ->where('audit_event_assets.id_pic', $this->id_pic)
            ->groupStart()
                ->where('asset.no_asset', $no_asset_target) // Cek No Asset
                ->orWhere('audit_event_assets.id_asset', $id_asset_target) // Atau Cek ID (jika URL)
            ->groupEnd()
            ->first();

        // 3. Validasi
        if (!$tugas) {
            return $this->failNotFound("Aset tidak ditemukan di daftar Stockopname Anda.");
        }

        if ($tugas['status_audit'] == 'TERVERIFIKASI') {
            return $this->respond([
                'status' => 'info',
                'message' => 'Aset ini sudah diverifikasi sebelumnya.',
                'data' => $tugas
            ]);
        }

        // 4. Update Status
        $eventAssetModel->update($tugas['id'], [
            'status_audit'  => 'TERVERIFIKASI',
            'last_audit_at' => date('Y-m-d H:i:s')
        ]);

        // 5. Log
        $this->log($input, 'TERVERIFIKASI_MANUAL');

        return $this->respond([
            'status' => 'success',
            'message' => 'Berhasil Diverifikasi!',
            'data' => $tugas
        ]);
    }

    // Fungsi helper untuk logging
    private function log($qrScanned, $hasil)
    {
        $logModel = new LogAuditModel();
        $logModel->insert([
            'id_sesi'           => $this->sesiAktif['id_sesi'],
            'qr_scanned'        => $qrScanned,
            'id_pic'            => $this->id_pic,
            'hasil_klasifikasi' => $hasil,
            'waktu_audit'       => date('Y-m-d H:i:s')
        ]);
    }
    public function reportMissing()
    {
        // 1. Cek Request AJAX
        if (!$this->request->isAJAX()) return $this->failForbidden();
        if (!$this->sesiAktif) return $this->fail('Tidak ada sesi audit aktif.');

        $idEventAsset = $this->request->getPost('id_event_asset');

        $eventAssetModel = new AuditEventAssetModel();

        // 2. Cari Data di Daftar Tugas (Pastikan milik PIC ini & Sesi ini)
        $tugas = $eventAssetModel->where('id', $idEventAsset)
                                 ->where('id_sesi', $this->sesiAktif['id_sesi'])
                                 ->where('id_pic', $this->id_pic)
                                 ->first();

        // 3. Validasi
        if (!$tugas) {
            return $this->failNotFound("Data tidak ditemukan atau bukan milik Anda.");
        }

        if ($tugas['status_audit'] == 'TERVERIFIKASI') {
            return $this->fail("Aset ini sudah terverifikasi ADA, tidak bisa ditandai hilang.");
        }

        // 4. Update Status jadi HILANG
        $eventAssetModel->update($idEventAsset, [
            'status_audit'  => 'HILANG',
            'last_audit_at' => date('Y-m-d H:i:s'),
            'catatan'       => 'Dilaporkan HILANG oleh PIC'
        ]);

        // 5. Catat Log (Penting!)
        // Kita butuh data aset aslinya untuk log (QR Scanned diisi string khusus)
        $this->log('LAPOR_HILANG_ID_' . $tugas['id_asset'], 'HILANG');

        return $this->respond([
            'status' => 'success',
            'message' => 'Aset berhasil ditandai HILANG.',
            'data' => $tugas
        ]);
    }
}