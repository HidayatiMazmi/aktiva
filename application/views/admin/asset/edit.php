<?php $this->load->view('admin/partials/base_start') ?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
              <legend>Edit Data User</legend>
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
                      <label for="nama">ID</label>
                      <input type="text" class="form-control" id="id" name="id" value="<?php echo $aset->id ?>" placeholder="Masukkan ID">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" id="nama_aset" name="nama_aset" value="<?php echo $aset->nama_aset ?>" placeholder="Masukkan id">
                    </div>
                    <div class="form-group">
                      <label for="nip">Kode</label>
                      <input type="text" class="form-control" id="kode_aset" name="kode_aset" value="<?php echo $aset->kode_aset ?>" placeholder="Masukkan Kode Aset">
                    </div>
                    <div class="form-group">
                      <label for="tgl_terima">Tanggal Terima</label>
                      <input type="text" class="form-control" id="tgl_terima" name="tgl_terima"  value="<?php echo $aset->tgl_terima ?>" placeholder="Masukkan Tanggal Terima">
                    </div>
                    <div class="form-group">
                      <label for="password">Masa Pemakaian</label>
                      <input type="text" class="form-control" id="masa_pemakaian" name="masa_pemakaian"  value="<?php echo $aset->masa_pemakaian ?>"placeholder="Masukkan Masa Pemakaian">
                    </div>
                    <div class="form-group">
                      <label>File upload Asset</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" id="foto_fisik_aset" name="foto_fisik_aset"  value="<?php echo $aset->foto_fisik_aset ?>" placeholder="Masukkan Foto Asset">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="kondisi_awal">Kondisi awal</label>
                      <input type="text" class="form-control" id="kondisi_awal" name="kondisi_awal"  value="<?php echo $aset->kondisi_awal ?>" placeholder="Masukkan Kondisi Awal">
                    </div>
                    <div class="form-group">
                      <label for="nilai_aset">Nilai Asset</label>
                      <input type="text" class="form-control" id="nilai_aset" name="nilai_aset"  value="<?php echo $aset->nilai_aset ?>" placeholder="Masukkan Nilai Asset">
                    </div>
                    <div class="form-group">
                      <label for="nilai_aset">Jumlah Barang</label>
                      <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang"  value="<?php echo $aset->jumlah_barang ?>" placeholder="Masukkan Jumlah Barang">
                    </div>
                    <div class="form-group">
                      <label for="keterangan">Keterangan</label>
                      <input type="text" class="form-control" id="keterangan" name="keterangan"  value="<?php echo $aset->keterangan ?>" placeholder="Masukkan Keterangan">
                    </div>
                    <div class="form-group">
                      <label for="keterangan">ID Jenis</label>
                      <input type="text" class="form-control" id="id_jenis" name="id_jenis"  value="<?php echo $aset->id_jenis ?>" placeholder="Masukkan ID Jenis">
                    </div>
                    <div class="form-group">
                      <label for="keterangan">ID Kategori</label>
                      <input type="text" class="form-control" id="id_kategori" name="id_kategori"  value="<?php echo $aset->id_kategori ?>"placeholder="Masukkan ID Kategori">
                    </div>
                    <div class="form-group">
                      <label for="keterangan">ID Lokasi</label>
                      <input type="text" class="form-control" id="id_lokasi" name="id_lokasi"  value="<?php echo $aset->id_lokasi ?>" placeholder="Masukkan ID Lokasi">
                    </div>
                    
                      <a class="btn btn-info" href="<?php echo site_url('Asset/') ?>">Kembali</a>
                      <button type="submit" class="btn btn-primary">OK</button>
                      <?php echo form_close() ?>
                    </div>
                </div>
              </div>
            
<?php $this->load->view('admin/partials/base_end') ?>