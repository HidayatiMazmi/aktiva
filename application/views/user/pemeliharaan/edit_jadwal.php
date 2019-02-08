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

                  <h4 class="card-title">Edit Jadwal Pemeliharaan</h4>
                  <?php echo form_open_multipart('pemeliharaan_user/update/'. $pemeliharaan[0]['id']); ?>
                  <input type="hidden" name="id" value="<?php echo $pemeliharaan[0]['id']; ?>" />
                  <form class="form-sample">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">No Pemeliharaan</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="no_pemeliharaan" value="<?php echo $pemeliharaan[0]['no_pemeliharaan']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kode</label>
                          <div class="col-sm-9">
                            <select name="id_aset" class="form-control" placeholder="Pilih Kategori">
                              <option value="" selected="selected">Pilih Kode</option>
                              <?php foreach($aset as $a) { ?>
                                <option value="<?php echo $a['id']; ?>" <?php echo ($a['id'] == $pemeliharaan[0]['id_aset'] ? 'selected="selected"' : ''); ?>><?php echo $a['kode']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Hari</label>
                          <div class="col-sm-9">
                            <select name="id_hari" class="form-control" placeholder="Pilih Hari">
                              <option value="" selected="selected">Pilih Hari</option>
                              <?php foreach($hari as $h) { ?>
                                <option value="<?php echo $h['id']; ?>" <?php echo ($h['id'] == $pemeliharaan[0]['id_hari'] ? 'selected="selected"' : ''); ?>><?php echo $h['nama_hari']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Pemeliharaan</label>
                          <div class="col-sm-9">
                          <input type="date" class="form-control datepicker" format="mm-dd-yyyy" name="tanggal_pemeliharaan" value="<?php echo $pemeliharaan[0]['tanggal_pemeliharaan']; ?>">
                            <!-- <input type="text" id="tgl_terima" name="tgl_terima" class="form-control" placeholder="Tanggal Terima"/> -->
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Hasil Pemeliharaan</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="hasil_pemeliharaan" value="<?php echo $pemeliharaan[0]['hasil_pemeliharaan']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Keterangan</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="keterangan" value="<?php echo $pemeliharaan[0]['keterangan']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                      <button type="submit" class="btn btn-primary btn-sm">Submit</button>
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