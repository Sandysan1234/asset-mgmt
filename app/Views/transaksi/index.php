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
            <h5>Plant</h5>
          </div>
          <div class="card tbl-card">
            <div class="card-body">
              <div class="table-responsive">
                <!-- <a href="" class="btn btn-primary mb-3">Tambah Data Pemasok</a> -->
                <a href="/transaksi/create" class="btn btn-outline-primary mb-3">Buat Transaksi</a>
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
                      <th scope="col">Nama Asset</th>
                      <th scope="col">Transaksi</th>
                      <th scope="col">Tanggal Transaksi</th>
                      <th scope="col">Alasan</th>
                      <th scope="col">Status</th>
                      <th scope="col">Date Dept Asal</th>
                      <th scope="col">Nama Dept Asal</th>
                      <th scope="col">Date Dept Tujuan</th>
                      <th scope="col">Nama Dept Tujuan</th>
                      <th scope="col">Date PIC</th>
                      <th scope="col">Nama PIC</th>
                      <th scope="col">Date Direksi</th>
                      <th scope="col">Nama Dir/PM</th>
                      <th scope="col">Date MGR FIN</th>
                      <th scope="col">Date ACC</th>
                      <th scope="col">Date CO</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Updated At</th>
                      <th scope="col">Modified By</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($transaksi as $tr) : ?>
                      <tr class="text-nowrap">

                        <td>
                          <a href="/transaksi/edit/<?= $tr['id_transaksi']; ?>" class="btn btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ti ti-edit"></i></a>
                          <form action="/transaksi/<?= $tr['id_transaksi']; ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="ti ti-trash"></i></button>
                            <!-- delete permanen karena model tidak disetting -->
                          </form>

                        </td>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $tr['nama_asset']; ?></td>


                        <?php
                        $statusList = [
                          0 => ['label' => 'Pelepasan',     'class' => 'bg-primary'],
                          1 => ['label' => 'Penghentian',   'class' => 'bg-warning'],
                          2 => ['label' => 'Penggabungan',         'class' => 'bg-secondary'],
                          3 => ['label' => 'Mutasi ',       'class' => 'bg-info'],
                        ];
                        $currentStatus = $statusList[$tr['transaksi']] ?? ['label' => 'Unknown', 'class' => 'bg-dark'];
                        ?>
                        <td>
                          <span class="badge <?= $currentStatus['class'] ?> rounded-2">
                            <?= $currentStatus['label'] ?>
                          </span>
                        </td>

                        <td><?= (new DateTime($tr['tgl_transaksi']))->format('d-m-Y H:i'); ?></td>
                        <td><?= $tr['alasan']; ?></td>
                        <td>
                          <span class="badge <?= $tr['status'] == 0 ? 'bg-danger' : 'bg-success'; ?> rounded-2">
                            <?= $tr['status'] == 0 ? 'On Progress' : 'Selesai'; ?>
                          </span>
                        </td>
                        <td><?= (new DateTime($tr['date_ttd_asal']))->format('d-m-Y H:i') ; ?></td>
                        <td><?= $tr['user_kabag_asal']; ?></td>
                        <td><?= (new DateTime($tr['date_ttd_tujuan']))->format('d-m-Y H:i'); ?></td>
                        <td><?= $tr['user_kabag_tujuan']; ?></td>
                        <td><?= (new DateTime($tr['date_pic']))->format('d-m-Y H:i'); ?></td>
                        <td><?= $tr['nama_pic']; ?></td>
                        <td><?= (new DateTime($tr['date_direksi']))->format('d-m-Y H:i'); ?></td>
                        <td><?= $tr['nama_direksi']; ?></td>
                        <td><?= (new DateTime($tr['date_ack_fin']))->format('d-m-Y H:i'); ?></td>
                        <td><?= (new DateTime($tr['date_ack_acc']))->format('d-m-Y H:i'); ?></td>
                        <td><?= (new DateTime($tr['date_ack_ctrl']))->format('d-m-Y H:i'); ?></td>
                        <td><?= (new DateTime($tr['created_at']))->format('d-m-Y H:i');  ?></td>
                        <td><?= (new DateTime($tr['updated_at']))->format('d-m-Y H:i');  ?></td>
                        <td><?= $tr['modified_by']; ?></td>
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