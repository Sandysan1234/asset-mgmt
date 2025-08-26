<?php

namespace App\Models;

use App\Controllers\Asset;
use CodeIgniter\Model;

class AssetModel extends Model
{
  protected $table      = 'asset';
  protected $primaryKey = 'id_asset';
  protected $useTimestamps = true;
  protected $useSoftDeletes = true;
  protected $allowedFields = [
    'no_asset',
    'sub_asset',
    'nama_asset',
    'serial_number',
    'batch_number',
    'merek',
    'spek',
    'tgl_perolehan',
    'harga',
    'no_po',
    'id_assetclass',
    'id_vendor',
    'id_cost_center',
    'id_plant',
    'id_lifetime',
    'id_lokasi_area',
    'id_lokasi_gedung',
    'id_lokasi_lantai',
    'id_pic',
  ];
  // untuk search
  private array $allowedCols = [
    'asset.no_asset',
    'asset.sub_asset',
    'asset.nama_asset',
    'asset.serial_number',
    'asset.batch_number',
    'asset.merek',
    'asset.spek',
    'asset.tgl_perolehan',
    'asset.harga',
    'asset.no_po',
    'ac.nama_assetclass',
    'cc.nama_cost_center',
    'p.nama_plant',
    'v.nama_vendor',
    'lf.masa_berlaku',
    'la.nama_lokasi',
    'lg.nama_lokasi',
    'll.nama_lokasi',
    'pic.username',
    'usr.username',
    'asset.created_at',
    'asset.updated_at',
    'asset.modified_by',
    'asset.status',
    'asset.id_asset'
  ];

