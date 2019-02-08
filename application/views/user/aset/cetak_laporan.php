

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
    <table border="1" class="TableFormulir" style="width:100%">
                      <thead>
                        <tr>
                          <th style="text-align: center; font-size:10px;">No</th>
                          <th style="text-align: center; font-size:10px;">Nama Aset</th>
                          <th style="text-align: center; font-size:10px;">Kode</th>
                          <th style="text-align: center; font-size:10px;">Jenis Aset</th>
                          <th style="text-align: center; font-size:10px;">Kategori Aset</th>
                          <th style="text-align: center; font-size:10px;">Lokasi Aset</th>
                          <th style="text-align: center; font-size:10px;">Tahun Perolehan</th>
                          <th style="text-align: center; font-size:10px;">Masa Manfaat</th>
                          <th style="text-align: center; font-size:10px;">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <style>
						td {       text-align: center;       padding: 5px;       } 
					  </style>
					  <?php if (isset($results)) { 
                        $i=1; ?>
                        <?php foreach($results as $row) { 
                          ?>
                        <tr>
                          <td style="text-align: center; font-size:10px;"><?php echo $i++; ?></td>
                          <td style="text-align: center; font-size:10px;"><?php echo $row->nama_aset; ?></td>
                          <td style="text-align: center; font-size:10px;"><?php echo $row->kode; ?></td>
                          <td style="text-align: center; font-size:10px;"><?php echo $row->nama_jenis; ?></td>
                          <td style="text-align: center; font-size:10px;"><?php echo $row->nama_kategori; ?></td>
                          <td style="text-align: center; font-size:10px;"><?php echo $row->nama_lokasi; ?></td>
                          <td style="text-align: center; font-size:10px;"><?php echo $row->tahun_perolehan; ?></td>
                          <td style="text-align: center; font-size:10px;"><?php echo $row->masa_manfaat; ?></td>
                          <td style="text-align: center; font-size:10px;"><?php echo $row->status; ?></td>
                        </tr>
                        <?php } ?>
                        <?php } else { ?>
							<tr>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                        </tr>
                      <?php } ?>
                      <?php echo form_close(); ?>
                      </tbody>
                    </table>

		<div id="lastDataTable"></div>
	</div>
  </body>
</html>