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

                  <h4 class="card-title">Tambah Aset</h4>
                  <?php echo form_open_multipart('Aset/createAset'); ?>
                  <form class="form-sample">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Aset</label>
                          <div class="col-sm-9">
                            <input type="text" id="nama_aset" name="nama_aset" class="form-control" placeholder="Nama Aset"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kode</label>
                          <div class="col-sm-9">
                            <input type="text" id="kode" name="kode" class="form-control" placeholder="Kode"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tahun Perolehan</label>
                          <div class="col-sm-9">
                          <input type="number" value="2019" class="form-control datepicker" format="dd-mm-yyyy" id="tahun_perolehan" name="tahun_perolehan" placeholder="Tahun Perolehan">
                            <!-- <input type="text" id="tahun_perolehan" name="tahun_perolehan" class="form-control" placeholder="Tahun Perolehan"/> -->
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Masa Manfaat</label>
                          <div class="col-sm-9">
                            <input type="text" id="masa_manfaat" name="masa_manfaat" class="form-control" placeholder="Masa Manfaat"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Status</label>
                          <div class="col-sm-9">
                            <input type="text" id="status" name="status" class="form-control" placeholder="Status"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jumlah Barang</label>
                          <div class="col-sm-9">
                            <input type="text" id="jumlah_barang" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Foto Fisik Aset</label>
                          <div class="col-sm-9">
                            <input type="file" id="foto_fisik_aset" name="foto_fisik_aset" class="form-control" placeholder="Foto Fisik Aset"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kategori Aset</label>
                          <div class="col-sm-9">
                            <select name="id_kategori" class="form-control" placeholder="Pilih Kategori">
                              <option value="" selected="selected">Pilih Kategori</option>
                                <option value=3><?php echo "Kendaraan"; ?></option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jenis Aset</label>
                          <div class="col-sm-9">
                            <select name="id_jenis" class="form-control" placeholder="Pilih Jenis">
                              <option value="" selected="selected">Pilih Jenis</option>
                              <?php foreach($jenis_asset as $j) { ?>
                                 <option value="<?php echo $j['id']; ?>"><?php echo $j['nama_jenis']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Lokasi Aset</label>
                          <div class="col-sm-9">
                            <select name="id_lokasi" class="form-control" placeholder="Pilih Lokasi">
                              <option value="" selected="selected">Pilih Lokasi</option>
                              <?php foreach($lokasi as $l) { ?>
                                <option value="<?php echo $l['id']; ?>"><?php echo $l['nama_lokasi']; ?></option>
                              <?php } ?>
                            </select>
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
                      <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                      </div>
                    </div>
                  </form>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
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

                  <h4 class="card-title">Detail Kendaraan</h4>
                  <?php echo form_open_multipart('Aset/createAsetKendaraan'); ?>
                  <form class="form-sample">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kode</label>
                          <div class="col-sm-9">
                            <select name="id_aset" class="form-control" placeholder="Pilih Jenis">
                              <option value="" selected="selected">Pilih Kode</option>
                              <?php foreach($aset as $a) { ?>
                                 <option value="<?php echo $a['id']; ?>"><?php echo $a['kode']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nomor Polisi</label>
                          <div class="col-sm-9">
                            <input type="text" id="no_polisi" name="no_polisi" class="form-control" placeholder="Nomor Polisi"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nomor Rangka</label>
                          <div class="col-sm-9">
                            <input type="text" id="no_rangka" name="no_rangka" class="form-control" placeholder="Nomor Rangka"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nomor Mesin</label>
                          <div class="col-sm-9">
                            <input type="text" id="no_mesin" name="no_mesin" class="form-control" placeholder="Nomor Mesin"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Pembelian</label>
                          <div class="col-sm-9">
                            <input type="date" id="tanggal_pembelian" name="tanggal_pembelian" class="form-control" placeholder="Tanggal Pembelian"/>
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