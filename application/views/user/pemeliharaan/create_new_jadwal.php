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

                  <h4 class="card-title">Tambah Jadwal</h4>
                  <?php echo form_open_multipart('Pemeliharaan_user/create'); ?>
                  <form class="form-sample">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">No Pemeliharaan</label>
                          <div class="col-sm-9">
                            <input type="text" id="no_pemeliharaan" name="no_pemeliharaan" class="form-control" placeholder="No Pemeliharaan"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kode Aset</label>
                          <div class="col-sm-9">
                            <select name="id_aset" class="form-control" placeholder="Pilih Kode Aset">
                              <option value="" selected="selected">Pilih Kode Aset</option>
                              <?php foreach($aset as $a) { ?>
                                <option value="<?php echo $a['id']; ?>"><?php echo $a['kode_aset']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Pemeliharaan</label>
                          <div class="col-sm-9">
                          <input type="date" class="form-control datepicker" format="dd-mm-yyyy" id="tanggal_pemeliharaan" name="tanggal_pemeliharaan" placeholder="Tanggal Pemeliharaan">
                            <!-- <input type="text" id="tgl_terima" name="tgl_terima" class="form-control" placeholder="Tanggal Terima"/> -->
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Hasil Pemeliharaan</label>
                          <div class="col-sm-9">
                            <input type="text" id="hasil_pemeliharaan" name="hasil_pemeliharaan" class="form-control" placeholder="Hasil Pemeliharaan"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Keterangan</label>
                          <div class="col-sm-9">
                            <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Hari</label>
                          <div class="col-sm-9">
                            <select name="id_hari" class="form-control" placeholder="Pilih Hari">
                              <option value="" selected="selected">Pilih Hari</option>
                              <?php foreach($hari as $h) { ?>
                                <option value="<?php echo $h['id']; ?>"><?php echo $h['nama_hari']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2">
                      <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
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