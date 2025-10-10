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
              <h5 class="m-b-10">Asset</h5>
            </div>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/asset">Asset</a></li>
              <li class="breadcrumb-item" aria-current="page">Sample Page</li> 
            </ul>
          </div>
        </div>
      </div>
    </div> -->
    <div class="page-header">
      <div class="page-block">
        <div class="row align-items-center">
          <div class="col-md-12">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="javascript: void(0)">Pages</a></li>
              <li class="breadcrumb-item" aria-current="page">List Asset</li>
            </ul>
          </div>
          <div class="col-md-12">
            <div class="page-header-title">
              <h2 class="m-b-10">List Asset</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">List Asset</h5>
          </div>

          <div class="card-body tbl-card">
            <?php if (in_groups('pic')) : ?>
              <a href="/asset/create" class="btn btn-outline-primary mb-3">Tambah Data Asset</a>
            <?php endif; ?>

            <?php if (session()->getFlashdata('pesan')): ?>
              <div class="alert alert-success mb-3">
                <?= session()->getFlashdata('pesan'); ?>
              </div>
            <?php endif; ?>

            <div class="table-responsive">
              <table id="myTable" class="table table-hover table-borderless w-100">
                <thead class="bg-light">
                  <tr class="text-nowrap">
                    <th>Handle</th>
                    <th>No</th>
                    <th>Kategori Asset</th>
                    <th>No Asset</th>
                    <th>Sub Asset</th>
                    <th>Nama Asset</th>
                    <th>Serial Number</th>
                    <th>Batch Number</th>
                    <th>Merek</th>
                    <th>Spesifikasi</th>
                    <th>Tanggal Perolehan</th>
                    <th>Harga</th>
                    <th>No Purchase Order</th>
                    <th>Asset Class</th>
                    <th>Cost Center</th>
                    <th>Plant</th>
                    <th>Vendor</th>
                    <th>Lifetime</th>
                    <th>Status</th>
                    <th>PIC</th>
                    <th>User Asset</th>
                    <th>Area</th>
                    <th>Gedung</th>
                    <th>Lantai</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Modified By</th>
                  </tr>
                </thead>
                <tbody class="text-nowrap"></tbody> <!-- tbody dikosongkan: DataTables yang isi -->
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts-extra'); ?>
<!-- DataTables CDN -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script> -->

