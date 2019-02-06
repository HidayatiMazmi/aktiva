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
                <?php echo form_open_multipart('asset/tambah'); ?>
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
                      <input type="date" class="form-control datepicker" id="tgl_terima" name="tgl_terima" placeholder="Masukkan Tanggal Terima">
                    </div>
                    <div class="form-group">
                      <label for="password">Masa Pemakaian</label>
                      <input type="text" class="form-control" id="masa_pemakaian" name="masa_pemakaian" placeholder="Masukkan Masa Pemakaian">
                    </div>
                    <div class="form-group">
                      <label for="password">Jumlah Barang</label>
                      <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Masukkan Jumlah Barang">
                    </div>
                    <div class="form-group">
                      <label>File upload Photo</label>
                      <div class="input-group col-xs-12">
                        <span class="input-group-append">
                          <input type="file" class="file-upload-browse btn btn-info" 
                          id="foto_fisik_aset" name="foto_fisik_aset" placeholder="Masukkan Foto">
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
                    <div class="form-group">
                      <label>Kategori Aset</label>
                        <select name="id_kategori" class="form-control" placeholder="Pilih Kategori">
                          <option value="" selected="selected">Pilih Kategori</option>
                          <?php foreach($kategori as $k) { ?>
                            <option value="<?php echo $k['id']; ?>"><?php echo $k['nama_kategori']; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Jenis Aset</label>
                        <select name="id_jenis" class="form-control" placeholder="Pilih Jenis">
                          <option value="" selected="selected">Pilih Jenis</option>
                          <?php foreach($jenis_asset as $j) { ?>
                            <option value="<?php echo $j['id']; ?>"><?php echo $j['nama_jenis']; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 col-form-label">Lokasi Aset</label>
                        <select name="id_lokasi" class="form-control" placeholder="Pilih Lokasi">
                          <option value="" selected="selected">Pilih Lokasi</option>
                          <?php foreach($lokasi as $l) { ?>
                            <option value="<?php echo $l['id']; ?>"><?php echo $l['nama_lokasi']; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                      <a class="btn btn-info" href="<?php echo site_url('Asset/') ?>">Kembali</a>
                      <button type="submit" class="btn btn-primary">OK</button>
                      <?php echo form_close() ?>
                    </div>
                </div>
              </div>
            
<?php $this->load->view('admin/partials/base_end') ?>