  public function baseRelasi()
  {
    return $this->select("
    
    asset.id_asset, asset.no_asset, asset.sub_asset, asset.nama_asset,
    asset.serial_number, asset.batch_number, asset.merek, asset.spek,
    asset.tgl_perolehan, asset.harga, asset.no_po,
    asset.id_assetclass, asset.id_cost_center, asset.id_plant, asset.id_vendor,
    asset.status, asset.created_at, asset.updated_at, asset.modified_by,

  
    ac.nama_assetclass,
    cc.nama_cost_center,
    p.nama_plant,
    v.nama_vendor,
    lf.masa_berlaku,

    la.nama_lokasi AS la,
    lg.nama_lokasi AS lg,
    ll.nama_lokasi AS ll,

    pic.username AS pic_username, pic.fullname AS pic_fullname,
    usr.username AS user_username, usr.fullname AS user_fullname
  ")
      ->join('assetclass ac', 'ac.id_assetclass = asset.id_assetclass', 'left')
      ->join('cost_center cc', 'cc.id_cost_center = asset.id_cost_center', 'left')
      ->join('plant p', 'p.id_plant = asset.id_plant', 'left')
      ->join('pemasok v', 'v.id_vendor = asset.id_vendor', 'left')
      ->join('lifetime lf', 'lf.id_lifetime = asset.id_lifetime', 'left')
      ->join('lokasi la', 'la.id_lokasi = asset.id_lokasi_area', 'left')
      ->join('lokasi lg', 'lg.id_lokasi = asset.id_lokasi_gedung', 'left')
      ->join('lokasi ll', 'll.id_lokasi = asset.id_lokasi_lantai', 'left')
      ->join('users pic', 'pic.id = asset.id_pic', 'left')
      ->join('users usr', 'usr.id = asset.id_user_asset', 'left');
  }


  private function applyFilters($b, array $req)
  {
    // Global search → LIKE ke semua kolom yang diizinkan
    $search = $req['search']['value'] ?? '';
    if ($search !== '') {
      $b->groupStart();
      foreach ($this->allowedCols as $col) {
        $b->orLike($col, $search);
      }
      $b->groupEnd();
    }

    // Ordering: ambil dari columns[idx].name (kirim dari view)
    if (!empty($req['order'][0]['column'])) {
      $idx = (int)$req['order'][0]['column'];
      $dir = strtolower($req['order'][0]['dir'] ?? 'asc') === 'desc' ? 'DESC' : 'ASC';
      $orderCol = $req['columns'][$idx]['name'] ?? '';
      if (in_array($orderCol, $this->allowedCols, true)) {
        $b->orderBy($orderCol, $dir);
      } else {
        $b->orderBy('asset.id_asset', 'DESC');
      }
    } else {
      $b->orderBy('asset.id_asset', 'DESC');
    }

    return $b;
  }
  public function dtData(array $req): array
  {
    $b = $this->baseRelasi();
    $this->applyFilters($b, $req);

    // Paging + hard cap
    $length = (int)($req['length'] ?? 25);
    $start  = (int)($req['start']  ?? 0);
    if ($length > 200) $length = 200;   // hard cap

    $b->limit($length, $start);
    return $b->get()->getResultArray();
  }

  public function dtCountAll(): int
  {
    return $this->countAll(); // total tanpa filter
  }

  public function dtCountFiltered(array $req): int
  {
    $b = $this->baseRelasi();
    $this->applyFilters($b, $req);
    return $b->countAllResults();
  }





  public function getWithRelasi($id = null, $limit = null)
  {
    $builder =  $this->select(
      '
      asset.*,
      p.nama_plant,
      v.nama_vendor,
      cc.nama_cost_center,
      ac.nama_assetclass,
      lf.masa_berlaku,
      la.nama_lokasi as la,
      lg.nama_lokasi as lg,
      ll.nama_lokasi as ll,
      pic.fullname as pic_fullname,
      pic.username as pic_username,
      usr.fullname as user_fullname,
      usr.username as user_username',
    )
      ->join('plant p', 'p.id_plant = asset.id_plant', 'left')
      ->join('pemasok v', 'v.id_vendor = asset.id_vendor', 'left')
      ->join('cost_center cc', 'cc.id_cost_center = asset.id_cost_center', 'left')
      ->join('assetclass ac', 'ac.id_assetclass = asset.id_assetclass', 'left')
      ->join('lifetime lf', 'lf.id_lifetime = asset.id_lifetime', 'left')
      ->join('lokasi la', 'la.id_lokasi = asset.id_lokasi_area', 'left')
      ->join('lokasi lg', 'lg.id_lokasi = asset.id_lokasi_gedung', 'left')
      ->join('lokasi ll', 'll.id_lokasi = asset.id_lokasi_lantai', 'left')
      ->join('users pic', 'pic.id = asset.id_pic', 'left')
      ->join('users usr', 'usr.id = asset.id_user_asset', 'left');

    if ($id !== null) {
      return $builder->where('asset.id_asset', $id)->asArray()->first();
    }
    if ($limit !== null) {
      return $builder->asArray()->findAll((int) $limit);
    }
    return $builder->asArray()->findAll();
  }
  public function suggestByNoAsset(string $term, int $limit = 10): array
  {
    $builder = $this->db->table('asset')
      ->select("
                asset.*,
                ac.nama_assetclass   AS asset_class,
                p.nama_plant         AS plant,
                cc.nama_cost_center  AS cost_center,
                la.nama_lokasi       AS area,
                lg.nama_lokasi       AS gedung,
                ll.nama_lokasi       AS lantai
            ")
      ->join('assetclass ac', 'ac.id_assetclass = asset.id_assetclass', 'left')
      ->join('plant p',       'p.id_plant       = asset.id_plant', 'left')
      ->join('cost_center cc', 'cc.id_cost_center= asset.id_cost_center', 'left')
      ->join('lokasi la',     'la.id_lokasi     = asset.id_lokasi_area', 'left')
      ->join('lokasi lg',     'lg.id_lokasi     = asset.id_lokasi_gedung', 'left')
      ->join('lokasi ll',     'll.id_lokasi     = asset.id_lokasi_lantai', 'left')
      ->groupStart()
      ->like('asset.no_asset', $term, 'after')
      ->orLike('asset.nama_asset', $term, 'both')
      ->groupEnd()
      ->orderBy('asset.no_asset', 'ASC')
      ->limit($limit);
    // hormati soft delete (kalau pakai)
    if ($this->useSoftDeletes && ! empty($this->deletedField)) {
      $builder->where('asset.' . $this->deletedField, null);
    }

    return $builder->get()->getResultArray();
  }

  /**
   * Optional: ambil detail satu asset by no_asset (untuk kebutuhan non-autocomplete)
   */
  public function getWithRelasiByNoAsset(string $noasset): ?array
  {
    $builder = $this->db->table('asset')
      ->select("
                asset.*,
                ac.nama_assetclass   AS asset_class,
                p.nama_plant         AS plant,
                cc.nama_cost_center  AS cost_center,
                la.nama_lokasi       AS area,
                lg.nama_lokasi       AS gedung,
                ll.nama_lokasi       AS lantai
            ")
      ->join('assetclass ac', 'ac.id_assetclass = asset.id_assetclass', 'left')
      ->join('plant p',       'p.id_plant       = asset.id_plant', 'left')
      ->join('cost_center cc', 'cc.id_cost_center= asset.id_cost_center', 'left')
      ->join('lokasi la',     'la.id_lokasi     = asset.id_lokasi_area', 'left')
      ->join('lokasi lg',     'lg.id_lokasi     = asset.id_lokasi_gedung', 'left')
      ->join('lokasi ll',     'll.id_lokasi     = asset.id_lokasi_lantai', 'left')
      ->where('asset.no_asset', $noasset);

    if ($this->useSoftDeletes && ! empty($this->deletedField)) {
      $builder->where('asset.' . $this->deletedField, null);
    }

    return $builder->get()->getRowArray() ?: null;
  }
}
