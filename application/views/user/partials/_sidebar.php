<div class="container-fluid page-body-wrapper">
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?php echo base_url();?>assets/images/faces/<?php echo $user[0]->photo?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $username;?></p>
                  <div>
                    <small class="designation text-muted">Manager</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button data-toggle="modal" data-target="#tambah-aset" class="btn btn-success btn-block"><i class="mdi mdi-plus"></i>Tambah Aset</button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('home') ?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Pemeliharaan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('pemeliharaan_user') ?>">Jadwal Pemeliharaan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('pemeliharaan_user/create/');?>">Tambah Jadwal
                  <i class="mdi mdi-plus"></i>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>