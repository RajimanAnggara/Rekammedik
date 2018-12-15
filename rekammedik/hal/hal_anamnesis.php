<?php
switch($_GET[act]){
  // Tampil anamnesis
  default:
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> Data Anamnesis</h2><hr>
    </div>
	<form method=POST action='home.php?hal=anamnesis&act=cari'>
	<td align=right>Pencarian Kode</td><td>: <input type=text name=cari></td><td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span>	
          <span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a href='?hal=anamnesis&act=tambahanamnesis' type='submit' name='Submit' class='art-button'>Tambah Data</a>
    </span></form>
		  ";
    $tampil=mysql_query("SELECT * FROM anamnesis order by no_anamnesis DESC");
	
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Nama Pasien</th><th>Tgl Lahir</th><th>Partus Terakhir</th><th>Golongan Darah</th><th>Keluhan</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$n=mysql_fetch_array(mysql_query("SELECT * FROM pasien where no_pasien='$r[no_pasien]'"));
	$tgl=tgl_indo($n[tgl_lahir]);
      echo "<tr><td align=center>$no</td>
            <td>$n[nama_pasien]</td>
			<td>$tgl</td>
			<td>$r[pertus_terakhir]</td>
			<td>$r[golongan_darah]</td>
			<td>$r[keluhan]</td>
			<td><a href='?hal=anamnesis&act=editanamnesis&id=$r[no_anamnesis]'> Edit</a> | <a href=./aksi.php?hal=anamnesis&act=hapus&id=$r[no_anamnesis]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
	
    break;
	
  case "caripasien":
      $pasien=mysql_query("SELECT * FROM pasien where no_pasien='$_POST[cari]'");
	  $ketemu=mysql_num_rows($pasien);
		if ($ketemu==0){
			echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Tambah Data Anamnesis</h2><hr>
    </div><div class='art-postcontent'>
	<span class='style1'>Kode Pasien tidak ditemukan</span>
	<form method=POST action='home.php?hal=anamnesis&act=caripasien'>
	<td align=right>Pencarian Pasien</td><td>: <input type=text name=cari></td><td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span></form>
	<table>
	<tr><td align=right>No Anamnesis</td><td>: <input type=text name=no_registrasi size=20></td><td align=right>	Rujukan</td><td>: <input type=text name=telepon></td></tr>
	<tr><td align=right>GPA</td><td>: <input type=text name=pekerjaan size=20></td><td align=right>Golongan Darah</td><td>: <input type=text name=gol_darah size=3></td></tr>
	<tr><td align=right>Partus Terakhir</td><td>: <input type=text name=pekerjaan size=30></td><td align=right>Keluhan</td><td>: <input type=text name=keluhan size=35></td></tr>
	<tr><td align=right>Terapi</td><td>: <input type=text name=pekerjaan size=34></td><td align=right>Abosrtus Terakhir</td><td>: <input type=text name=telepon></tr>
	<tr><td align=right>HPHT</td><td>: <input type=text name=telepon></tr>
	<tr><td colspan=3><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Simpan' />
    </span>
	<span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a class='readon art-button' onclick=self.history.back()>Batal</a>
    </span></td></tr>
	</form>
	</table>";
  echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Nama Pasien</th><th>Tgl Lahir</th><th>Partus Terakhir</th><th>Golongan Darah</th><th>Keluhan</th><th>Aksi</th></tr>";
	$no=1;
    $tampil=mysql_query("SELECT * FROM anamnesis order by no_anamnesis DESC");
    while ($r=mysql_fetch_array($tampil)){
	$n=mysql_fetch_array(mysql_query("SELECT * FROM pasien where no_pasien='$r[no_pasien]'"));
	$tgl=tgl_indo($n[tgl_lahir]);
      echo "<tr><td align=center>$no</td>
            <td>$n[nama_pasien]</td>
			<td>$tgl</td>
			<td>$r[pertus_terakhir]</td>
			<td>$r[golongan_darah]</td>
			<td>$r[keluhan]</td>
			<td><a href='?hal=anamnesis&act=editanamnesis&id=$r[no_anamnesis]'> Edit</a> | <a href=./aksi.php?hal=anamnesis&act=hapus&id=$r[no_anamnesis]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
  
		} else {
	$n=mysql_fetch_array(mysql_query("SELECT * FROM pasien where no_pasien='$_POST[cari]'"));
			echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Tambah Data Anamnesis</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='./aksi.php?hal=anamnesis&act=input'>
	<tr><td align=right>No Pasien</td><td>: <input type=text name=no_pasien size=20 value='$n[no_pasien]'></td><td align=right>Diagnosa 1</td><td>: 
	<select name='id_diagnosa1'>
            <option value='' selected>- Pilih Diagnosa -</option>";
            $tampil=mysql_query("SELECT * FROM diagnosa");
            while($j=mysql_fetch_array($tampil)){
              echo "<option value=$j[id_diagnosa]>$j[diagnosa]</option>";
            }
    echo "</select>
	</td></tr>
	<tr><td align=right>Nama Pasien</td><td>: <input type=text name=nama_pasien size=20 value='$n[nama_pasien]'></td><td align=right>Diagnosa 2</td><td>: 
	<select name='id_diagnosa2'>
            <option value='' selected>- Pilih Diagnosa -</option>";
            $tampil=mysql_query("SELECT * FROM diagnosa");
            while($k=mysql_fetch_array($tampil)){
              echo "<option value=$k[id_diagnosa]>$k[diagnosa]</option>";
            }
    echo "</select>
	</td></tr>
	<tr><td align=right>GPA</td><td>: <input type=text name=gpa size=20></td><td align=right>Golongan Darah</td><td>: <input type=text name=golongan_darah size=3></td></tr>
	<tr><td align=right>Partus Terakhir</td><td>: <input type=text name=pertus_terakhir size=30></td><td align=right>Keluhan</td><td>: <input type=text name=keluhan size=35></td></tr>
	<tr><td align=right>Terapi</td><td>: <input type=text name=terapi size=34></td><td align=right>Abosrtus Terakhir</td><td>: <input type=text name=abostrus_terakhir></tr>
	<tr><td align=right>HPHT</td><td>: <input type=text name=hpht><td align=right>Rujukan</td><td>: <input type=text name=rujukan></td></tr>
	<tr></td><td align=right>Dokter</td><td>: 
	<select name='kode_dokter'>
            <option value='' selected>- Pilih Dokter -</option>";
            $tampil=mysql_query("SELECT * FROM dokter");
            while($l=mysql_fetch_array($tampil)){
              echo "<option value=$l[kode_dokter]>$l[nama_dokter]</option>";
            }
    echo "</select>
	</td></tr><tr><td colspan=3><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Simpan' />
    </span>
	<span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a class='readon art-button' onclick=self.history.back()>Batal</a>
    </span></td></tr>
	</form>
	</table>
	<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Nama Pasien</th><th>Tgl Lahir</th><th>Partus Terakhir</th><th>Golongan Darah</th><th>Keluhan</th><th>Aksi</th></tr>";
	$no=1;
    $tampil=mysql_query("SELECT * FROM anamnesis order by no_anamnesis DESC");
    while ($r=mysql_fetch_array($tampil)){
	$n=mysql_fetch_array(mysql_query("SELECT * FROM pasien where no_pasien='$r[no_pasien]'"));
	$tgl=tgl_indo($n[tgl_lahir]);
      echo "<tr><td align=center>$no</td>
            <td>$n[nama_pasien]</td>
			<td>$tgl</td>
			<td>$r[pertus_terakhir]</td>
			<td>$r[golongan_darah]</td>
			<td>$r[keluhan]</td>
			<td><a href='?hal=anamnesis&act=editanamnesis&id=$r[no_anamnesis]'> Edit</a> | <a href=./aksi.php?hal=anamnesis&act=hapus&id=$r[no_anamnesis]>Hapus</a></tr>";
			$no++;
		}
    echo "</table>";
	echo "</div>";
		}
	  break;
	  
  case "tambahanamnesis":
  echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Tambah Data Anamnesis</h2><hr>
    </div><div class='art-postcontent'>
	
	<form method=POST action='home.php?hal=anamnesis&act=caripasien'>
	<td align=right>Pencarian Pasien</td><td>: <input type=text name=cari></td><td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span></form>
	<table>
	<tr><td align=right>No Anamnesis</td><td>: <input type=text name=no_registrasi size=20></td><td align=right>	Rujukan</td><td>: <input type=text name=telepon></td></tr>
	<tr><td align=right>GPA</td><td>: <input type=text name=pekerjaan size=20></td><td align=right>Golongan Darah</td><td>: <input type=text name=gol_darah size=3></td></tr>
	<tr><td align=right>Partus Terakhir</td><td>: <input type=text name=pekerjaan size=30></td><td align=right>Keluhan</td><td>: <input type=text name=keluhan size=35></td></tr>
	<tr><td align=right>Terapi</td><td>: <input type=text name=pekerjaan size=34></td><td align=right>Abosrtus Terakhir</td><td>: <input type=text name=telepon></tr>
	<tr><td align=right>HPHT</td><td>: <input type=text name=telepon></tr>
	<tr><td colspan=3><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Simpan' />
    </span>
	<span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a class='readon art-button' onclick=self.history.back()>Batal</a>
    </span></td></tr>
	</form>
	</table>
	<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Nama Pasien</th><th>Tgl Lahir</th><th>Partus Terakhir</th><th>Golongan Darah</th><th>Keluhan</th><th>Aksi</th></tr>";
	$no=1;
    $tampil=mysql_query("SELECT * FROM anamnesis order by no_anamnesis DESC");
    while ($r=mysql_fetch_array($tampil)){
	$n=mysql_fetch_array(mysql_query("SELECT * FROM pasien where no_pasien='$r[no_pasien]'"));
	$tgl=tgl_indo($n[tgl_lahir]);
      echo "<tr><td align=center>$no</td>
            <td>$n[nama_pasien]</td>
			<td>$tgl</td>
			<td>$r[pertus_terakhir]</td>
			<td>$r[golongan_darah]</td>
			<td>$r[keluhan]</td>
			<td><a href='?hal=anamnesis&act=editanamnesis&id=$r[no_anamnesis]'> Edit</a> | <a href=./aksi.php?hal=anamnesis&act=hapus&id=$r[no_anamnesis]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
    break;
	
  case "editanamnesis":
  $t=mysql_fetch_array(mysql_query("SELECT * FROM anamnesis where no_anamnesis='$_GET[id]'"));
  $n=mysql_fetch_array(mysql_query("SELECT * FROM pasien where no_pasien='$t[no_pasien]'"));
  		echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Tambah Data Anamnesis</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='./aksi.php?hal=anamnesis&act=update'>
	<input type=hidden name=id value=$t[no_anamnesis]>
	<input type=hidden name=no_pasien value=$t[no_pasien]>
	<tr><td align=right>No Pasien</td><td>: $n[no_pasien]</td>
	<td align=right>Diagnosa 1</td><td>: 
	<select name='id_diagnosa1'>";
          $diagnosa1=mysql_query("SELECT * FROM diagnosa");
          if ($t[id_diagnosa1]==0){
            echo "<option value=0 selected>- Pilih Diagnosa -</option>";
          }   
          while($d=mysql_fetch_array($diagnosa1)){
            if ($t[id_diagnosa1]==$d[id_diagnosa]){
              echo "<option value=$d[id_diagnosa] selected>$d[diagnosa]</option>";
            }
            else{
              echo "<option value=$d[id_diagnosa]>$d[diagnosa]</option>";
            }
          }
    echo "</select></td>
	</tr>
	<tr><td align=right>Nama Pasien</td><td>: $n[nama_pasien]</td><td align=right>Diagnosa 2</td><td>: 
	<select name='id_diagnosa2'>";
          $diagnosa1=mysql_query("SELECT * FROM diagnosa");
          if ($t[id_diagnosa2]==0){
            echo "<option value=0 selected>- Pilih Diagnosa -</option>";
          }   
          while($d=mysql_fetch_array($diagnosa1)){
            if ($t[id_diagnosa2]==$d[id_diagnosa]){
              echo "<option value=$d[id_diagnosa] selected>$d[diagnosa]</option>";
            }
            else{
              echo "<option value=$d[id_diagnosa]>$d[diagnosa]</option>";
            }
          }
    echo "</select></td></tr>
	<tr><td align=right>GPA</td><td>: <input type=text name=gpa size=20 value=$t[gpa]></td><td align=right>Golongan Darah</td><td>: <input type=text name='golongan_darah' size=3 value='$t[golongan_darah]'></td></tr>
	<tr><td align=right>Partus Terakhir</td><td>: <input type=text name='pertus_terakhir' size=30 value='$t[pertus_terakhir]'></td><td align=right>Keluhan</td><td>: <input type=text name='keluhan' size=35 value='$t[keluhan]'></td></tr>
	<tr><td align=right>Terapi</td><td>: <input type=text name='terapi' size=34 value='$t[terapi]'></td><td align=right>Abosrtus Terakhir</td><td>: <input type=text name='abostrus_terakhir' value='$t[abosrtus_terakhir]'></tr>
	<tr><td align=right>HPHT</td><td>: <input type=text name='hpht' value='$t[hpht]'><td align=right>Rujukan</td><td>: <input type=text name='rujukan' value='$t[rujukan]'></td></tr>
	<tr><td align=right>Dokter</td><td>: 
	<select name='id_dokter'>";
          $dokter=mysql_query("SELECT * FROM dokter");
          if ($k[kode_dokter]==0){
            echo "<option value=0 selected>- Pilih Dokter -</option>";
          }   
          while($k=mysql_fetch_array($dokter)){
            if ($t[id_dokter]==$k[kode_dokter]){
              echo "<option value=$k[kode_dokter] selected>$k[nama_dokter]</option>";
            }
            else{
              echo "<option value=$k[kode_dokter]>$k[nama_dokter]</option>";
            }
          }
    echo "</select></td></tr>
	<tr><td colspan=3><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Simpan' />
    </span>
	<span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a class='readon art-button' onclick=self.history.back()>Batal</a>
    </span></td></tr>
	</form>
	</table><hr>
	<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Nama Pasien</th><th>Tgl Lahir</th><th>Partus Terakhir</th><th>Golongan Darah</th><th>Keluhan</th><th>Aksi</th></tr>";
	$no=1;
    $tampil=mysql_query("SELECT * FROM anamnesis order by no_anamnesis DESC");
    while ($r=mysql_fetch_array($tampil)){
	$n=mysql_fetch_array(mysql_query("SELECT * FROM pasien where no_pasien='$r[no_pasien]'"));
	$tgl=tgl_indo($n[tgl_lahir]);
      echo "<tr><td align=center>$no</td>
            <td>$n[nama_pasien]</td>
			<td>$tgl</td>
			<td>$r[pertus_terakhir]</td>
			<td>$r[golongan_darah]</td>
			<td>$r[keluhan]</td>
			<td><a href='?hal=anamnesis&act=editanamnesis&id=$r[no_anamnesis]'> Edit</a> | <a href=./aksi.php?hal=anamnesis&act=hapus&id=$r[no_anamnesis]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
  break;
  }
?>