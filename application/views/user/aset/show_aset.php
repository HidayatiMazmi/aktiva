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
                  <?php if (isset($aset)) { ?>
                  <form class="form-sample">
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Foto Fisik Aset</label>
                          <div class="col-sm-9">
                          <img height="42" width="42" src="<?php echo base_url();?>assets/img/aset/<?php echo $aset->foto_fisik_aset;?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Aset</label>
                          <div class="col-sm-9">
                          <?php echo $aset->nama_aset; ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Aset</label>
                          <div class="col-sm-9">
                          <?php echo $aset->nama_jenis; ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kategori Aset</label>
                          <div class="col-sm-9">
                          <?php echo $aset->nama_kategori; ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lokasi Aset</label>
                          <div class="col-sm-9">
                          <?php echo $aset->nama_lokasi; ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Masa Pemakaian</label>
                          <div class="col-sm-9">
                          <?php echo $aset->masa_pemakaian; ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kondisi Terima</label>
                          <div class="col-sm-9">
                          <?php echo $aset->masa_pemakaian; ?>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                      <button type="button" class="btn btn-primary btn-sm">Download</button>
                      </div>
                    </div>
                  </form>
                    <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        <?php $this->load->view('user/partials/base_end') ?>