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
            <h5>Transaksi</h5>
          </div>
          <div class="card tbl-card">
            <div class="card-body">
              <div class="table-responsive">
                <!-- <a href="" class="btn btn-primary mb-3">Tambah Data Pemasok</a> -->
                <?php if (has_permission('transaksi_create')): ?>
                  <a href="/transaksi/create" class="btn btn-outline-primary mb-3">Buat Transaksi</a>
                <?php endif; ?>
                <?php if (session()->getFlashdata('pesan')): ?>
                  <div class="alert alert-success">
                    <?= session()->getFlashdata('pesan'); ?>
                  </div>
                <?php endif; ?>
                <?php if (session()->has('error')): ?>
                  <div class="alert alert-danger" role="alert">
                    <?= session('error') ?>
                  </div>
                <?php endif; ?>
                <table id="myTable-client" class="table table-hover table-borderless" style="width:100%">
                  <thead class="bg-light">
                    <tr class="text-nowrap">
                      <th scope="col">Handle</th>
                      <th scope="col">No</th>
                      <th scope="col">No Asset</th>
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
                      <th scope="col">Created By</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($transaksi as $tr) : ?>
                      <tr class="text-nowrap">
                        <td>
                          <a href="/transaksi/edit/<?= $tr['id_transaksi']; ?>" class="btn btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ti ti-edit"></i></a>
                          <?php if (in_groups('pic')): ?>
                            <form action="/transaksi/<?= $tr['id_transaksi']; ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                              <?= csrf_field(); ?>
                              <input type="hidden" name="_method" value="DELETE">
                              <button type="submit" class="btn btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="ti ti-trash"></i></button>
                              <!-- delete permanen karena model tidak disetting -->
                            </form>
                          <?php endif; ?>
                          <?php if (has_permission('ack_finance')): ?>
                            <?php if ($tr['status'] == '2'): ?>
                              <a href="#"
                                class="btn btn-icon btn-light-info"
                                data-bs-toggle="modal"
                                data-bs-target="#modalCancel"
                                data-id="<?= $tr['id_transaksi'] ?>"
                                data-asset="<?= $tr['no_asset'] ?> — <?= $tr['nama_asset'] ?>"
                                data-bs-placement="top"
                                data-bs-title="Batalkan Transaksi"
                                data-bs-toggle-tooltip="tooltip"> <!-- tambahkan ini agar tooltip aktif -->
                                <i class="ti ti-arrow-back"></i> <!-- atau gunakan ikon lain: fa-trash, fa-ban -->
                              </a>
                            <?php endif; ?>
                          <?php endif; ?>
                        </td>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $tr['no_asset']; ?></td>
                        <td><?= $tr['nama_asset']; ?></td>


                        <?php
                        $jenis_transaksi = [
                          0 => ['label' => 'Pelepasan',     'class' => 'bg-primary'],
                          1 => ['label' => 'Penghentian',   'class' => 'bg-warning'],
                          2 => ['label' => 'Penggabungan',  'class' => 'bg-secondary'],
                          3 => ['label' => 'Mutasi ',       'class' => 'bg-info'],
                        ];
                        $transaksistate = $jenis_transaksi[$tr['transaksi']] ?? ['label' => 'Unknown', 'class' => 'bg-dark'];
                        ?>
                        <td>
                          <span class="badge <?= $transaksistate['class'] ?> rounded-2">
                            <?= $transaksistate['label'] ?>
                          </span>
                        </td>

                        <td><?= (new DateTime($tr['tgl_transaksi']))->format('d-m-Y H:i'); ?></td>
                        <td><?= $tr['alasan']; ?></td>
                        <?php $statuslist = [
                          0 => ['label' => 'onprogress',     'class' => 'bg-primary'],
                          1 => ['label' => 'approve',        'class' => 'bg-warning'],
                          2 => ['label' => 'complete',       'class' => 'bg-success'],
                          3 => ['label' => 'cancelled ',       'class' => 'bg-danger'],

                        ];
                        $currentstatus = $statuslist[$tr['status']] ?? ['label' => 'Unknown', 'class' => 'bg-dark'];
                        ?>
                        <td>
                          <span class="badge <?= $currentstatus['class'] ?> rounded-2">
                            <?= $currentstatus['label'] ?>
                          </span>
                        </td>

                        <!-- <td>?= (new DateTime($tr['date_ttd_asal']))->format('d-m-Y H:i') ; ?></td> -->
                        <td><?= $tr['date_ttd_asal'] ? (new DateTime($tr['date_ttd_asal']))->format('d-m-Y H:i') : '<span class="badge bg-danger rounded-2">Pending</span>'; ?></td>
                        <td><?= $tr['user_kabag_asal']; ?></td>
                        <td><?= $tr['date_ttd_tujuan'] ? (new DateTime($tr['date_ttd_tujuan']))->format('d-m-Y H:i') : '<span class="badge bg-danger rounded-2">Pending</span>'; ?></td>
                        <td><?= $tr['user_kabag_tujuan']; ?></td>
                        <td><?= $tr['date_pic'] ? (new DateTime($tr['date_pic']))->format('d-m-Y H:i') : '<span class="badge bg-danger rounded-2">Pending</span>'; ?></td>
                        <!-- <td>?= (new DateTime($tr['date_ttd_tujuan']))->format('d-m-Y H:i'); ?></td> -->
                        <!-- <td>?= (new DateTime($tr['date_pic']))->format('d-m-Y H:i'); ?></td> -->
                        <td><?= $tr['nama_pic']; ?></td>
                        <!-- <td>?= (new DateTime($tr['date_direksi']))->format('d-m-Y H:i'); ?></td> -->
                        <td><?= $tr['date_direksi'] ? (new DateTime($tr['date_direksi']))->format('d-m-Y H:i') : '<span class="badge bg-danger rounded-2">Pending</span>'; ?></td>
                        <td><?= $tr['nama_direksi']; ?></td>
                        <td><?= $tr['date_ack_fin'] ? (new DateTime($tr['date_ack_fin']))->format('d-m-Y H:i') : '<span class="badge bg-danger rounded-2">Pending</span>'; ?></td>
                        <td><?= $tr['date_ack_acc'] ? (new DateTime($tr['date_ack_acc']))->format('d-m-Y H:i') : '<span class="badge bg-danger rounded-2">Pending</span>'; ?></td>
                        <td><?= $tr['date_ack_ctrl'] ? (new DateTime($tr['date_ack_ctrl']))->format('d-m-Y H:i') : '<span class="badge bg-danger rounded-2">Pending</span>'; ?></td>
                        <td><?= (new DateTime($tr['created_at']))->format('d-m-Y H:i');  ?></td>
                        <td><?= (new DateTime($tr['updated_at']))->format('d-m-Y H:i');  ?></td>
                        <td><?= $tr['modified_by']; ?></td>
                        <td><?= $tr['username']; ?></td>
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
<!-- Modal Batalkan -->
<div class="modal fade" id="modalCancel" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= base_url('transaksi/cancel') ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="id_transaksi" id="cancel_id">

        <div class="modal-header">
          <h5 class="modal-title">Batalkan Transaksi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Yakin ingin membatalkan transaksi untuk aset:</p>
          <strong id="cancel_asset"></strong>
          <p class="mt-3">Catatan pembatalan (opsional):</p>
          <textarea name="catatan_pembatalan" class="form-control" rows="3"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Ya, Batalkan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi tooltip untuk semua elemen dengan [data-bs-toggle-tooltip="tooltip"]
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle-tooltip="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(el => new bootstrap.Tooltip(el));

    // Isi modal dengan data
    const modal = document.getElementById('modalCancel');
    if (modal) {
      modal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const asset = button.getAttribute('data-asset');

        document.getElementById('cancel_id').value = id;
        document.getElementById('cancel_asset').textContent = asset;
      });
    }
  });
</script>

<!-- [ Main Content ] end -->

<?= $this->endSection(); ?>