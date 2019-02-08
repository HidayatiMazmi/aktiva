

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>LAPORAN PEMELIHARAAN ASET</title>
	<style type="text/css">
		@font-face {font-family: 'Open Sans';font-style: normal;font-weight: 300;src: local('Open Sans Light'), local('OpenSans-Light');}
		@font-face {font-family: 'Open Sans';font-style: normal;font-weight: 400;src: local('Open Sans'), local('OpenSans');}
		@font-face {font-family: 'Open Sans';font-style: normal;font-weight: 600;src: local('Open Sans Semibold'), local('OpenSans-Semibold');}
		@font-face {font-family: 'Open Sans';font-style: normal;font-weight: 700;src: local('Open Sans Bold'), local('OpenSans-Bold');}
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
		<td colspan="3" style="text-align: center;"><h2>Data Pemeliharaan Aset</h2></td>
	</tr>
</table>
	<?php if (isset($results)) { 
		$y=1;?>
	<?php foreach($results as $row) { ?>
<table border="0" class="TableFormulir" style="width:30%">
    <tr>
		<td style="font-size:12px;"><?php echo $y++; ?>.</td>
    	<td style="font-size:12px;">Kode</td>
    	<td style="font-size:12px;">:</td>
    	<td style="font-size:12px;"><?php echo $row->kode; $i=1; ?></td>
    </tr>
    <tr>
		<td style="font-size:12px;"></td>
    	<td style="font-size:12px;">Nama Aset</td>
    	<td style="font-size:12px;">:</td>
    	<td style="font-size:12px;"><?php echo $row->nama_aset; ?></td>
    </tr>
</table>
<br>
    <table border="1"  style="width:100%">
                      <thead>
                        <tr>
						  <th style="text-align: center; font-size:10px;">No</th>
						  <th style="text-align: center; font-size:10px;">No Pemeliharaan</th>
                          <th style="text-align: center; font-size:10px;">Tanggal Pemeliharaan</th>
                          <th style="text-align: center; font-size:10px;">Hasil Pemeliharaan</th>
						  <th style="text-align: center; font-size:10px;">Hari Pemeliharaan</th>
							<th style="text-align: center; font-size:10px;">Harga Pemeliharaan</th>
						  <th style="text-align: center; font-size:10px;">Keterangan</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <tr>
						  <td style="text-align: center; font-size:10px;"><?php echo $i++; ?></td>
						  <td style="text-align: center; font-size:10px;"><?php echo $row->no_pemeliharaan; ?></td>
                          <td style="text-align: center; font-size:10px;"><?php echo $row->tanggal_pemeliharaan; ?></td>
                          <td style="text-align: center; font-size:10px;"><?php echo $row->hasil_pemeliharaan; ?></td>
													<td style="text-align: center; font-size:10px;"><?php echo $row->harga_pemeliharaan; ?></td>
						  <td style="text-align: center; font-size:10px;"><?php echo $row->nama_hari; ?></td>
						  <td style="text-align: center; font-size:10px;"><?php echo $row->keterangan; ?></td>
                        </tr>
                      </tbody>                      
					</table>
					</table>
					<br>
					<?php } ?>
                        <?php } else { ?>
                      <?php } ?>
                      <?php echo form_close(); ?>
		<div id="lastDataTable"></div>
	</div>
  </body>
</html>
