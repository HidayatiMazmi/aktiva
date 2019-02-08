<footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.pgkebonagung.com/" target="_blank">Web PG. Kebon Agung Malang</a>.</span>
          </div>
        </footer>
        <!-- Tambah Aset -->
	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambah-aset" class="modal fade-in">
	    <div class="modal-dialog">
	        <div class="modal-content">
	            <div class="modal-header">
	                <h4 class="modal-title">Tambah Data Aset</h4>
	            </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="form-group">
                      <p>Kategori Aset apa yang ingin anda tambahkan?</p>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <a class="btn btn-info" href="<?php echo base_url('aset/createAset/');?>">Kategori Kendaraan?</a>
                  <a class="btn btn-success" href="<?php echo base_url('aset/create/');?>">Kategori yang lain?</a>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
              </div>     
	          </div>
	        </div>
	    </div>
	</div>
	<!-- END User Tambah -->
