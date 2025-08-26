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
            <h5>Users</h5>
          </div>
          <div class="card tbl-card">
            <div class="card-body">
              <div class="table-responsive">
                <!-- <a href="" class="btn btn-primary mb-3">Tambah Data Pemasok</a> -->
                <!-- <a href="/plant/create" class="btn btn-outline-primary mb-3">Tambah Data Plant</a> -->
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
                      <th scope="col">Username</th>
                      <th scope="col">Email</th>
                      <th scope="col">Fullname</th>
                      <th scope="col">Group</th>
                      <th scope="col">Permissions</th>
                      <th scope="col">Status</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user) : ?>
                      <tr class="text-nowrap">
                        <!-- <td>
                          <a href="/plant/edit/?= $user['id_plant']; ?>" class="btn btn-icon btn-warning disabled" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"><i class="ti ti-edit"></i></a>
                          <form action="/plant/?= $user['id_plant']; ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            ?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-icon btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete"><i class="ti ti-trash"></i></button>
                            delete permanen karena model tidak disetting
                          </form>

                        </td> -->
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><?= esc($user['fullname'] ?? '–') ?></td>
                        <td>
                          <strong class="text-capitalize"><?= esc($user['group_name']) ?></strong><br>
                          <small class="text-muted"><?= esc($user['group_description']) ?></small>
                        </td>
                        <td>
                          <?php if (empty($user['permissions_list'])): ?>
                            <span class="text-muted">Tidak ada permission</span>
                          <?php else: ?>
                            <?php foreach ($user['permissions_list'] as $perm): ?>
                              <h5><span class="badge bg-primary rounded-2 mb-1"><?= esc(trim($perm)) ?></span></h5>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </td>
                        <td>
                          <span class="badge rounded-2 <?= $user['active'] ? 'bg-success' : 'bg-danger' ?>">
                            <?= $user['active'] ? 'Aktif' : 'Nonaktif' ?>
                          </span>
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

<!-- [ Main Content ] end -->

<?= $this->endSection(); ?>