<script>
  $(function() {
    // mapping status -> badge
    const statusMap = {
      // 0: {
      //   label: 'Proses Pelepasan',
      //   cls: 'bg-primary'
      // },
      0: {
        label: 'Pelepasan',
        cls: 'bg-primary'
      },
      // 1: {
      //   label: 'Proses Penghentian',
      //   cls: 'text-dark bg-warning'
      // },
      1: {
        label: 'Penghentian',
        cls: 'text-dark bg-warning'
      },
      2: {
        label: 'Penggabungan',
        cls: 'bg-secondary'
      },
      3: {
        label: 'Mutasi',
        cls: 'bg-info'
      },
      4: {
        label: 'Non-Aktif',
        cls: 'bg-danger'
      },
      5: {
        label: 'Aktif',
        cls: 'bg-success'
      }
    };

    // helper format
    const fmtDate = d => d ? new Date(d).toLocaleDateString('id-ID') : '';
    const fmtDateTime = d => d ? new Date(d).toLocaleString('id-ID', {
      hour12: false
    }) : '';
    const fmtRupiah = n => (n === null || n === undefined) ? '' : new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR',
      minimumFractionDigits: 2
    }).format(n);

    const table = $('#myTable').DataTable({
      processing: true,
      serverSide: true,
      deferRender: true,
      pageLength: 25,
      scrollX: true,
      lengthMenu: [10, 25, 50, 100, 200],
      ajax: {
        url: "<?= site_url('asset/dt') ?>", // pastikan route ini ada
        type: "GET"
      },
      order: [
        [2, 'asc']
      ], // default urut berdasarkan No Asset
      dom: 'Bfrtipl',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print',
        {
          extend: 'colvis',
          text: 'Column Visibility'
        }
      ],
      columns: [
        // Handle (aksi)
        {
          data: 'id_asset',
          orderable: false,
          searchable: true,
          render: function(id, type, row) {
            const assetId = row.id_asset;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            return `
            <a href="/asset/detail/${id}" class="btn btn-icon btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"><i class="ti ti-file-search"></i></a>
            <a href="/asset/edit/${id}" class="btn btn-icon btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ti ti-edit"></i></a>
            `;
            // <a href="/asset/perbaikan/${id}" class="btn btn-icon btn-light-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Repair"><i class="ti ti-tool"></i></a>
          }
        },
        // No (nomor urut)
        {
          data: null,
          orderable: false,
          searchable: false,
          render: function(data, type, row, meta) {
            return meta.row + meta.settings._iDisplayStart + 1;
          }
        },

        // Kolom data (pastikan server kirim field-field ini)
        {
          data: 'kategori_asset',
          name: 'asset.kategori_asset'
        },
        {
          data: 'no_asset',
          name: 'asset.no_asset'
        },
        {
          data: 'sub_asset',
          name: 'asset.sub_asset'
        },
        {
          data: 'nama_asset',
          name: 'asset.nama_asset'
        },
        {
          data: 'serial_number',
          name: 'asset.serial_number'
        },
        {
          data: 'batch_number',
          name: 'asset.batch_number'
        },
        {
          data: 'merek',
          name: 'asset.merek'
        },
        {
          data: 'spek',
          name: 'asset.spek'
        },

        {
          data: 'tgl_perolehan',
          name: 'asset.tgl_perolehan',
          render: (d) => fmtDate(d)
        },
        {
          data: 'harga',
          name: 'asset.harga',
          render: (n) => fmtRupiah(n)
        },
        {
          data: 'no_po',
          name: 'asset.no_po'
        },

        {
          data: 'nama_assetclass',
          name: 'ac.nama_assetclass',
          // render: (d, _, row) => `${row.id_assetclass ?? ''} - ${d ?? ''}`
        },
        {
          data: 'nama_cost_center',
          name: 'cc.nama_cost_center',
          // render: (d, _, row) => `${row.id_cost_center ?? ''} - ${d ?? ''}`
        },
        {
          data: 'nama_plant',
          name: 'p.nama_plant',
          // render: (d, _, row) => `${row.id_plant ?? ''} - ${d ?? ''}`
        },

        {
          data: 'nama_vendor',
          name: 'v.nama_vendor',
          // render: (d, _, row) => `${row.id_vendor ?? ''} - ${d ?? ''}`
        },

        {
          data: 'masa_berlaku',
          name: 'lf.masa_berlaku',
          render: (d) => (d ? `${d} Tahun` : '')
        },

        {
          data: 'status',
          name: 'asset.status',
          render: function(s) {
            const m = statusMap[s] || {
              label: 'Unknown',
              cls: 'bg-dark'
            };
            return `<span class="badge ${m.cls} rounded-2">${m.label}</span>`;
          }
        },

        {
          data: null,
          name: 'pic.username',
          render: (__, _, row) => `${row.pic_username ?? ''} - ${row.pic_fullname ?? ''}`
        },
        {
          data: 'user_asset',
          name: 'asset.user_asset'
        },

        {
          data: 'la',
          name: 'la.nama_lokasi'
        },
        {
          data: 'lg',
          name: 'lg.nama_lokasi'
        },
        {
          data: 'll',
          name: 'll.nama_lokasi'
        },

        {
          data: 'created_at',
          name: 'asset.created_at',
          render: (d) => fmtDateTime(d)
        },
        {
          data: 'updated_at',
          name: 'asset.updated_at',
          render: (d) => fmtDateTime(d)
        },
        {
          data: null,
          name: 'm.username',
          render: (__, _, row) => `${row.m_username ?? ''}`
        },
      ]
    });

    // debounce pencarian biar nggak spam server
    let t;
    $('#myTable_filter input').off().on('keyup', function() {
      clearTimeout(t);
      const v = this.value;
      t = setTimeout(() => table.search(v).draw(), 300);
    });
  });
</script>
<?= $this->endSection(); ?>