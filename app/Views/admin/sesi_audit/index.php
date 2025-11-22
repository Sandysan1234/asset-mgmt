<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="pc-container">
  <div class="pc-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript: void(0)">Pages</a></li>
              <li class="breadcrumb-item" aria-current="page">Jadwal Stockopname</li>
            </ul>
          </div>
          <div class="col-md-12">
            <div class="page-header-title">
              <h2 class="m-b-10">Jadwal Stockopname</h5>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5>List Jadwal Stockopname</h5>
          </div>
          <div class="card-body tbl-card">
            <div class="table-responsive">
              <!-- <a href="" class="btn btn-primary mb-3">Tambah Data Pemasok</a> -->
              <a href="<?= base_url('/admin/sesi-audit/new') ?>" class="btn btn-outline-primary mb-3">
                + Buat Jadwal Stock Opname
              </a>
              <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-success">
                  <?= session()->getFlashdata('message') ?>
                </div>
              <?php endif; ?>
              <table id="myTable-client" class="table table-hover table-borderless" style="width:100%">
                <thead class="bg-light">
                  <tr class="">
                    <th>Nama Sesi</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                    <th class="">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($sesi_list as $sesi) : ?>
                    <tr class="">
                      <td><?= esc($sesi['nama_sesi']) ?></td>
                      <td><?= esc($sesi['tanggal_mulai']) ?></td>
                      <td><?= esc($sesi['tanggal_selesai']) ?></td>
                      <td>
                          <?php if ($sesi['status'] == 'OPEN') : ?>
                              <span class="badge bg-success">OPEN</span>
                          <?php else : ?>
                              <span class="badge bg-secondary">CLOSED</span>
                          <?php endif; ?>
                      </td>
                      <td>
                        <a href="<?= base_url('admin/sesi-audit/detail/' . $sesi['id_sesi']) ?>" 
                        class="avtar mx-1 avtar-xs btn-light-info">
                          <i class="ti ti-eye fs-4"></i>
                        </a>
                        <form action="<?= base_url('admin/sesi-audit/delete/' . $sesi['id_sesi']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                          <?= csrf_field(); ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="avtar mx-1 avtar-xs btn-light-danger"><i class="ti ti-trash fs-4"></i></button>
                          <!-- delete permanen karena model tidak disetting -->
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ sample-page ] end -->
  </div>
  <!-- [ Main Content ] end -->
</div>

<!-- [ Main Content ] end -->
<?= $this->endSection('page-content'); ?>