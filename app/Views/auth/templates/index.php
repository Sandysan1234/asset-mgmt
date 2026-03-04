  <!DOCTYPE html>
  <html lang="en">
  <!-- [Head] start -->

  <head>
    <title> | Asset Management System</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
    <meta name="author" content="CodedThemes">


    <!-- [Favicon] icon -->
    <link rel="icon" href="<?= base_url(); ?>assets/images/logo-jmi.svg" type="image/x-icon">
    <!-- [Google Font] Family -->
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

  </head>
  <!-- [Head] end -->
  <!-- [Body] Start -->

  <body>
    <script>
      let text = "  Auth | Asset Management System ";
      let speed = 200;

      function scrollTitle() {
        document.title = text;
        text = text.substring(1) + text.charAt(0);
        setTimeout(scrollTitle, speed);
      }
      scrollTitle();
    </script>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
      <div class="loader-track">
        <div class="loader-fill"></div>
      </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ Main Content ] start -->

    <div class="auth-main">
      <div class="auth-wrapper v3">
        <div class="auth-form">
          <?= $this->renderSection('content'); ?>
          <div class="auth-footer row">
            <!-- <div class=""> -->
            <div class="col-auto my-1">
              <p class="m-0"><a href="#">&copy; <?= date('Y'); ?> RFHM. All Rights Reserved</a></p>
            </div>
            <div class="col-auto my-1">
              <p class="m-0"><a href="#">Department Information Technology</a></p>
              <!-- <ul class="list-inline footer-link mb-0">
                <li class="list-inline-item"><a href="#">Department Information Technology</a></li> 
              </ul> -->
            </div>
            <!-- </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="<?= base_url(); ?>assets/js/plugins/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/simplebar.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/fonts/custom-font.js"></script>
    <script src="<?= base_url(); ?>assets/js/pcoded.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/feather.min.js"></script>





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