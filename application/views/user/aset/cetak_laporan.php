

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>LAPORAN ASET</title>
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
		<td align="left" width="12%"><img src="<?php echo base_url('assets/img/ico/logopgbesar.png');?>" width="100" height="100" alt="Logo PG. Kebon Agung" title="Logo PG. Kebon Agung"></td>
            <td align="center" width="88%" colspan="2">
            <div>
              <div style="font-size:20px">PT KEBON AGUNG</div>
              <div style="font-size:25px">PABRIK GULA KEBON AGUNG</span></div>
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
                          <th style="text-align: center;">No</th>
                          <th style="text-align: center;">Nama Aset</th>
                          <th style="text-align: center;">Kode Aset</th>
                          <th style="text-align: center;">Jenis Aset</th>
                          <th style="text-align: center;">Kategori Aset</th>
                          <th style="text-align: center;">Tanggal Terima</th>
                          <th style="text-align: center;">Masa Pemakaian</th>
                          <th style="text-align: center;">Kondisi Aset</th>
                        </tr>
                      </thead>
                      <tbody>
                      <style>
                        baik  {
                          background-color: #80ced6;
                        }
                        rusak  {
                          background-color: #f18973;
                        }
                        kosong  {
                          background-color: #e8de81;
                        }
						td {       text-align: center;       padding: 5px;       } 
					  </style>
					  <?php if (isset($results)) { 
                        $i=1; ?>
                        <?php foreach($results as $row) { 
                          ?>
                        <tr>
                          <td><?php echo $i++; ?></td>
                          <td><?php echo $row->nama_aset; ?></td>
                          <td><?php echo $row->kode_aset; ?></td>
                          <td><?php echo $row->nama_jenis; ?></td>
                          <td><?php echo $row->nama_kategori; ?></td>
                          <td><?php echo $row->tgl_terima; ?></td>
                          <td><?php echo $row->masa_pemakaian; ?></td>
                          <td><?php echo $row->kondisi_awal; ?></td>
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