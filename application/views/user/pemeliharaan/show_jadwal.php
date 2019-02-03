<?php $this->load->view('user/partials/base_start') ?>
        <!-- iki index -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"></h4>
                  <form class="form-sample">
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row">
                          <!-- <label class="col-sm-3 col-form-label">Foto Fisik Aset</label> -->
                          <div class="col-sm-9">
                          <img height="100" width="100" src="<?php echo base_url();?>assets/img/aset/<?php echo $pemeliharaan->foto_fisik_aset;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">
                          <table class="table table-striped">
                          <?php if (isset($pemeliharaan)) {  ?>
                      <tbody>
                      <thead>
                        <tr>
                          <th>Nama Aset</th>
                          </tr>
                      </thead>
                        <tr>
                          <td><?php echo $pemeliharaan->nama_aset; ?></td>
                        </tr>
                      <thead>
                        <tr>
                          <th>Kode Aset</th>
                        </tr>
                      </thead>
                        <tr>
                        <td><?php echo $pemeliharaan->kode_aset; ?></td>
                        </tr>
                        <thead>
                        <tr>
                        <th>Jenis Aset</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $pemeliharaan->nama_jenis; ?></td>
                        </tr>
                      <thead>
                        <tr>
                        <th>Kategori Aset</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $pemeliharaan->nama_kategori; ?></td>
                        </tr>
                      <thead>
                        <tr>
                        <th>Tanggal Terima</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $pemeliharaan->tgl_terima; ?></td>
                        </tr>
                        <thead>
                        <tr>
                        <th>Lokasi</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $pemeliharaan->nama_lokasi; ?></td>
                        </tr>
                      <thead>
                        <tr>
                        <th>Masa Pemakaian</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $pemeliharaan->masa_pemakaian; ?></td>
                        </tr>
                      
                        <?php } else { ?>
                        <td colspan="12" type="center">Tidak ada data</td>
                      <?php } ?>
                      </tbody>                      
                    </table>
                      <div class="col-md-2">
                      <button type="button" class="btn btn-primary btn-sm">Download</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <?php $this->load->view('user/partials/base_end') ?>