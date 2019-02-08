<?php $this->load->view('admin/partials/base_start') ?>
        <!-- iki index -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
              <p>Hello, <?php echo $username;?>!</p>
              </span>
            </div>
          </div>
          <!--  -->
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <?php echo form_open("Asset/search")?>
                      <input class="form-control" type="text" name="search" value="" placeholder="Masukkan Aset. . .">
                      <input type="submit" class="btn btn-primary" value="Search">
                      <a href="<?php echo site_url("Asset/index"); ?>" class="btn btn-primary">Show All</a>
                    <?php ?>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <th>No</th>
                        <th>Nama Asset</th>
                        <th>Kode Asset</th>
                        <th>Tanggal Terima</th>
                        <th>Masa Pemakaian</th>
                        <th>Foto Asset</th>
                        <th>Kondisi Awal</th>
                        <th>Nilai Asset</th>
                        <th>Jumlah barang</th>
                        <th>Jenis</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th><a class="btn btn-primary" href="<?php echo base_url('Asset/tambah/') ?>">Tambah</a></th>
                      </thead>
                      <tbody>
                      <?php $number = 1; foreach($aset as $row) { ?>
                        <tr>
                            <td><?php echo $number++; ?></td>
                            <td><?php echo $row->nama_aset ?></td>
                            <td><?php echo $row->kode_aset ?></td>
                            <td><?php echo $row->tgl_terima ?></td>
                            <td><?php echo $row->masa_pemakaian ?></td>
                            <td>
                            <img src="<?php echo base_url('assets/img/aset/'.$row->foto_fisik_aset)?>" width="100">
                            </td>
                            <td><?php echo $row->kondisi_awal ?></td>
                            <td><?php echo $row->nilai_aset ?></td>
                            <td><?php echo $row->jumlah_barang ?></td>
                            <td><?php echo $row->id_jenis ?></td>
                            <td><?php echo $row->id_kategori ?></td>
                            <td><?php echo $row->id_lokasi ?></td>
                            <td>
                                <?php echo form_open('Asset/destroy/'.$row->id); ?>
                                <a class="btn btn-info" href="<?php echo site_url('Asset/edit/'.$row->id) ?>">Ubah</a>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                <?php echo form_close() ?>
                            </td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                    <!-- <div class="col-md-2-right">
                        <a href="<?php echo base_url(); ?>asset/downloadLaporan/" class="btn btn-primary btn-sm">Download Laporan Aset<i class="mdi mdi-printer"></i></a>
                      </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--  -->
            <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
        </div>       
      </div>
    </div>
<!-- content-wrapper ends -->
<?php $this->load->view('admin/partials/base_end') ?>