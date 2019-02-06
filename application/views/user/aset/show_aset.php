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
                          <img height="100" width="100" src="<?php echo base_url();?>assets/img/aset/<?php echo $aset->foto_fisik_aset;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">
                          <table class="table table-striped">
                          <?php if (isset($aset)) {  ?>
                      <tbody>
                      <thead>
                        <tr>
                          <th>Nama Aset</th>
                          </tr>
                      </thead>
                        <tr>
                          <td><?php echo $aset->nama_aset; ?></td>
                        </tr>
                      <thead>
                        <tr>
                          <th>Kode Aset</th>
                        </tr>
                      </thead>
                        <tr>
                        <td><?php echo $aset->kode_aset; ?></td>
                        </tr>
                        <thead>
                        <tr>
                        <th>Jenis Aset</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $aset->nama_jenis; ?></td>
                        </tr>
                      <thead>
                        <tr>
                        <th>Kategori Aset</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $aset->nama_kategori; ?></td>
                        </tr>
                      <thead>
                        <tr>
                        <th>Tanggal Terima</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $aset->tgl_terima; ?></td>
                        </tr>
                        <thead>
                        <tr>
                        <th>Kondisi Aset</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $aset->kondisi_awal; ?></td>
                        </tr>
                        <thead>
                        <tr>
                        <th>Lokasi</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $aset->nama_lokasi; ?></td>
                        </tr>
                      <thead>
                        <tr>
                        <th>Masa Pemakaian</th>
                          </tr>
                      </thead>
                      <tr>
                      <td><?php echo $aset->masa_pemakaian; ?></td>
                        </tr>
                      
                        <?php } else { ?>
                        <td colspan="12" type="center">Tidak ada data</td>
                      <?php } ?>
                      </tbody>                      
                    </table>
                      <div class="col-md-2">
                      <a href="<?php echo base_url("aset/downloadLaporanPerAset/".$aset->id); ?>" class="btn btn-primary btn-sm">Download Laporan Aset<i class="mdi mdi-printer"></i></a>
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