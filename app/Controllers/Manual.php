<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ManualBookModel;

// PENTING: Myth:Auth memerlukan helper 'auth' dimuat
helper('auth'); 

class Manual extends BaseController
{
    protected $manualModel;

    public function __construct()
    {
        $this->manualModel = new ManualBookModel();
    }

    /**
     * Menayangkan file PDF manual utama (Terproteksi Myth:Auth).
     */
    public function download()
    {
        // ===========================================
        // 1. CEK OTORISASI MENGGUNAKAN MYTH:AUTH
        // ===========================================
        if (!logged_in()) {
            // Jika pengguna belum login, Myth:Auth biasanya akan mengurus
            // redirect ke halaman login dan menampilkan pesan, 
            // tetapi kita tambahkan redirect eksplisit untuk kejelasan.
            return redirect()->to(route_to('login'))
                             ->with('error', 'Akses ditolak. Anda harus login untuk melihat manual.');
        }

        // ===========================================
        // 2. AMBIL DATA DAN PATH FILE
        // ===========================================
        $manual = $this->manualModel->getPrimaryManual();
        
        if (!$manual || !isset($manual['file_name'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data manual utama tidak terdaftar.');
        }
        
        // Path fisik file (DI LUAR FOLDER PUBLIC)
        $filePath = WRITEPATH . 'manuals/' . $manual['file_name'];

        if (!file_exists($filePath)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('File PDF manual tidak ditemukan di server.');
        }

        // ===========================================
        // 3. STREAMING (Mengirim file ke browser)
        // ===========================================
        
        $response = $this->response;
        
        $response->setStatusCode(200);
        $response->setContentType('application/pdf');
        $response->setHeader('Content-Length', filesize($filePath));
        
        // Mengatur header untuk forcing download (attachment)
        $response->setHeader('Content-Disposition', 'attachment; filename="' . urlencode($manual['judul']) . '.pdf"');
        
        $response->setBody(file_get_contents($filePath)); 

        return $response;
    }
}