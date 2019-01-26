<?php $this->load->view('user/partials/base_start') ?>
        <!-- iki index -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Aset</h4>
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
                      <button type="button" class="btn btn-primary btn-sm">fa-searchCari</button>
                      </div>
                    </div>
                  </form>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <?php $this->load->view('user/partials/base_end') ?>