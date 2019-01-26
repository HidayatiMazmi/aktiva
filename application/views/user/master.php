<?php $this->load->view('user/partials/base_start') ?>
        <!-- iki index -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Pencarian Aset</h4>
                  <?php echo form_open('search'); ?>
                  <form class="form-sample">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Aset</label>
                          <div class="col-sm-9">
                            <select name="id_jenis" class="form-control"placeholder="Pilih Jenis">
                              <option id="elektronik" value="1">Perangkat Elektronik</option>
                              <option id="tanah" value="2">Tanah</option>
                              <option id="kendaraan" value="3">Kendaraan</option>
                              <option id="bangunan" value="4">Bangunan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kategori Aset</label>
                          <div class="col-sm-9">
                            <select name="id_kategori" class="form-control" placeholder="Pilih Kategori">
                              <option id="elektronik" value="1">Perangkat Elektronik</option>
                              <option id="tanah" value="2">Tanah</option>
                              <option id="kendaraan" value="3">Kendaraan</option>
                              <option id="bangunan" value="4">Bangunan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lokasi Aset</label>
                          <div class="col-sm-9">
                            <select name="id_lokasi" class="form-control" value="Pilih Lokasi">
                              <option id="elektronik" value="1">Perangkat Elektronik</option>
                              <option id="tanah" value="2">Tanah</option>
                              <option id="kendaraan" value="3">Kendaraan</option>
                              <option id="bangunan" value="4">Bangunan</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kata Kunci</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Kata Kunci"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                      <button type="button" class="btn btn-primary btn-sm"><i class="mdi mdi-magnify"></i>Cari</button>
                      </div>
                    </div>
                  </form>
                  <?php echo form_close(); ?>
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
                          <th>Nama Aset</th>
                          <th>Kode Aset</th>
                          <th>Jenis Aset</th>
                          <th>Kategori Aset</th>
                          <th>Tanggal Terima</th>
                          <th>Masa Pemakaian</th>
                          <th>Act</th>
                        </tr>
                      </thead>
                      <?php if (isset($results)) { 
                        $i=1; ?>
                      <tbody>
                        <?php foreach($results as $row) { ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $row->nama_aset; ?></td>
                          <td><?php echo $row->kode_aset; ?></td>
                          <td><?php echo $row->nama_jenis; ?></td>
                          <td><?php echo $row->nama_kategori; ?></td>
                          <td><?php echo $row->tgl_terima; ?></td>
                          <td><?php echo $row->masa_pemakaian; ?></td>
                          <td>
                            <ul class="navbar-nav navbar-nav-right">
                              <li class="nav-item dropdown d-none d-xl-inline-block">
                                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                                  <i class="mdi mdi-settings"></i>Action
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                  <a class="dropdown-item mt-2" href="<?php echo base_url(); ?>tutorial/edit/<?php echo $item['idTutorial']; ?>">
                                  <i class="mdi mdi-pencil-box-outline"></i>
                                  </a>
                                  <a class="dropdown-item">
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
                      
                        <div class="container">
                          <div class="row">
                            <div class="col-12">
                              <div class="pagination">
                                <?php echo $this->pagination->create_links(); ?>
                              </div>
                            </div>
                          </div>
                        </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <?php $this->load->view('user/partials/base_end') ?>