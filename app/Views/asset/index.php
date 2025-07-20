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
            <h5>Asset</h5>
          </div>
          <div class="card tbl-card">
            <div class="card-body">
              <div class="table-responsive">
                <!-- <a href="" class="btn btn-primary mb-3">Tambah Data Pemasok</a> -->
                <a href="/asset/create" class="btn btn-outline-primary mb-3">Tambah Data Asset</a>
                <?php if (session()->getFlashdata('pesan')): ?>
                  <div class="alert alert-success">
                    <?= session()->getFlashdata('pesan'); ?>
                  </div>
                <?php endif; ?>
                <table id="myTable" class="table table-hover table-borderless" style="width:100%">
                  <thead class="bg-light">
                    <tr class="text-nowrap">
                      <th scope="col">No</th>
                      <th scope="col">No Asset</th>
                      <th scope="col">Sub Asset</th>
                      <th scope="col">Nama Asset</th>
                      <th scope="col">Serial Number</th>
                      <th scope="col">Batch Number</th>
                      <th scope="col">Merek</th>
                      <th scope="col">Spek</th>
                      <th scope="col">Tanggal Perolehan</th>
                      <th scope="col">Harga</th>
                      <th scope="col">No PO</th>
                      <th scope="col">Status</th>
                      <th scope="col">Id Asset Class</th>
                      <th scope="col">Id Vendor</th>
                      <th scope="col">Id Cost Center</th>
                      <th scope="col">Id Plant</th>
                      <th scope="col">Id Lifetime</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Updated At</th>
                      <th scope="col">Modified By</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($asset as $as) : ?>
                      <tr class="text-nowrap">
                        <th scope="row"><?= $i++; ?></th>

                        <td><?= esc($as['no_asset']); ?></td>
                        <td><?= esc($as['sub_asset']); ?></td>
                        <td><?= esc($as['nama_asset']); ?></td>
                        <td><?= esc($as['serial_number']); ?></td>
                        <td><?= esc($as['batch_number']); ?></td>
                        <td><?= esc($as['merek']); ?></td>
                        <td><?= esc($as['spek']); ?></td>
                        <td><?= esc($as['tgl_perolehan']); ?></td>
                        <td><?= esc($as['harga']); ?></td>
                        <td><?= esc($as['no_po']); ?></td>
                        <td>
                          <span class="badge rounded-pill <?= $as['status'] == 1 ? 'bg-success' : 'bg-danger'; ?> rounded-2">
                            <?= $as['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?>
                          </span>
                        </td>
                        <td><?= $as['id_assetclass']; ?></td>
                        <td><?= $as['id_vendor']; ?></td>
                        <td><?= $as['id_cost_center']; ?></td>
                        <td><?= $as['id_plant']; ?></td>
                        <td><?= $as['id_lifetime']; ?></td>
                        <td><?= (new DateTime($as['created_at']))->format('d-m-Y H:i');  ?></td>
                        <td><?= (new DateTime($as['updated_at']))->format('d-m-Y H:i');  ?></td>
                        <td><?= $as['modified_by']; ?></td>
                        <td>
                          <a href="/asset/edit/<?= $as['id_asset']; ?>" class="btn btn-sm btn-warning">Edit</a>
                          <form action="/asset/<?= $as['id_asset']; ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
    </div>
    <!-- [ sample-page ] end -->
  </div>
  <!-- [ Main Content ] end -->
</div>

<?= $this->endSection('page-content'); ?>