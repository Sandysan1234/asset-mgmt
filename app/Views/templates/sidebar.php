  <?php

  use Myth\Auth\Entities\User;
  use Myth\Auth\Filters\LoginFilter; ?>
  <!-- [ Sidebar Menu ] start -->
  <nav class="pc-sidebar">
    <div class="navbar-wrapper">
      <div class="m-header">
        <a href="/" class="b-brand text-primary">
          <!-- ========   Change your logo from here   ============ -->
          <img src="<?= base_url(); ?>assets/images/logo-jmi.svg" width="90" class="img-fluid-logo-lg" alt="logo">
        </a>
      </div>
      <div class="navbar-content">
        <ul class="pc-navbar">

          <li class="pc-item">
            <a href="/" class="pc-link">
              <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
              <span class="pc-mtext">Home</span>
            </a>
          </li>

          <!-- <li class="pc-item pc-caption">
            <label>Form</label>
            <i class="ti ti-dashboard"></i>
          </li> -->

          <li class="pc-item pc-caption">
            <label>Pages</label>
            <i class="ti ti-news"></i>
          </li>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-zoom-money"></i></span><span class="pc-mtext">Assets</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="/asset">List Assets</a></li>
              <?php if (has_permission('finance')): ?>
                <li class="pc-item"><a class="pc-link" href="/assetclass">Asset Class</a></li>
              <?php endif; ?>
              <?php if (in_groups('admin')): ?>
                <li class="pc-item"><a class="pc-link" href="/assetlog">Asset Log</a></li>
              <?php endif; ?>
            </ul>
          </li>
          <?php if (in_groups(['pic', 'kabag', 'approval', 'admin'])): ?>
            <li class="pc-item">
              <a href="/transaksi" class="pc-link">
                <span class="pc-micon"><i class="ti ti-brand-chrome"></i></span>
                <span class="pc-mtext">Transaksi</span>
              </a>
            </li>
          <?php endif; ?>
          <?php if (has_permission('printqr')): ?>
            <li class="pc-item">
              <a href="/qr" class="pc-link">
                <span class="pc-micon"><i class="ti ti-qrcode"></i></span>
                <span class="pc-mtext">QR Code</span>
              </a>
            </li>
          <?php endif; ?>

          <?php if (has_permission('ttd_controlling')): ?>
            <li class="pc-item">
              <a href="/costcenter" class="pc-link">
                <span class="pc-micon"><i class="ti ti-aperture"></i></span>
                <span class="pc-mtext">Cost Center</span>
              </a>
            </li>
          <?php endif; ?>
          <?php if (in_groups(['pic', 'admin'])): ?>
            <li class="pc-item">
              <a href="/stock-opname" class="pc-link">
                <span class="pc-micon"><i class="ti ti-report"></i></span>
                <span class="pc-mtext">Stock Opname</span>
              </a>
            </li>
          <?php endif; ?>
          <?php if (in_groups('admin')): ?>
            <li class="pc-item">
              <a href="/lifetime" class="pc-link">
                <span class="pc-micon"><i class="ti ti-clock"></i></span>
                <span class="pc-mtext">Lifetime</span>
              </a>
            </li>
            <li class="pc-item">
              <a href="/location" class="pc-link">
                <span class="pc-micon"><i class="ti ti-map-pins"></i></span>
                <span class="pc-mtext">Lokasi</span>
              </a>
            </li>

            <li class="pc-item">
              <a href="/plant" class="pc-link">
                <span class="pc-micon"><i class="ti ti-sitemap"></i></span>
                <span class="pc-mtext">Plant</span>
              </a>
            </li>
            <?php if (has_permission('it')): ?>
              <li class="pc-item">
                <a href="/perbaikan" class="pc-link">
                  <span class="pc-micon"><i class="ti ti-tool"></i></span>
                  <span class="pc-mtext">Perbaikan</span>
                </a>
              </li>
            <?php endif; ?>
            <li class="pc-item">
              <a href="/pemasok" class="pc-link">
                <span class="pc-micon"><i class="ti ti-affiliate"></i></span>
                <span class="pc-mtext">Vendor</span>
              </a>
            </li>
            <li class="pc-item pc-hasmenu">
              <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-users"></i></span><span class="pc-mtext">Users</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
              <ul class="pc-submenu">
                <?php if (in_groups('admin')): ?>
                  <li class="pc-item"><a class="pc-link" href="/users">List User</a></li>
                  <li class="pc-item"><a class="pc-link" href="/admin/roles">Manajemen Roles</a></li>
                  <li class="pc-item"><a class="pc-link" href="/admin/users">Manajemen User</a></li>
                <?php endif; ?>
              </ul>
            </li>
          <?php endif; ?>
          <!-- <li class="pc-item">
            <a href="../other/sample-page.html" class="pc-link">
              <span class="pc-micon"><i class="ti ti-brand-chrome"></i></span>
              <span class="pc-mtext">User Asset</span>
            </a>
          </li>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span class="pc-mtext">Menu levels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
              <li class="pc-item pc-hasmenu">
                <a href="#!" class="pc-link">Level 2.2<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                <ul class="pc-submenu">
                  <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                  <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                  <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                      <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                      <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="pc-item pc-hasmenu">
                <a href="#!" class="pc-link">Level 2.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                <ul class="pc-submenu">
                  <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                  <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                  <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                      <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                      <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="pc-item pc-caption">
            <label>Other</label>
            <i class="ti ti-brand-chrome"></i>
          </li>
          <li class="pc-item pc-hasmenu">
            <a href="#!" class="pc-link"><span class="pc-micon"><i class="ti ti-menu"></i></span><span class="pc-mtext">Menu
                levels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
            <ul class="pc-submenu">
              <li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
              <li class="pc-item pc-hasmenu">
                <a href="#!" class="pc-link">Level 2.2<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                <ul class="pc-submenu">
                  <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                  <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                  <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                      <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                      <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="pc-item pc-hasmenu">
                <a href="#!" class="pc-link">Level 2.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                <ul class="pc-submenu">
                  <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                  <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                  <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                      <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                      <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="pc-item">
            <a href="../other/sample-page.html" class="pc-link">
              <span class="pc-micon"><i class="ti ti-brand-chrome"></i></span>
              <span class="pc-mtext">Sample page</span>
            </a>
          </li> -->
        </ul>
      </div>
    </div>
    </div>
  </nav>
  <!-- [ Sidebar Menu ] end -->