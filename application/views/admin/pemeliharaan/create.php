<?php $this->load->view('admin/partials/base_start') ?>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row purchace-popup">
      <div class="col-12">
        <span class="d-block d-md-flex align-items-center">
          <legend>Tambah Data Pemeliharaan</legend>
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
                <label for="nama">ID Pemeliharaan</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="Masukkan ID Pemeliharaan">
              </div>
              <div class="form-group">
                <label for="nama">Pemeliharaan</label>
                <input type="text" class="form-control" id="pemeliharaan" name="hasil_pemeliharaan" placeholder="Masukkan Hasil Pemeliharaan">
              </div>
              <div class="form-group">
                <label for="nama">Tanggal Pemeliharaan</label>
                <input type="text" class="form-control" id="datepicker" name="datepicker" placeholder="Masukkan Tgl Pemeliharaan">
              </div>
              <div class="form-group">
                <label for="nama">ID Aset</label>
                <input type="text" class="form-control" id="id_aset" name="id_aset" placeholder="Masukkan ID Aset">
              </div>
              
                <a class="btn btn-info" href="<?php echo site_url('pemeliharaan/') ?>">Kembali</a>
                <button type="submit" class="btn btn-primary">OK</button>
                <?php echo form_close() ?>
          
      </div>
  </div>
 
</div>
<?php $this->load->view('admin/partials/base_end') ?>
<link rel="stylesheet" href="<?php echo base_url();?>assets/jqueryui/development-bundle/themes/base/jquery.ui.all.css">
<script src="<?php echo base_url();?>assets/jqueryui/development-bundle/jquery-1.6.2.js"></script>
<script src="<?php echo base_url();?>assets/jqueryui/development-bundle/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url();?>assets/jqueryui/development-bundle/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>assets/jqueryui/development-bundle/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/jqueryui/development-bundle/demos/demos.css">
<script>
    $(function() {
        // $( "#datepicker" ).datepicker({
        //     changeMonth: true, // menampilkan dropdown untuk ganti bulan
        //     changeYear: true // menampilkan dropdown untuk ganti Tahun
        // });
        //datepicker
    $('.#datepicker').datepicker({
        autoclose: true,
        // format: "yyyy-mm-dd",
        todayHighlight: true,
        todayBtn: true,
        todayHighlight: true,  
        changeMonth: true,
    	changeYear: true,
    });
 
    });
    </script>