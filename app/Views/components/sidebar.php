  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href=" <?= site_url('dashboard') ?>">
          <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">DASHBOARD</div>
      </a>



      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading mt-3 ">
          Menu Utama
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">

          <a class="nav-link collapsed" href="<?= site_url('dashboard') ?>" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-cog"></i>
              <span>Produk</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">

                  <a class="collapse-item" href=" <?= site_url('tambah') ?>">Tambah Produk</a>
                  <a class="collapse-item" href=" <?= site_url('produk') ?>">List Produk</a>
              </div>
          </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
              <i class="fas fa-fw fa-wrench"></i>
              <span>Transaksi</span>
          </a>
          <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="<?= site_url('semuatransaksi') ?>">Lihat Transaksi</a>
                  <a class="collapse-item" href=" <?= site_url('rekaptransaksi') ?>">Rekap Transaksi</a>
              </div>
          </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">





      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>


  </ul>
  <!-- End of Sidebar -->