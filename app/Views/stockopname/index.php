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
            <h5>Stock Opname</h5>
          </div>
          <div class="card tbl-card">
            <div class="card-body">
              <div class="table-responsive">
                <!-- <a href="" class="btn btn-primary mb-3">Tambah Data Pemasok</a> -->
                <a href="/stock-opname/create" class="btn btn-outline-primary mb-3">Tambah Data Plant</a>
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
                      <th scope="col">No Transaksi</th>
                      <th scope="col">No Asset</th>
                      <th scope="col">Nama Asset</th>
                      <th scope="col">Status</th>
                      <th scope="col">Tanggal Stockopname</th>
                      <th scope="col">Updated At</th>
                      <th scope="col">Created By</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($stocks as $stock) : ?>
                      <tr class="text-nowrap">
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $stock['no_transaksi']; ?></td>
                        <td><?= $stock['no_asset']; ?></td>
                        <td><?= $stock['nama_asset']; ?></td>
                        <td>
                          <?= $stock['status_asset'];?>
                        </td>
                        <td><?= $stock['tgl_stockopname'] ?></td>
                        <td><?= $stock['updated_at']; ?></td>
                        <td><?= $stock['created_by']; ?></td>

                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div id="alertToast" class="alert alert-warning alert-fixed d-none"></div>
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