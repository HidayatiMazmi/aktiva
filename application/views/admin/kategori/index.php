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
                    <?php echo form_open("Kategori/search")?>
                      <input class="form-control" type="text" name="search" value="" placeholder="Masukkan Kategori. . .">
                      <input type="submit" class="btn btn-primary" value="Search">
                      <a href="<?php echo site_url("Kategori/index"); ?>" class="btn btn-primary">Show All</a>
                    <?php ?>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <th>No</th>
                            <th>Kategori</th>
                            <th><a class="btn btn-primary" href="<?php echo site_url('kategori/create/') ?>">Tambah</a>
                            </th>
                            </thead>
                            <tbody>
                            <?php $number = 1; foreach($kategori as $row) { ?>
                            <tr>
                                <td><?php echo $number++; ?></td>
                                <td><?php echo $row->nama_kategori ?></td>
                                <td><?php echo form_open('kategori/destroy/'.$row->id); ?>
                                  <a class="btn btn-info" href="<?php echo site_url('kategori/edit/'.$row->id) ?>">Ubah</a>
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