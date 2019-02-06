

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>LAPORAN ASET</title>
	<style type="text/css">
		@font-face {font-family: 'Open Sans';font-style: small;font-weight: 300;src: local('Open Sans Light'), local('OpenSans-Light');}
		@font-face {font-family: 'Open Sans';font-style: small;font-weight: 400;src: local('Open Sans'), local('OpenSans');}
		@font-face {font-family: 'Open Sans';font-style: small;font-weight: 600;src: local('Open Sans Semibold'), local('OpenSans-Semibold');}
		@font-face {font-family: 'Open Sans';font-style: small;font-weight: 700;src: local('Open Sans Bold'), local('OpenSans-Bold');}
	</style>
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/ico/logopgbesar.png');?>">
</head>
<body>
<table border="0"  style="width:100%">
    <tbody>
        <tr>
            <td align="left" width="12%"><img src="<?php echo base_url('assets/img/ico/korp1.png');?>" width="100" height="100" alt="Logo PG. Kebon Agung" title="Logo PG. Kebon Agung"></td>
            <td align="center" width="88%" colspan="2">
			
            <div>
			        <div><img src="<?php echo base_url('assets/img/ico/korp2.jpg');?>" width="500" height="80" alt="Logo PG. Kebon Agung" title="Logo PG. Kebon Agung"></div>
              <div style="font-size:15px">Kotak Pos 80 Telp. (0341) 801371 - 801064 Fax. (0314) 801143 - Malang 65102</div>
            </div>
            </td>
        </tr>
    </tbody>
</table>
<hr style="border-top:solid 1px #000000; border-bottom:solid 1px #000000; line-height:normal; color:#FFFFFF; margin-top:2px;">
<br>
<table border="0" class="TableFormulir" style="width:100%">
	<tr>
		<td colspan="3" style="text-align: center;"><h2>Data Aset</h2></td>
	</tr>
    <form class="form-sample">
                    <div class="row">
                    <div class="col-md-3">
                        <div class="form-group row">
                          <!-- <label class="col-sm-3 col-form-label">Foto Fisik Aset</label> -->
                          <table border="1" style="width:10%">
                          <td align="center"><img height="100" width="100" src="<?php echo base_url();?>assets/img/aset/<?php echo $aset->foto_fisik_aset;?>"></td>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <div class="col-sm-9">
                          <?php if (isset($aset)) {  ?>
                          <table border="1"  style="width:100%">
                      <thead>
                        <tr>
						  <th style="text-align: center;">Nama Aset</th>
						  <th style="text-align: center;">Kode Aset</th>
                          <th style="text-align: center;">Jenis Aset</th>
                          <th style="text-align: center;">Kategori Aset</th>
						  <th style="text-align: center;">Lokasi Aset</th>
                          <th style="text-align: center;">Kondisi Aset</th>
                          <th style="text-align: center;">Masa Pemakaian</th>
                          <th style="text-align: center;">Nilai Aset</th>
						  <th style="text-align: center;">Tanggal Terima</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <tr>
						  <td style="text-align: center;"><?php echo $aset->nama_aset; ?></td>
						  <td style="text-align: center;"><?php echo $aset->kode_aset; ?></td>
                          <td style="text-align: center;"><?php echo $aset->nama_jenis; ?></td>
                          <td style="text-align: center;"><?php echo $aset->nama_kategori; ?></td>
						  <td style="text-align: center;"><?php echo $aset->nama_lokasi; ?></td>
						  <td style="text-align: center;"><?php echo $aset->kondisi_awal; ?></td>
                          <td style="text-align: center;"><?php echo $aset->masa_pemakaian; ?></td>
                          <td style="text-align: center;"><?php echo $aset->nilai_aset; ?></td>
                          <td style="text-align: center;"><?php echo $aset->tgl_terima; ?></td>
                        </tr>
                      </tbody>
					</table>
                      <?php } ?>

		<div id="lastDataTable"></div>
	</div>
  </body>
</html>
