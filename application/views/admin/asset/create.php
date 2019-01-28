<?php $this->load->view('admin/partials/base_start') ?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
              <legend>Tambah Data Asset</legend>
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
                      <label for="nama_aset">Nama Aset</label>
                      <input type="text" class="form-control" id="nama_aset" name="nama_aset" placeholder="Masukkan Nama Aset">
                    </div>
                    <div class="form-group">
                      <label for="kode_aset">Kode Aset</label>
                      <input type="text" class="form-control" id="kode_aset" name="kode_aset" placeholder="Masukkan Kode Aset">
                    </div>
                    <div class="form-group">
                      <label for="tgl_terima">Tanggal Terima</label>
                      <input type="text" class="form-control" id="tgl_terima" name="tgl_terima" placeholder="Masukkan Tanggal Terima">
                    </div>
                    <div class="form-group">
                      <label for="password">Masa Pemakaian</label>
                      <input type="text" class="form-control" id="masa_pemakaian" name="masa_pemakaian" placeholder="Masukkan Masa Pemakaian">
                    </div>
                    <div class="form-group">
                      <label>File upload Asset</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" id="foto_fisik_aset" name="foto_fisik_aset" placeholder="Masukkan Foto Asset">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="kondisi_awal">Kondisi awal</label>
                      <input type="text" class="form-control" id="kondisi_awal" name="kondisi_awal" placeholder="Masukkan Kondisi Awal">
                    </div>
                    <div class="form-group">
                      <label for="nilai_aset">Nilai Asset</label>
                      <input type="text" class="form-control" id="nilai_aset" name="nilai_aset" placeholder="Masukkan Nilai Asset">
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">
                    </div>
                      <a class="btn btn-info" href="<?php echo site_url('Asset/') ?>">Kembali</a>
                      <button type="submit" class="btn btn-primary">OK</button>
                      <?php echo form_close() ?>
                    </div>
                </div>
              </div>
            
<?php $this->load->view('admin/partials/base_end') ?>