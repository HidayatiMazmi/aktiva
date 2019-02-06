<?php $this->load->view('user/partials/base_start') ?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">Profile Anda</h4>
                  <form class="form-sample">
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row">
                          <!-- <label class="col-sm-3 col-form-label">Foto Fisik Aset</label> -->
                          <div class="col-sm-9">
                          <img height="100" width="100" src="<?php echo base_url();?>assets/images/faces/<?php echo $user[0]->photo; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">
                          <table class="table table-striped">
                      <tbody>
                      <thead>
                        <tr>
                          <th>Nama</th>
                          </tr>
                      </thead>
                        <tr>
                          <td><?php echo $user[0]->nama; ?></td>
                        </tr>
                      <thead>
                        <tr>
                          <th>Nip</th>
                        </tr>
                      </thead>
                        <tr>
                        <td><?php echo $user[0]->nip; ?></td>
                        </tr>
                        <thead>
                        <tr>
                        <th>Username</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $user[0]->username; ?></td>
                        </tr>
                      <thead>
                        <tr>
                        <th>Role</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $user[0]->role; ?></td>
                        </tr>
                      </tbody>                      
                    </table>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Aset Yang Anda Inputkan</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nama Aset</th>
                          <th>Kode Aset</th>
                          <th>Jenis Aset</th>
                          <th>Kategori Aset</th>
                          <th>Tanggal Terima</th>
                          <th>Masa Pemakaian</th>
                          <th>Kondisi Aset</th>
                          <th>Act</th>
                        </tr>
                      </thead>
                      <?php if (isset($aset)) { 
                        $i=1; ?>
                      <tbody>
                      <style>
                        baik  {
                          background-color: #80ced6;
                        }
                        rusak  {
                          background-color: #f18973;
                        }
                        kosong  {
                          background-color: #e8de81;
                        }
                      </style>
                        <?php foreach($aset as $row) { 
                          if($row->kondisi_awal=="Baik")
                          {
                            $status="<baik>&nbsp;Baik&nbsp;</baik>";
                          }
                          else if($row->kondisi_awal=="Rusak")
                          {
                            $status="<rusak>&nbsp;Rusak&nbsp;</rusak>";
                          }
                          else
                          {
                            $status="<kosong>&nbsp;Kosong&nbsp;</kosong>";
                          }?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $row->nama_aset; ?></td>
                          <td><?php echo $row->kode_aset; ?></td>
                          <td><?php echo $row->nama_jenis; ?></td>
                          <td><?php echo $row->nama_kategori; ?></td>
                          <td><?php echo $row->tgl_terima; ?></td>
                          <td><?php echo $row->masa_pemakaian; ?></td>
                          <td><?php echo $status; ?></td>
                          <td>
                            <ul class="navbar-nav navbar-nav-right">
                              <li class="nav-item dropdown d-none d-xl-inline-block">
                                <a class="nav-link dropdown-toggle" id="UserDropdown" data-toggle="dropdown" aria-expanded="false">
                                  <i class="mdi mdi-settings"></i>Action
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                  <a class="dropdown-item mt-2" href="<?php echo site_url("aset/show/".$row->id); ?>">
                                  <i class="mdi mdi-monitor"></i>
                                  </a>
                                  <a class="dropdown-item mt-2" href="<?php echo site_url("aset/update/".$row->id); ?>">
                                  <i class="mdi mdi-pencil-box-outline"></i>
                                  </a>
                                  <a class="dropdown-item" href="<?php echo site_url("aset/delete/".$row->id); ?>">
                                  <i class="mdi mdi-delete"></i>
                                  </a>
                                </div>
                              </li>
                            </ul>
                          </td>
                        </tr>
                        <?php } ?>
                        <?php } else { ?>
                        <td colspan="12" type="center">Tidak ada data</td>
                      <?php } ?>
                      <?php echo form_close(); ?>
                      </tbody>                      
                    </table>
                  </div>
                  <style>
                        .pagination strong,
                        .pagination a {
                          border-radius: 2px;
                          padding: 3px 10px;
                          color: #ffffff;
                          margin: 2px;
                          background-color: #2c85d8;
                        }

                        .pagination strong {
                          background-color: #444444;
                        }

                        .pagination a:hover {
                          color: #222222;
                        }
                      </style>
                      
                            <div class="col-12-right">
                              <div class="pagination">
                                <?php echo $this->pagination->create_links(); ?>
                              </div>
                            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
  <?php $this->load->view('user/partials/base_end') ?>