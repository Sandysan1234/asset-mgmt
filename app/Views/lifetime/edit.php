<!-- [ Main Content ] start -->
<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Form Tambah Data Lifetime</h5>
                    </div>
                    <div class="card-body">
                        <form action="/lifetime/update/<?= $lifetime['id_lifetime'];?>" method="post">
                            <?= csrf_field(); ?>
                            <!-- <div class="row mb-3">
                                <label for="kode_lifetime" class="col-sm-3 col-form-label">Kode Lifetime</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= (validation_show_error('kode_lifetime')) ? 'is-invalid' : ''; ?>" name="kode_lifetime" id="kode_lifetime" autofocus value="<?= old('kode_lifetime', $lifetime['kode_lifetime']); ?>">
                                    <div class="invalid-feedback">
                                        ?= validation_show_error('kode_lifetime'); ?>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row mb-3">
                                <label for="masa_berlaku" class="col-sm-3 col-form-label">Masa Berlaku</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control <?= (validation_show_error('masa_berlaku')) ? 'is-invalid' : ''; ?>" id="masa_berlaku" name="masa_berlaku" value="<?= old('masa_berlaku', $lifetime['masa_berlaku']); ?>">
                                    <div class="invalid-feedback">
                                        <?= validation_show_error('masa_berlaku'); ?>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-3 pt-0">Status</legend>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status1" value="1" checked>
                                        <label class="form-check-label" for="status1">
                                            Aktif
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="status0" value="0">
                                        <label class="form-check-label" for="status0">
                                            Nonaktif
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="modal-footer">
                                <a href="/lifetime" class="btn btn-secondary me-3">Close</a>
                                <button type="submit" class="btn btn-primary">Ubah Data</button>
                            </div>
                        </form>
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