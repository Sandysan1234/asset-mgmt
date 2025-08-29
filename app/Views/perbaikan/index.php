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

    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>Perbaikan</h5>
          </div>
          <div class="card tbl-card">
            <div class="card-body">
              <div class="table-responsive">
                <!-- <a href="" class="btn btn-primary mb-3">Tambah Data Pemasok</a> -->
                <a href="/perbaikan/create" class="btn btn-outline-primary mb-3">Tambah Data Perbaikan</a>
                <?php if (session()->getFlashdata('pesan')): ?>
                  <div class="alert alert-success">
                    <?= session()->getFlashdata('pesan'); ?>
                  </div>
                <?php endif; ?>
                <table id="myTable-client" class="table table-hover table-borderless" style="width:100%">
                  <thead class="bg-light">
                    <tr class="text-nowrap">
                      <th scope="col">Handle</th>
                      <th scope="col">No</th>
                      <th scope="col">Jenis Perbaikan</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Biaya</th>
                      <th scope="col">Teknisi</th>
                      <th scope="col">Durasi</th>
                      <th scope="col">Tempat Service</th>
                      <th scope="col">Status</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Updated At</th>
                      <th scope="col">Modified By</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($repairs as $repair) : ?>
                      <tr class="text-nowrap">
                        <td>
                          <a href="/perbaikan/edit/<?= $repair['id_perbaikan']; ?>" class="btn btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ti ti-edit"></i></a>
                          <form action="/perbaikan/<?= $repair['id_perbaikan']; ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="ti ti-trash"></i></button>
                            <!-- delete permanen karena model tidak disetting -->
                          </form>

                        </td>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $repair['jenis_perbaikan ']; ?></td>
                        <td><?= $repair['keterangan']; ?></td>
                        <td><?= $repair['biaya']; ?></td>
                        <td><?= $repair['teknisi']; ?></td>
                        <td><?= $repair['durasi']; ?></td>
                        <td><?= $repair['place']; ?></td>
                        <td>
                          <span class="badge <?= $repair['status'] == 1 ? 'bg-success' : 'bg-danger'; ?> rounded-2">
                            <?= $repair['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?>
                          </span>
                        </td>
                        <td><?= (new DateTime($repair['created_at']))->format('d-m-Y H:i');  ?></td>
                        <td><?= (new DateTime($repair['updated_at']))->format('d-m-Y H:i');  ?></td>
                        <td><?= $repair['modified_by']; ?></td>

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

<?= $this->endSection(); ?>