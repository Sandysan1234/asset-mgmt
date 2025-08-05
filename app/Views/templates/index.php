<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title><?= $title;?> </title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!-- [Favicon] icon -->
  <link rel="icon" href="<?= base_url(); ?>assets/images/logo-jmi.svg" type="image/x-icon"> <!-- [Google Font] Family -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
  <!-- [Tabler Icons] https://tablericons.com -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/tabler-icons.min.css">
  <!-- [Feather Icons] https://feathericons.com -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/feather.css">
  <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/fontawesome.css">
  <!-- [Material Icons] https://fonts.google.com/icons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/fonts/material.css">
  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" id="main-style-link">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style-preset.css">

  <!-- DataTables Bootstrap 5 hanya butuh komponen bootstrap minimal -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css">


</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->

  <!-- [ Sidebar Menu ] start -->
  <?= $this->include('templates/sidebar'); ?>

  <!-- [ Sidebar Menu ] end -->

  <!-- [ Header Topbar ] start -->
  <?= $this->include('templates/topbar'); ?>
  <!-- [ Header ] end -->



  <!-- [ Main Content ] start -->
  <?= $this->renderSection('page-content'); ?>
  <!-- [ Main Content ] end -->
  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        <div class="col-sm my-1">
          <p class="m-0"> &copy; <?= date('Y'); ?> IT Department, PT Jayamas Medica Industri Tbk.  <span>All Rights Reserved</span></p>
        </div>
        <div class="col-auto my-1">
          <ul class="list-inline footer-link mb-0">
            <li class="list-inline-item"><a href="../index.html">Home</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer> <!-- Required Js -->

  <!-- jQuery harus paling atas -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

  <!-- Popper & Bootstrap -->
  <script src="<?= base_url(); ?>assets/js/plugins/popper.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/plugins/bootstrap.min.js"></script>

  <!-- Feather, SimpleBar, Custom Font, pcoded -->
  <script src="<?= base_url(); ?>assets/js/plugins/simplebar.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/fonts/custom-font.js"></script>
  <script src="<?= base_url(); ?>assets/js/pcoded.js"></script>
  <script src="<?= base_url(); ?>assets/js/plugins/feather.min.js"></script>

  <!-- DataTables -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <!-- DataTables Buttons -->
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


  <!-- Ekspor Excel dan PDF -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({
        dom: 'Bfrtipl',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print',
          {
            extend: 'colvis',
            text: 'Column Visibility'
          }
        ],
        scrollX: true
      });
    });
  </script>






  <script>
    layout_change('light');
  </script>




  <script>
    change_box_container('false');
  </script>



  <script>
    layout_rtl_change('false');
  </script>


  <script>
    preset_change("preset-1");
  </script>


  <script>
    font_change("Public-Sans");
  </script>




</body>
<!-- [Body] end -->

</html>