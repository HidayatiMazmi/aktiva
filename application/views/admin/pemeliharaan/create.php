<?php $this->load->view('admin/partials/base_start') ?>

<div class="container">
  <legend>Tambah Data Lokasi</legend>
  <div class="col-xs-12 col-sm-12 col-md-12">
  <?php echo form_open_multipart(''); ?>
<?php echo validation_errors(); ?>
    <div class="form-group">
      <label for="nama">Lokasi</label>
      <input type="text" class="form-control" id="nama" name="nama_lokasi" placeholder="Masukkan Lokasi">
    </div>
    <a class="btn btn-info" href="<?php echo site_url('lokasi/') ?>">Kembali</a>
    <button type="submit" class="btn btn-primary">OK</button>

  <?php echo form_close() ?>
  </div>
</div>

<?php $this->load->view('admin/partials/base_end') ?>