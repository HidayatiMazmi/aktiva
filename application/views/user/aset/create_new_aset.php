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
                  <?php echo form_open_multipart('Aset/create'); ?>
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
                          <label class="col-sm-3 col-form-label">Kode Aset</label>
                          <div class="col-sm-9">
                            <input type="text" id="kode_aset" name="kode_aset" class="form-control" placeholder="kode Aset"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nilai Aset</label>
                          <div class="col-sm-9">
                            <input type="text" id="nilai_aset" name="nilai_aset" class="form-control" placeholder="Nilai Aset"/>
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Terima</label>
                          <div class="col-sm-9">
                          <input type="date" class="form-control datepicker" format="dd-mm-yyyy" id="tgl_terima" name="tgl_terima" placeholder="Tanggal Terima">
                            <!-- <input type="text" id="tgl_terima" name="tgl_terima" class="form-control" placeholder="Tanggal Terima"/> -->
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Masa Pemakaian</label>
                          <div class="col-sm-9">
                            <input type="text" id="masa_pemakaian" name="masa_pemakaian" class="form-control" placeholder="Masa Pemakaian"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kondisi Awal</label>
                          <div class="col-sm-9">
                            <input type="text" id="kondisi_awal" name="kondisi_awal" class="form-control" placeholder="Kondisi Awal"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kondisi Aset Sekarang</label>
                          <div class="col-sm-9">
                            <input type="text" id="kondisi_aset_sekarang" name="kondisi_aset_sekarang" class="form-control" placeholder="Kondisi Aset Sekarang"/>
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
                              <?php foreach($kategori as $k) { ?>
                                <option value="<?php echo $k['id']; ?>"><?php echo $k['nama_kategori']; ?></option>
                              <?php } ?>
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
          </div>
        </div>
        <!-- content-wrapper ends -->

        <?php $this->load->view('user/partials/base_end') ?>