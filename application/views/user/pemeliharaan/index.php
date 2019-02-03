<?php $this->load->view('user/partials/base_start') ?>
        <!-- iki index -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <br>
        <?php if(!empty(validation_errors())){ ?>
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <?php echo validation_errors(); ?>
        </div>
          <?php }?>

                  <h4 class="card-title">Pencarian Jadwal Pemeliharaan</h4>
                  <?php echo form_open('pemeliharaan_user/search'); ?>
                  <form class="form-sample">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Hari</label>
                          <div class="col-sm-9">
                            <select name="id_hari" class="form-control"placeholder="Pilih Hari">
                            <option value="" selected="selected">Cari dengan Hari</option>
                              <?php foreach($hari as $h) { ?>
                              <option value="<?php echo $h['id']; ?>"><?php echo $h['nama_hari']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kata Kunci</label>
                          <div class="col-sm-9">
                            <input type="text" name="kunci" class="form-control" placeholder="Kata Kunci"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal</label>
                          <div class="col-sm-9">
                            <input type="date" name="tanggal_pemeliharaan" class="form-control"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                      <button type="submit" class="btn btn-primary btn-sm"><i class="mdi mdi-magnify"></i>Cari</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Aset</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No Pemeliharaan</th>
                          <th>Nama Aset</th>
                          <th>Kode Aset</th>
                          <th>Tanggal Pemeliharaan</th>
                          <th>Hasil Pemeliharaan</th>
                          <th>Hari Pemeliharaan</th>
                          <th>Act</th>
                        </tr>
                      </thead>
                      <?php if (isset($results)) { 
                        $i=1; ?>
                      <tbody>
                        <?php foreach($results as $row) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $row->no_pemeliharaan; ?></td>
                          <td><?php echo $row->nama_aset; ?></td>
                          <td><?php echo $row->kode_aset; ?></td>
                          <td><?php echo $row->tanggal_pemeliharaan; ?></td>
                          <td><?php echo $row->hasil_pemeliharaan; ?></td>
                          <td><?php echo $row->nama_hari; ?></td>
                          <td>
                            <ul class="navbar-nav navbar-nav-right">
                              <li class="nav-item dropdown d-none d-xl-inline-block">
                                <a class="nav-link dropdown-toggle" id="UserDropdown" data-toggle="dropdown" aria-expanded="false">
                                  <i class="mdi mdi-settings"></i>Action
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                  <a class="dropdown-item mt-2" href="<?php echo site_url("pemeliharaan_user/show/".$row->id); ?>">
                                  <i class="mdi mdi-monitor"></i>
                                  </a>
                                  <a class="dropdown-item mt-2" href="<?php echo site_url("pemeliharaan_user/update/".$row->id); ?>">
                                  <i class="mdi mdi-pencil-box-outline"></i>
                                  </a>
                                  <a class="dropdown-item" href="<?php echo site_url("pemeliharaan_user/delete/".$row->id); ?>">
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
                        <div class="col-md-2-right">
                        <a href="<?php echo base_url(); ?>pemeliharaan_user/downloadLaporan/" class="btn btn-primary btn-sm">Download Laporan Pemeliharaan<i class="mdi mdi-printer"></i></a>
                      </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <?php $this->load->view('user/partials/base_end') ?>