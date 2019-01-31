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
                    <?php echo form_open("Pemeliharaan/search")?>
                      <input class="form-control" type="text" name="search" value="" placeholder="Masukkan Pemeliharaan. . .">
                      <input type="submit" class="btn btn-primary" value="search">
                      <a href="<?php echo site_url("Pemeliharaan/index"); ?>" class="btn btn-primary">Show All</a>
                    <?php ?>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Hasil Pemeliharaan</th>
                                <th>Tanggal Pemeliharaan</th>
                                <th>Aset</th>
                                <th>Hari</th>
                                <th><a class="btn btn-primary" href="<?php echo site_url('Pemeliharaan/create/') ?>">Tambah</a></th>
                            </thead>
                            <tbody>
                            <?php $number = 1; foreach($Pemeliharaan as $row) { ?>
                                <tr>
                                    <td><?php echo $number++; ?></td>
                                    <td><?php echo $row->hasil_pemeliharaan ?></td>
                                    <td><?php echo $row->tanggal_pemeliharaan ?></td>
                                    <td><?php echo $row->id_aset ?></td>
                                    <td><?php echo $row->id_hari ?></td>
                                    <td><?php echo form_open('Pemeliharaan/destroy/'.$row->id); ?><a class="btn btn-info" href="<?php echo site_url('Pemeliharaan/edit/'.$row->id) ?>">Ubah</a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                    <?php echo form_close() ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
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
<link href="asset/css/bootrstrap.min.css" rel="stylesheet">
<link href="asset/css/custom.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/plugin/datepicker/css/bootstrap-datepicker.min.css">


<?php $this->load->view('admin/partials/base_end') ?>