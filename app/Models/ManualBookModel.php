<?php namespace App\Models;

use CodeIgniter\Model;

class ManualBookModel extends Model
{
    protected $table = 'manual_books';
    protected $primaryKey = 'id';
    // Fields yang dibutuhkan: judul (untuk header), file_name (unik di server)
    protected $allowedFields = ['judul', 'file_name', 'path']; 

    /**
     * Mengambil data untuk manual utama
     */
    public function getPrimaryManual()
    {
        // Ganti ID 1 dengan ID file manual yang ingin Anda tayangkan
        return $this->find(1); 
    }
}