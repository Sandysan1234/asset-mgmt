<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="pc-container">
  <div class="pc-content">
    <!-- [ breadcrumb ] start -->
    <!-- <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
                <h5 class="m-b-10">Sample Page</h5>
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard/index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Other</a></li>
                <li class="breadcrumb-item" aria-current="page">Sample Page</li>
              </ul>
            </div>
          </div>
        </div>
      </div> -->
    <!-- [ breadcrumb ] end -->

    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript: void(0)">Pages</a></li>
              <li class="breadcrumb-item" aria-current="page">Asset Log</li>
            </ul>
          </div>
          <div class="col-md-12">
            <div class="page-header-title">
              <h2 class="m-b-10">Asset Log</h5>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Asset Log</h5>
          </div>
          <div class="card tbl-card">
            <div class="card-body">
              <div class="table-responsive">
                <!-- <a href="" class="btn btn-primary mb-3">Tambah Data Pemasok</a> -->
                <!-- <a href="/lifetime/create" class="btn btn-outline-primary mb-3">Tambah Data Lifetime</a> -->
                <?php if (session()->getFlashdata('pesan')): ?>
                  <div class="alert alert-success">
                    <?= session()->getFlashdata('pesan'); ?>
                  </div>
                <?php endif; ?>
                <table id="myTable-client" class="table table-hover table-borderless" style="width:100%">
                  <thead class="bg-light">
                    <tr class="text-nowrap">
                      <!-- <th scope="col">Handle</th> -->
                      <th scope="col">No</th>
                      <th scope="col">Asset</th>
                      <th scope="col">Kolom Yang Diubah</th>
                      <th scope="col">Nilai Lama</th>
                      <th scope="col">Nilai Baru</th>
                      <th scope="col">Waktu Perubahan</th>
                      <th scope="col">Diubah Oleh</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($assetlogs as $lt) : ?>
                      <tr class="text-nowrap">
                        <!-- <td>
                          <a href="/lifetime/edit/?= $lt['id_lifetime']; ?>" class="btn btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ti ti-edit"></i></a>
                          <form action="/lifetime/?= $lt['id_lifetime']; ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            ?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="ti ti-trash"></i></button>
                            <!-- delete permanen karena model tidak disetting --
                          </form>
                        </td> -->

                        <th scope="row"><?= $i++; ?></th>
                        <td><?= esc($lt['nama_asset']); ?></td>
                        <td><?= esc($lt['kolom_yang_diubah']); ?> </td>
                        <td><?= esc($lt['nilai_lama']); ?> </td>
                        <td><?= esc($lt['nilai_baru']); ?> </td>
                        <td><?= esc($lt['waktu_perubahan']); ?> </td>
                        <td><?= esc($lt['diubah_oleh']); ?> </td>
                        <td><?= esc($lt['aksi']); ?> </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
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