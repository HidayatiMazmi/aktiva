<!-- partial -->
<div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
              <div class="profile-image">
                  <img src="<?php echo base_url();?>assets/images/faces/<?php echo $user2[0]->photo?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $username;?></p>
                  <div>
                    <small class="designation text-muted">Manager</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Admin') ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Beranda</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('User_admin') ?>">
              <i class="menu-icon mdi mdi-account-box"></i>
              <span class="menu-title">User</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Asset') ?>">
              <i class="menu-icon mdi mdi-briefcase"></i>
              <span class="menu-title">Asset</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Jenis_asset') ?>">
              <i class="menu-icon mdi mdi-view-list"></i>
              <span class="menu-title">Jenis Asset</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Kategori') ?>">
              <i class="menu-icon mdi mdi-layers"></i>
              <span class="menu-title">Kategori</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Lokasi') ?>">
              <i class="menu-icon mdi mdi-map-marker-radius"></i>
              <span class="menu-title">Lokasi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('Pemeliharaan') ?>">
              <i class="menu-icon mdi mdi-package-variant"></i>
              <span class="menu-title">Pemeliharaan</span>
            </a>
          </li>
        </ul>
      </nav>