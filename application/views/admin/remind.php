<div id="profile-page-content" class="row">
    <div class="col s12">
        <?php
        $querynotif = "SELECT * FROM tb_karyawan";
        $querydatanotif = mysqli_query($connect, $querynotif);
        if(mysqli_num_rows($querydatanotif)>0){
        while($data = mysqli_fetch_array($querydatanotif)){
        $nama_kar_notif = $data['nama_karyawan'];
        $tanggal_akhir_kontrak = $data['tanggal_akhir_kontrak'];   
        ?>
        <?php
        $tanggal_akhir = new DateTime($tanggal_akhir_kontrak); 
        $tanggal_now = new DateTime();
        $lama = $tanggal_now->diff($tanggal_akhir);
        if ($lama->days > 1 AND $lama->days < 360) {
        ?>
     <div id="card-alert" class="card green col s12">
        <div class="card-content white-text">
          <p style="text-align: center;"><i class="mdi-action-info-outline"></i> INFO : Karyawan Dengan Nama : <b><?php echo $nama_kar_notif;?></b> akan habis kontrak <?php echo "$lama->d"?> hari lagi</p>
          </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span></button>
       </div>
       <?php
         }
         if($lama->days < 3 AND $lama->days > 365){
         ?>
         <div id="card-alert" class="card red col s12">
            <div class="card-content white-text">
              <p style="text-align: center;"><i class="mdi-alert-error"></i> INFO : Karyawan Dengan Nama : <b><?php echo $nama_kar_notif;?></b> akan habis kontrak <?php echo "$lama->d"?> hari lagi</p>
             </div>
             <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">×</span>
             </button>
            </div>
            <?php }
            }
            } ?>
            </div>
        </div>