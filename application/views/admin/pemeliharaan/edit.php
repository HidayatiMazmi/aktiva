<?php $this->load->view('admin/partials/base_start') ?>
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
              <legend>Edit Data Pemeliharaan</legend>
              </span>
            </div>
          </div>
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <?php echo form_open_multipart(''); ?>
                    <div class="form-group">
                          <label class="col-sm-3 col-form-label">No Pemeliharaan</label>
                          <input type="text" class="form-control" name="no_pemeliharaan" value="<?php echo $pemeliharaan[0]['no_pemeliharaan']; ?>">
                    </div>
                        <div class="form-group">
                          <label class="col-sm-3 col-form-label">Hasil Pemeliharaan</label>
                          <input type="text" class="form-control" name="hasil_pemeliharaan" value="<?php echo $pemeliharaan[0]['hasil_pemeliharaan']; ?>">
                      </div>
                        <div class="form-group">
                          <label class="col-sm-3 col-form-label">Tanggal Pemeliharaan</label>
                          <input type="date" class="form-control datepicker" format="mm-dd-yyyy" name="tanggal_pemeliharaan" value="<?php echo $pemeliharaan[0]['tanggal_pemeliharaan']; ?>">
                            <!-- <input type="text" id="tgl_terima" name="tgl_terima" class="form-control" placeholder="Tanggal Terima"/> -->
                          </div>
                    <div class="form-group">
                      <label class="col-sm-3 col-form-label">Kode Aset</label>
                        <select name="id_aset" class="form-control" placeholder="Pilih Kategori">
                          <option value="" selected="selected">Pilih Kode Aset</option>
                          <?php foreach($aset as $a) { ?>
                            <option value="<?php echo $a['id']; ?>" <?php echo ($a['id'] == $pemeliharaan[0]['id_aset'] ? 'selected="selected"' : ''); ?>><?php echo $a['kode_aset']; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 col-form-label">Hari</label>
                        <select name="id_hari" class="form-control" placeholder="Pilih Hari">
                          <option value="" selected="selected">Pilih Hari</option>
                          <?php foreach($hari as $h) { ?>
                            <option value="<?php echo $h['id']; ?>" <?php echo ($h['id'] == $pemeliharaan[0]['id_hari'] ? 'selected="selected"' : ''); ?>><?php echo $h['nama_hari']; ?></option>
                          <?php } ?>
                        </select>
                    </div>
                        <div class="form-group">
                          <label class="col-sm-3 col-form-label">Keterangan</label>
                          <input type="text" class="form-control" name="keterangan" value="<?php echo $pemeliharaan[0]['keterangan']; ?>">
                      </div>
                      <a class="btn btn-info" href="<?php echo site_url('pemeliharaan/') ?>">Kembali</a>
                      <button type="submit" class="btn btn-primary">OK</button>
                      <?php echo form_close() ?>
                    </div>
                </div>
              </div>
<?php $this->load->view('admin/partials/base_end') ?>