<?php
switch($_GET[act]){
  // Tampil pasien
  default:
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> Data Rawat Jalan</h2><hr>
    </div>
	<form method=POST action='?hal=rawat_jalan&act=tambahrawat'>
          <span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Tambah Data' />
    </span></form>
		  ";
    $tampil=mysql_query("SELECT * FROM rawat_jalan order by id_rawat_jalan DESC");
	
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Diagnosa</th><th>Terapi</th><th>No. Resep</th><th>Kode Tindakan</th><th>Nama Dokter</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$d=mysql_fetch_array(mysql_query("SELECT * FROM dokter where kode_dokter='$r[kode_dokter]'"));
	  echo "<tr><td align=center>$no</td>
            <td>$r[diagnosa]</td>
			<td>$r[terapi]</td>
			<td>$r[no_resep]</td>
			<td>$r[kode_tindakan]</td>
			<td>$d[nama_dokter]</td>
            <td><a href='?hal=rawat_jalan&act=editrawat&id=$r[id_rawat_jalan]'> Edit</a> | <a href=./aksi.php?hal=rawat_jalan&act=hapus&id=$r[id_rawat_jalan]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
	
    break;
  case "tambahrawat":
  echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Tambah Data Rawat Jalan</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=rawat_jalan&act=input'>
	<tr><td align=right>No Anamnesis</td><td>: <input type=text name=no_anamnesis></td><td align=right>Kode Tindakan</td><td>: <select name='kode_tindakan'>
            <option value=0 selected>- Pilih Tindakan -</option>";
            $tindak=mysql_query("SELECT * FROM tindakan ORDER BY nama_tindakan");
            while($t=mysql_fetch_array($tindak)){
              echo "<option value=$t[kode_tindakan]>$t[nama_tindakan]</option>";
            }
    echo "</select></td></tr>
	<tr><td align=right>Diagnosa</td><td>: <input type=text name=diagnosa size=50></td><td align=right>Nama Dokter</td><td>: 
	<select name='kode_dokter'>
            <option value=0 selected>- Pilih Dokter -</option>";
            $tampil=mysql_query("SELECT * FROM dokter ORDER BY nama_dokter");
            while($j=mysql_fetch_array($tampil)){
              echo "<option value=$j[kode_dokter]>$j[nama_dokter]</option>";
            }
    echo "</select>
		  </td></tr>
	<tr><td align=right>Terapi</td><td>: <input type=text name=terapi ></td></tr>
	<tr><td align=right>No. Resep</td><td>: <input type=text name=no_resep >
		  <br></td></tr>
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
	<table border=1>
          <tr><th>No.</th><th>Diagnosa</th><th>Terapi</th><th>No. Resep</th><th>Kode Tindakan</th><th>Nama Dokter</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM rawat_jalan order by id_rawat_jalan DESC");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$d=mysql_fetch_array(mysql_query("SELECT * FROM dokter where kode_dokter='$r[kode_dokter]'"));
	  echo "<tr><td align=center>$no</td>
            <td>$r[diagnosa]</td>
			<td>$r[terapi]</td>
			<td>$r[no_resep]</td>
			<td>$r[kode_tindakan]</td>
			<td>$d[nama_dokter]</td>
            <td><a href='?hal=rawat_jalan&act=editrawat&id=$r[id_rawat_jalan]'> Edit</a> | <a href=./aksi.php?hal=rawat_jalan&act=hapus&id=$r[id_rawat_jalan]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
    break;
	
  case "editrawat":
  $w=mysql_fetch_array(mysql_query("SELECT * FROM rawat_jalan where id_rawat_jalan='$_GET[id]'"));
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Edit Data Rawat Jalan</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=rawat_jalan&act=update'>
	<input type=hidden name=id value='$w[id_rawat_jalan]'>
	<tr><td align=right>No Anamnesis</td><td>: <input type=text name=no_anamnesis value='$w[no_anamnesis]'></td><td align=right>Kode Tindakan</td><td>: <select name='kode_tindakan'>
            <option value=0 selected>- Pilih Tindakan -</option>";
            $tindak=mysql_query("SELECT * FROM tindakan ORDER BY nama_tindakan");
            while($t=mysql_fetch_array($tindak)){
              echo "<option value=$t[kode_tindakan]>$t[nama_tindakan]</option>";
            }
    echo "</select></td></tr>
	<tr><td align=right>Diagnosa</td><td>: <input type=text name=diagnosa size=50 value='$w[diagnosa]'></td><td align=right>Nama Dokter</td><td>: 
	<select name='kode_dokter'>
            <option value=0 selected>- Pilih Dokter -</option>";
            $tampil=mysql_query("SELECT * FROM dokter ORDER BY nama_dokter");
            while($j=mysql_fetch_array($tampil)){
              echo "<option value=$j[kode_dokter]>$j[nama_dokter]</option>";
            }
    echo "</select>
		  </td></tr>
	<tr><td align=right>Terapi</td><td>: <input type=text name=terapi value='$w[terapi]'></td></tr>
	<tr><td align=right>No. Resep</td><td>: <input type=text name=no_resep value='$w[no_resep]'>
		  <br></td></tr>
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
	<table border=1>
          <tr><th>No.</th><th>Diagnosa</th><th>Terapi</th><th>No. Resep</th><th>Kode Tindakan</th><th>Nama Dokter</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM rawat_jalan order by id_rawat_jalan DESC");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$d=mysql_fetch_array(mysql_query("SELECT * FROM dokter where kode_dokter='$r[kode_dokter]'"));
	  echo "<tr><td align=center>$no</td>
            <td>$r[diagnosa]</td>
			<td>$r[terapi]</td>
			<td>$r[no_resep]</td>
			<td>$r[kode_tindakan]</td>
			<td>$d[nama_dokter]</td>
            <td><a href='?hal=rawat_jalan&act=editrawat&id=$r[id_rawat_jalan]'> Edit</a> | <a href=./aksi.php?hal=rawat_jalan&act=hapus&id=$r[id_rawat_jalan]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
  
  break;
  }
?>