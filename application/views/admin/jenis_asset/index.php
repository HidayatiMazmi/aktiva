<?php $this->load->view('admin/partials/base_start') ?>
        <!-- iki index -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
              <p>Hello, <?php echo $username;?>!</p>              </span>
            </div>
          </div>
          <!--  -->
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <?php echo form_open("Jenis_asset/search")?>
                      <input class="form-control" type="text" name="search" value="" placeholder="Masukkan Jenis Asset. . .">
                      <input type="submit" class="btn btn-primary" value="Search">
                      <a href="<?php echo site_url("Jenis_asset/index"); ?>" class="btn btn-primary">Show All</a>
                    <?php ?>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Jenis Asset</th>
                                <th><a class="btn btn-primary" href="<?php echo site_url('jenis_asset/create/') ?>">Tambah</a>
                                </th>
                            </thead>
                            <tbody>
                                <?php $number = 1; foreach($jenis_asset as $row) { ?>
                                <tr>
                                    <td><?php echo $number++; ?></td>
                                    <td><?php echo $row->nama_jenis ?></td>
                                    <td>
                                    <?php echo form_open('jenis_asset/destroy/'.$row->id); ?>
                                    <a class="btn btn-info" href="<?php echo site_url('jenis_asset/edit/'.$row->id) ?>">Ubah</a>
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
<?php $this->load->view('admin/partials/base_end') ?>