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
                      <label for="id">ID</label>
                      <input type="text" class="form-control" id="id" name="id" placeholder="Masukkan ID">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                      <label for="nip">NIP</label>
                      <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP">
                    </div>
                    <div class="form-group">
                      <label for="username">username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                      <label for="password">password</label>
                      <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan password">
                    </div>
                    <div class="form-group">
                      <label for="role">role</label>
                      <select name="role" class="form-control">
                        <option>admin</option>
                        <option>user</option>
                      </select>
                      <script type="text/javascript">$("select[name='role']").val("<?php echo $user->role ?>")</script>
                    </div>
                   
                    <div class="form-group">
                      <label>File upload Photo</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" id="photo" name="photo" disabled placeholder="Masukkan Foto">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    
                      <a class="btn btn-info" href="<?php echo site_url('user_admin/') ?>">Kembali</a>
                      <button type="submit" class="btn btn-primary">OK</button>
                      <?php echo form_close() ?>
                    </div>
                </div>
              </div>
            
<?php $this->load->view('admin/partials/base_end') ?>