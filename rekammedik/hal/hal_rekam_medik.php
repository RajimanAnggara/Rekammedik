<?php
switch($_GET[act]){
  // Tampil pasien
  default:
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> laporan Rekam Medik</h2><hr>
    </div>
	<form method=POST action='?hal=rekam_medik&act=cari'>
	<td align=right>Pencarian</td><td>: ";
	   combobln1(1,12,'bln',$bln_sekarang);
	echo "<td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span></td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a type='button' name='button' class='art-button' target='_blank' href='./laporan.php'>Cetak Data</a>
    </span>
	</form>";
    $tampil=mysql_query("SELECT * FROM anamnesis");
	
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Tanggal</th><th>Nama Pasien</th><th>Kode Dokter</th><th>Diagnosa</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$p=mysql_fetch_array(mysql_query("SELECT * FROM pasien where no_pasien='$r[no_pasien]'"));
	$d=mysql_fetch_array(mysql_query("SELECT * FROM dokter where kode_dokter='$r[id_dokter]'"));
	$d1=mysql_fetch_array(mysql_query("SELECT * FROM diagnosa where id_diagnosa='$r[id_diagnosa1]'"));
	$d2=mysql_fetch_array(mysql_query("SELECT * FROM diagnosa where id_diagnosa='$r[id_diagnosa2]'"));
if ($p[no_pasien]==$r[no_pasien]){
	$jum=strlen($no);
	$tgl=tgl_indo($r[tanggal]);
	if ($jum==2){
      echo "<tr><td align=center>00$no</td>";
	} else {
	  echo "<tr><td align=center>000$no</td>";
	}
      echo "<td>$tgl</td>
			<td>$p[nama_pasien]</td>
			<td>$d[nama_dokter]</td>
			<td>$d1[diagnosa], $d2[diagnosa]</td>";
			echo "<tr>";
			$no++;
			}
    }
    echo "</table>";
	echo "</div>";
	break;
	
  case "cari":
      echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> laporan Rekam Medik</h2><hr>
    </div>
	<form method=POST action='?hal=rekam_medik&act=cari'>
	<td align=right>Pencarian</td><td>: ";
	   combobln1(1,12,'bln',$_POST[bln]);
	echo "<td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span></td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a type='button' name='button' class='art-button' target='_blank' href='./laporanbln.php?id=$_POST[bln]'>Cetak Data</a>
    </span>
	</form>";
    $tampil=mysql_query("SELECT * FROM anamnesis where id_bulan='$_POST[bln]'");
	
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Tanggal</th><th>Nama Pasien</th><th>Kode Dokter</th><th>Diagnosa</th><th>Total Harga</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$p=mysql_fetch_array(mysql_query("SELECT * FROM pasien where no_pasien='$r[no_pasien]'"));
	$d=mysql_fetch_array(mysql_query("SELECT * FROM dokter where kode_dokter='$r[id_dokter]'"));
	$d1=mysql_fetch_array(mysql_query("SELECT * FROM diagnosa where id_diagnosa='$r[id_diagnosa1]'"));
	$d2=mysql_fetch_array(mysql_query("SELECT * FROM diagnosa where id_diagnosa='$r[id_diagnosa2]'"));
if ($p[no_pasien]==$r[no_pasien]){
     $tgl=tgl_indo($r[tanggal]);
     echo "<tr><td align=center>$no</td>
            <td>$tgl</td>
            <td>$p[nama_pasien]</td>
			<td>$d[nama_dokter]</td>
			<td>$d1[diagnosa], $d2[diagnosa]</td>";
            echo "<td><a target='_blank' href='./rekam.php?id=$r[no_pasien]'> Cetak Kartu Rekam Medik</a></td>";
			echo "<tr>";
			$no++;
			}
    }
    echo "</table>";
	echo "</div>";
    break;
	
  }
?>