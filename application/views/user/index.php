<?php $this->load->view('user/partials/base_start') ?>
        <!-- iki index -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-bottom">
                    <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Aset</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo count($countAllAset); ?></h3>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-bottom">
                      <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Aset Bergerak</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo count($countAsetBergerak); ?></h3>
                      </div>
                    </div>
                  </div>
                  <!-- <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales
                  </p> -->
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-bottom">
                      <i class="mdi mdi-poll-box text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Aset Non Bergerak</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0"><?php echo count($countAsetNonBergerak); ?></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
          </div>
        </div>
        <!-- content-wrapper ends -->

        <?php $this->load->view('user/partials/base_end') ?>