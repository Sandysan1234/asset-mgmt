<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>

<!-- jQuery UI (kalau belum ada di layout) -->
<!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script> -->

<div class="pc-container">
	<div class="pc-content">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>Form perbaikan Asset</h5>
					</div>

					<div class="card-body">
						<form action="<?= site_url('transaksi/store') ?>" method="post" class="row g-3">

							<!-- hidden ids untuk relasi -->
							<input type="hidden" id="id_asset" name="id_asset">
							<input type="hidden" id="id_assetclass" name="id_assetclass">
							<input type="hidden" id="id_plant_asal" name="id_plant_asal">
							<input type="hidden" id="id_cost_center_asal" name="id_cost_center_asal">
							<input type="hidden" id="id_lokasi_area" name="id_lokasi_area">
							<input type="hidden" id="id_lokasi_gedung" name="id_lokasi_gedung">
							<input type="hidden" id="id_lokasi_lantai" name="id_lokasi_lantai">
							<h5>Department Asal</h5>
							<div class="col-md-4">
								<label for="no_asset" class="form-label">No Asset</label>
								<input type="text" id="no_asset" name="no_asset" class="form-control" placeholder="Cari No Asset..." required>
							</div>
							<div class="col-md-4">
								<label for="asset_class" class="form-label">Asset Class</label>
								<input type="text" id="asset_class" name="asset_class" class="form-control" readonly>
							</div>
							<div class="col-md-4">
								<label for="plant_asal" class="form-label">Plant</label>
								<input type="text" id="plant_asal" name="plant_asal" class="form-control" readonly>
							</div>
							<div class="col-md-4">
								<label for="cost_center_asal" class="form-label">Cost Center</label>
								<input type="text" id="cost_center_asal" name="cost_center_asal" class="form-control" readonly>
							</div>
							<div class="col-md-4">
								<label for="sub_asset" class="form-label">Sub Asset</label>
								<input type="text" id="sub_asset" name="sub_asset" class="form-control" readonly>
							</div>
							<div class="col-md-4">
								<label for="nama_asset" class="form-label">Nama Asset</label>
								<input type="text" id="nama_asset" name="nama_asset" class="form-control" readonly>
							</div>
							<div class="col-md-4">
								<label for="tgl_perolehan" class="form-label">Tanggal Pengerjaan</label>
								<input type="date" id="tgl_perolehan" name="tgl_perolehan" class="form-control" readonly>
							</div>
							<div class="col-md-4">
								<label for="tgl_tindakan" class="form-label">Tanggal Tindakan</label>
								<input type="date" id="tgl_tindakan" name="tgl_tindakan" class="form-control">
							</div>
							<div class="col-12">
								<button type="submit" class="btn btn-primary">Simpan Transaksi</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?= $this->endSection(); ?>

<?= $this->section('scripts-extra');; ?>
<script>
	jQuery(function($) {
		if (!$('#no_asset').length) return; // <— guard
		if (!$.ui || !$.ui.autocomplete) return; // UI must be loaded

		$("#no_asset").autocomplete({
			source: "<?= base_url('api/assets/suggest') ?>",
			minLength: 2,
			delay: 200,
			select: function(event, ui) {
				if (!ui.item) return false;
				$("#no_asset").val(ui.item.no_asset);
				$("#asset_class").val(ui.item.asset_class);
				$("#plant_asal").val(ui.item.plant);
				$("#cost_center_asal").val(ui.item.cost_center);
				$("#sub_asset").val(ui.item.sub_asset);
				$("#nama_asset").val(ui.item.nama_asset);
				$("#tgl_perolehan").val(ui.item.tgl_perolehan);
				$("#area").val(ui.item.area);
				$("#gedung").val(ui.item.gedung);
				$("#lantai").val(ui.item.lantai);
				$("#id_asset").val(ui.item.id_asset);
				$("#id_assetclass").val(ui.item.id_assetclass);
				$("#id_plant_asal").val(ui.item.id_plant);
				$("#id_cost_center_asal").val(ui.item.id_cost_center);
				$("#id_lokasi_area").val(ui.item.id_lokasi_area);
				$("#id_lokasi_gedung").val(ui.item.id_lokasi_gedung);
				$("#id_lokasi_lantai").val(ui.item.id_lokasi_lantai);
				$("#no_asset_tujuan").val(ui.item.no_asset);
				$("#nama_asset_tujuan").val(ui.item.nama_asset);
				return false;
			}
		});
	});
</script>
<script>
	jQuery(function($) {

		// Fungsi helper: isi atau hapus tanggal
		function toggleDate(checkboxSelector, dateInputSelector) {
			$(checkboxSelector).on('change', function() {
				if ($(this).is(':checked')) {
					let today = new Date().toISOString().split('T')[0];
					$(dateInputSelector).val(today);
				} else {
					$(dateInputSelector).val('');
				}
			});
		}

		// Panggil untuk semua pasangan switch & tanggal
		toggleDate('#approve_kabag_asal', '#approve_date_kabag_asal');
		toggleDate('#approve_kabag_tujuan', '#approve_date_kabag_tujuan');
		toggleDate('#approve_it', '#approve_date_it');
		toggleDate('#approve_dir', '#approve_date_dir');
		toggleDate('#ack_fin', '#date_ack_fin');
		toggleDate('#ack_acc', '#date_ack_acc');
		toggleDate('#ack_ctrl', '#date_ack_ctrl');

	});
</script>

</script>
<?= $this->endSection(); ?>