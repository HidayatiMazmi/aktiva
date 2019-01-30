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
                  <?php echo form_open_multipart('pemeliharaan/edit'); ?>
                  <form class="form-sample">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kode Aset</label>
                          <div class="col-sm-9">
                            <input type="text" id="kode_aset" name="kode_aset" class="form-control" placeholder="kode Aset"/>
                          </div>
                        </div>
                      </div>                      
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Pemeliharaan</label>
                          <div class="col-sm-9">
                          <input type="date" class="form-control datepicker" format="dd-mm-yyyy" id="tgl_terima" name="tgl_terima" placeholder="Tanggal Terima">
                            <!-- <input type="text" id="tgl_terima" name="tgl_terima" class="form-control" placeholder="Tanggal Terima"/> -->
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Keterangan</label>
                          <div class="col-sm-9">
                            <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan"/>
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