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
            <h5>Perubahan Asset</h5>
          </div>
          <div class="card tbl-card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    Klik dan Cari No Asset
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                      <input type="text" class="form-control" placeholder="Cari..." id="dropdownSearchInput">
                    </li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <?php foreach ($no_asset as $na): ?>
                      <li><a class="dropdown-item" href="#" onclick="selectAsset('<?= $na['no_asset']; ?>')"><?= $na['no_asset']; ?></a></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <form class="row g-3">
                  <div class="col-md-6">
                    <label for="assetclass" class="form-label">Asset Class</label>
                    <input type="text" class="form-control" id="assetclass" value="" readonly>
                    <!-- <div class="valid-feedback">
                      Looks good!
                    </div> -->
                  </div>
                  <div class="col-md-6">
                    <label for="validationServer04" class="form-label">Tindakan</label>
                    <select class="form-select" id="validationServer04" aria-describedby="validationServer04Feedback" required>
                      <option selected disabled value="">Choose...</option>
                      <option value="1">Mutasi Asset</option>
                      <option value="2">Penghentian Asset</option>
                      <option value="3">Pelepasan Asset</option>
                      <option value="3">Penggabungan Asset</option>
                    </select>
                    </select>
                    <!-- <div id="validationServer04Feedback" class="invalid-feedback">
                      Please select a valid state.
                    </div> -->
                  </div>
                  <h5>Department Asal</h5>
                  <div class="col-md-4">
                    <label for="plant" class="form-label">Plant</label>
                    <input type="text" class="form-control" name="" id="plant" value="" required>
                    <!-- <div class="valid-feedback">
                      Looks good!
                    </div> -->
                  </div>
                  <div class="col-md-4">
                    <label for="cost_center" class="form-label">Cost Center</label>
                    <input type="text" class="form-control" name="" id="cost_center" value="" required>
                    <!-- <div class="valid-feedback">
                      Looks good!
                    </div> -->
                  </div>
                  <div class="col-md-4">
                    <label for="validationServer01" class="form-label">No Asset</label>
                    <input type="text" class="form-control" name="" id="validationServer01" value="" required>
                    <!-- <div class="valid-feedback">
                      Looks good!
                    </div> -->
                  </div>
                  <div class="col-md-4">
                    <label for="validationServer02" class="form-label">Sub Asset</label>
                    <input type="text" class="form-control" name="" id="validationServer02" value="" required>
                    <!-- <div class="valid-feedback">
                      Looks good!
                    </div> -->
                  </div>
                  <div class="col-md-4">
                    <label for="nama_asset" class="form-label">Nama Asset</label>
                    <input type="text" class="form-control nama_asset" name="" id="nama_asset" value="" required>
                    <!-- <div class="valid-feedback">
                      Looks good!
                    </div> -->
                  </div>
                  <div class="col-md-4">
                    <label for="validationServer02" class="form-label">Tanggal Perolehan</label>
                    <input type="date" class="form-control" name="" id="validationServer02" value="" required>
                    <!-- <div class="valid-feedback">
                      Looks good!
                    </div> -->
                  </div>
                  <div class="col-md-4">
                    <label for="area" class="form-label">Area</label>
                    <input type="text" class="form-control" id="area" aria-describedby="areaFeedback" required>
                    <!-- <div id="validationServer03Feedback" class="invalid-feedback">
                      Please provide a valid city.
                    </div> -->
                  </div>
                  <div class="col-md-4">
                    <label for="gedung" class="form-label">Gedung</label>
                    <input type="text" class="form-control" name="" id="gedung" value="" required>
                    <!-- <div class="valid-feedback">
                      Looks good!
                    </div> -->
                  </div>
                  <div class="col-md-4">
                    <label for="lantai" class="form-label">Lantai</label>
                    <input type="text" class="form-control" name="" id="lantai" value="" required>
                    <!-- <div class="valid-feedback">
                      Looks good!
                    </div> -->
                  </div>
                  <div class="col-md-12">
                    <label for="alasan" class="form-label">Alasan</label>
                    <textarea class="form-control" name="" id="alasan"></textarea>
                    <!-- <div id="validationServer03Feedback" class="invalid-feedback">
                      Please provide a valid city.
                    </div> -->
                  </div>
                  <h6>Department Tujuan</h6>
                  <div class="col-md-3">
                    <label for="plant" class="form-label">Plant</label>
                    <select class="form-select plant" id="plant" aria-describedby="validationServer04Feedback" required>
                      <option selected disabled value="">Choose...</option>
                      <option>...</option>
                      <option>allala</option>
                    </select>
                    <!-- <div id="validationServer04Feedback" class="invalid-feedback">
                      Please select a valid state.
                    </div> -->
                  </div>
                  <div class="col-md-3">
                    <label for="cost_center" class="form-label">Cost Center</label>
                    <select class="form-select cost_center" id="cost_center" aria-describedby="validationServer04Feedback" required>
                      <option selected disabled value="">Choose...</option>
                      <option>...</option>
                      <option>allala</option>
                    </select>
                    <!-- <div id="validationServer04Feedback" class="invalid-feedback">
                      Please select a valid state.
                    </div> -->
                  </div>
                  <div class="col-md-3">
                    <label for="no_asset" class="form-label">No Asset</label>
                    <input type="text" class="form-control no_asset" name="" id="no_asset" value="" required>
                    <!-- <div class="valid-feedback">
                      Looks good!
                    </div> -->
                  </div>
                  <div class="col-md-3">
                    <label for="nama_asset" class="form-label">Nama Asset</label>
                    <input type="text" class="form-control nama_asset" name="" id="nama_asset" value="" required>
                    <!-- <div class="valid-feedback">
                      Looks good!
                    </div> -->
                  </div>
                  <div class="col-md-6">
                    <div class="card mb-0">
                      <div class="card-body">
                        <h6>Dept. Asal</h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                        </div>
                        <label class="form-check-label" for="switchCheckDefault">Kabag</label>
                        <input type="date" class="form-control" name="" id="validationServer02" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card mb-0">
                      <div class="card-body">
                        <h6>Dept. Tujuan:</h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                        </div>
                        <label class="form-check-label" for="switchCheckDefault">Kabag</label>
                        <input type="date" class="form-control" name="" id="validationServer02" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body">
                        <h6>Menyetujui,</h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                        </div>
                        <label class="form-check-label" for="switchCheckDefault">IT</label>
                        <input type="date" class="form-control" name="" id="validationServer02" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card">
                      <div class="card-body">
                        <h6>Menyetujui,</h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                        </div>
                        <label class="form-check-label" for="switchCheckDefault">Direksi</label>
                        <input type="date" class="form-control" name="" id="validationServer02" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h6>Mengetahui,</h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                        </div>
                        <label class="form-check-label" for="switchCheckDefault">Manager Finance</label>
                        <input type="date" class="form-control" name="" id="validationServer02" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h6>Mengetahui,</h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                        </div>
                        <label class="form-check-label" for="switchCheckDefault">Accounting</label>
                        <input type="date" class="form-control" name="" id="validationServer02" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card">
                      <div class="card-body">
                        <h6>Mengetahui,</h6>
                        <div class="form-check form-switch custom-switch-v1 my-3">
                          <input class="form-check-input" type="checkbox" role="switch" id="switchCheckDefault">
                        </div>
                        <label class="form-check-label" for="switchCheckDefault">Controlling</label>
                        <input type="date" class="form-control" name="" id="validationServer02" value="" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <textarea class="form-control" aria-label="With textarea" placeholder="Catatan Pojok"></textarea>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                  </div>
                </form>
                <!-- -- ==================== =============================== -->

              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        document.getElementById('dropdownSearchInput').addEventListener('keyup', function() {
          const filter = this.value.toUpperCase();
          const items = document.querySelectorAll('.dropdown-menu .dropdown-item');

          items.forEach(item => {
            const text = item.textContent || item.innerText;
            item.style.display = text.toUpperCase().indexOf(filter) > -1 ? '' : 'none';
          });
        });
      </script>
      <script>
        document.getElementById('search').addEventListener('change', function() {
          const noAsset = this.value;

          fetch(`/transaksi/cari?no_asset=${noAsset}`)
            .then(response => response.json())
            .then(result => {
              if (result.status) {
                const d = result.data;
                document.querySelector('.asset_class').value = d.nama_assetclass || '';
                document.querySelector('.plant').value = d.nama_plant || '';
                document.querySelector('.cost_center').value = d.nama_cost_center || '';
                document.getElementById('sub_asset').value = d.sub_asset || '';
                document.querySelector('.nama_asset').forEach(el => {
                  el.value = d.nama_asset || '';
                });
                document.getElementById('tgl_perolehan').value = d.tgl_perolehan?.substring(0, 10) || '';
                document.getElementById('area').value = d.nama_area || '';
                document.getElementById('gedung').value = d.nama_gedung || '';
                document.getElementById('lantai').value = d.nama_lantai || '';
              } else {
                alert(result.message);
              }
            });
        });
      </script>
      <script>
        document.getElementById('search').addEventListener('keypress', function(e) {
          if (e.key === 'Enter') {
            this.dispatchEvent(new Event('change'));
            e.preventDefault();
          }
        });
      </script>

      <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
  </div>
  <?= $this->endSection(); ?>