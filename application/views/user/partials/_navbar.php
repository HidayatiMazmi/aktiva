<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo base_url('home') ?>">
          <img src="<?php echo base_url('assets/img/ico/pgka.png');?>" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo base_url('home') ?>">
          <img src="<?php echo base_url('assets/img/ico/logopgbesar.png');?>" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="<?php echo base_url('master');?>" class="nav-link">
            <i class="mdi mdi-home"></i>Aset
              <!-- <span class="badge badge-primary ml-1">New</span> -->
            </a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, <?php echo $username;?>!</span>
              <img class="img-xs rounded-circle" src="<?php echo base_url();?>assets/images/faces/<?php echo $user[0]->photo?>" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
              </a>
              <a href="<?php echo base_url('ProfileUser');?>" class="dropdown-item mt-2">
                Profile Accounts
              </a>
              <a href="<?php echo base_url('Login/logout');?>" class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>