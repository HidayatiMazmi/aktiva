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

                  <h4 class="card-title">Edit Aset</h4>
                  <?php echo form_open_multipart('Aset/update/'. $aset[0]['id']); ?>
                  <input type="hidden" name="id" value="<?php echo $aset[0]['id']; ?>" />
                  <form class="form-sample">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nama Aset</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="nama_aset" value="<?php echo $aset[0]['nama_aset']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kode Aset</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="kode_aset" value="<?php echo $aset[0]['kode_aset']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nilai Aset</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="nilai_aset" value="<?php echo $aset[0]['nilai_aset']; ?>">
                          </div>
                        </div>
                      </div>
                      
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal Terima</label>
                          <div class="col-sm-9">
                          <input type="date" class="form-control datepicker" format="mm-dd-yyyy" name="tgl_terima" value="<?php echo $aset[0]['tgl_terima']; ?>">
                            <!-- <input type="text" id="tgl_terima" name="tgl_terima" class="form-control" placeholder="Tanggal Terima"/> -->
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Masa Pemakaian</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="masa_pemakaian" value="<?php echo $aset[0]['masa_pemakaian']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Kondisi Awal</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="kondisi_awal" value="<?php echo $aset[0]['kondisi_awal']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Jumlah Barang</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="jumlah_barang" value="<?php echo $aset[0]['jumlah_barang']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Foto Fisik Aset</label>
                          <div class="col-sm-9">
                          <img id="foto_fisik_aset" height="100" width="100" src="<?php echo base_url(); ?>assets/img/aset/<?php echo $aset[0]['foto_fisik_aset']; ?>" alt="">
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
                                <option value="<?php echo $k['id']; ?>" <?php echo ($k['id'] == $aset[0]['id_kategori'] ? 'selected="selected"' : ''); ?>><?php echo $k['nama_kategori']; ?></option>
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
                                <option value="<?php echo $j['id']; ?>" <?php echo ($j['id'] == $aset[0]['id_jenis'] ? 'selected="selected"' : ''); ?>><?php echo $j['nama_jenis']; ?></option>
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
                                <option value="<?php echo $l['id']; ?>" <?php echo ($l['id'] == $aset[0]['id_lokasi'] ? 'selected="selected"' : ''); ?>><?php echo $l['nama_lokasi']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Keterangan</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" name="keterangan" value="<?php echo $aset[0]['keterangan']; ?>">
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