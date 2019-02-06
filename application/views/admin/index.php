<!-- iya ini -->
<?php $this->load->view('admin/partials/base_start') ?>
        <!-- iki index -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12">
              <span class="d-block d-md-flex align-items-center">
                <p>Hello, <?php echo $username;?>!</p>
              </span>
            </div>
          </div>
          <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
            <div style="background-color: #4db4f9;" class="box-header">
                    <h1 class="card-title"><font color="#f4f2f3">Catatan Penggunaan Sistem Informasi Aktiva Pada PG. Kebon Agung Malang</font></h1>
             </div><!-- /.box-header -->
              	<div class="box-body table-responsive">
                  <table>
					<tr>
						<td>1.&nbsp;</td>
						<td colspan="2">Jika ingin menambahkan aset klik pada button <img src="<?php base_url()?>assets/img/dashboard/ta.jpg"/></td>
					</tr>
					<tr>
						<td>2.&nbsp;</td>
						<td colspan="2">Jika ingin melihat aset yang telah diinputkan klik pada menu <img src="<?php base_url()?>assets/img/dashboard/as.jpg"/></td>
					</tr>
					<tr>
						<td>3.&nbsp;</td>
						<td colspan="2">Jadwal pemeliharaan terhubung dengan aset yang akan dikelola dalam pemeliharaannya, sehingga saat menginputkan jadwal harus mengetahui kode aset tersebut</td>
					</tr>
				</table>
	            </div><!-- /.box-body -->
              
	     </div><!-- /.box -->
           
          </div>
        </div>
        <!-- content-wrapper ends -->

        <?php $this->load->view('admin/partials/base_end') ?>