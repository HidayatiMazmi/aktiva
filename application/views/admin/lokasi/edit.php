<?php $this->load->view('admin/partials/base_start') ?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
              <legend>Edit Data Lokasi</legend>
              </span>
            </div>
          </div>
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <?php echo form_open_multipart(''); ?>
                  <?php echo validation_errors(); ?>
                    <div class="form-group">
                      <label for="id">ID</label>
                      <input type="text" class="form-control" id="id" name="id" placeholder="Masukkan ID">
                    </div>
                    <div class="form-group">
                      <label for="nama">Lokasi</label>
                      <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" placeholder="Masukkan Lokasi">
                    </div>                  
                      <a class="btn btn-info" href="<?php echo site_url('lokasi/') ?>">Kembali</a>
                      <button type="submit" class="btn btn-primary">OK</button>
                      <?php echo form_close() ?>
                    </div>
                </div>
              </div>
<?php $this->load->view('admin/partials/base_end') ?>