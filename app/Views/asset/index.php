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
                      <th scope="col">Spek Asset</th>
                      <th scope="col">Tanggal Perolehan</th>
                      <th scope="col">Harga</th>
                      <th scope="col">No Purchase Order</th>
                      <th scope="col">Asset Class</th>
                      <th scope="col">Cost Center</th>
                      <th scope="col">Plant</th>
                      <!-- idvendor -->
                      <th scope="col">Vendor</th>
                      <th scope="col">Lifetime</th>
                      <th scope="col">Status</th>
                      <th scope="col">PIC</th>
                      <th scope="col">User Asset</th>
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
                        <td>Rp <?= esc(number_format($as['harga'], 2, ',', '.')); ?></td>
                        <td><?= esc($as['no_po']); ?></td>
                        <td><?= esc($as['id_assetclass'] . ' - ' . $as['nama_assetclass']); ?></td>
                        <td><?= esc($as['id_cost_center'] . ' - ' . $as['nama_cost_center']); ?></td>
                        <td><?= esc($as['id_plant'] .  ' -  ' . $as['nama_plant']); ?></td>
                        <td><?= esc($as['id_vendor'] . ' - ' . $as['nama_vendor']); ?></td>
                        <td><?= esc($as['masa_berlaku']); ?> Tahun</td>
                        <?php
                        $statusList = [
                          0 => ['label' => 'Proses Pelepasan',     'class' => 'bg-primary'],
                          1 => ['label' => 'Proses Penghentian',   'class' => 'bg-warning'],
                          2 => ['label' => 'Penggabungan',         'class' => 'bg-secondary'],
                          3 => ['label' => 'Proses Mutasi ',       'class' => 'bg-info'],
                          4 => ['label' => 'Non-Aktif ',           'class' => 'bg-danger'],
                          5 => ['label' => 'Aktif',                'class' => 'bg-success'],
                        ];
                        $currentStatus = $statusList[$as['status']] ?? ['label' => 'Unknown', 'class' => 'bg-dark'];
                        ?>
                        <td>
                          <span class="badge <?= $currentStatus['class'] ?> rounded-2">
                            <?= $currentStatus['label'] ?>
                          </span>
                        </td>
                        <td><?= esc($as['pic_username']) . ' - ' . $as['pic_fullname']; ?></td>
                        <td><?= esc($as['user_username']) . ' - ' . $as['user_fullname']; ?></td>
                        <td><?= (new DateTime($as['created_at']))->format('d-m-Y H:i');  ?></td>
                        <td><?= (new DateTime($as['updated_at']))->format('d-m-Y H:i');  ?></td>
                        <td><?= $as['modified_by']; ?></td>
                        <td>
                          <a href="/asset/detail/<?= $as['id_asset'];?>" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail"><i class="ti ti-file-search"></i></a>
                          <a href="/asset/edit/<?= $as['id_asset']; ?>" class="btn btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ti ti-alert-triangle"></i></a>
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