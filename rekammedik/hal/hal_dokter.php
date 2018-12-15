<?php
switch($_GET[act]){
  // Tampil dokter
  default:
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> Data Dokter</h2><hr>
    </div>
	<form method=POST action='?hal=dokter&act=tambahdokter'>
          <span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Tambah Data' />
    </span></form>
		  ";
    $tampil=mysql_query("SELECT * FROM dokter order by nama_dokter ASC");
	
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Nama Dokter</th><th>Alamat</th><th>Tlp.</th><th>Jabatan</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	echo "<tr><td align=center>$no</td>
            <td>$r[nama_dokter]</td>
			<td>$r[alamat]</td>
			<td>$r[no_telpon_d]</td>
			<td>$r[jabatan]</td>
			<td><a href='?hal=dokter&act=editdokter&id=$r[kode_dokter]'> Edit</a> | <a href=./aksi.php?hal=dokter&act=hapus&id=$r[kode_dokter]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
	
    break;
  case "tambahdokter":
  echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Tambah Data Dokter</h2>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=dokter&act=input'>
	<tr><td align=right>Kode Dokter</td><td>: <input type=text name=kode_dokter></td></tr>
	<tr><td align=right>Nama</td><td>: <input type=text name=nama_dokter size=30></td></tr>
	<tr><td align=right>Alamat</td><td>: <input type=text name=alamat size=50></td></tr>
	<tr><td align=right>Telpon</td><td>: <input type=text name=no_telpon_d></td></tr>
	<tr><td align=right>Jabatan</td><td>: <input type=text name=jabatan></td></tr>
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
          <tr><th>No.</th><th>Nama Dokter</th><th>Alamat</th><th>Tlp.</th><th>Jabatan</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM dokter order by nama_dokter ASC");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	echo "<tr><td align=center>$no</td>
            <td>$r[nama_dokter]</td>
			<td>$r[alamat]</td>
			<td>$r[no_telpon_d]</td>
			<td>$r[jabatan]</td>
			<td><a href='?hal=dokter&act=editdokter&id=$r[kode_dokter]'> Edit</a> | <a href=./aksi.php?hal=dokter&act=hapus&id=$r[kode_dokter]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
    break;
	
  case "editdokter":
  $t=mysql_fetch_array(mysql_query("SELECT * FROM dokter where kode_dokter='$_GET[id]'"));
  echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Edit Data dokter</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=dokter&act=update'>
	<input type=hidden name=id value=$t[kode_dokter]>
	<tr><td align=right>Kode Dokter</td><td>: <input type=text name=kode_dokter value='$t[kode_dokter]'></td></tr>
	<tr><td align=right>Nama</td><td>: <input type=text name=nama_dokter size=30 value='$t[nama_dokter]'></td></tr>
	<tr><td align=right>Alamat</td><td>: <input type=text name=alamat size=50 value='$t[alamat]'></td></tr>
	<tr><td align=right>Telpon</td><td>: <input type=text name=no_telpon_d value='$t[no_telpon_d]'></td></tr>
	<tr><td align=right>Jabatan</td><td>: <input type=text name=jabatan value='$t[jabatan]'></td></tr>
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
          <tr><th>No.</th><th>Nama Dokter</th><th>Alamat</th><th>Tlp.</th><th>Jabatan</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM dokter order by nama_dokter ASC");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	echo "<tr><td align=center>$no</td>
            <td>$r[nama_dokter]</td>
			<td>$r[alamat]</td>
			<td>$r[no_telpon_d]</td>
			<td>$r[jabatan]</td>
			<td><a href='?hal=dokter&act=editdokter&id=$r[kode_dokter]'> Edit</a> | <a href=./aksi.php?hal=dokter&act=hapus&id=$r[kode_dokter]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";	echo "</div>";
  
  break;
  }
?>