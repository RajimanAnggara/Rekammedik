<?php
switch($_GET[act]){
  // Tampil obat
  default:
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> Data Obat</h2><hr>
    </div>
	<form method=POST action='home.php?hal=obat&act=cari'>
	<td align=right>Pencarian Kode Obat</td><td>: <input type=text name=cari></td><td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span></td>
	      <span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a href='?hal=obat&act=tambahobat' type='submit' name='Submit' class='art-button'>Tambah Data</a>
    </span>
	      <span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a href='?hal=obat&act=tambahobat' type='submit' name='Submit' class='art-button'>Cetak</a>
    </span></form>
		  ";
    $tampil=mysql_query("SELECT * FROM obat");
	
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>Kode Obat</th><th>Nama Obat</th><th>Satuan</th><th>Keterangan</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$r[kode_obat]</td>
			<td>$r[nama_obat]</td>
			<td>$r[satuan]</td>
			<td>$r[keterangan]</td>
            <td><a href='?hal=obat&act=editobat&id=$r[kode_obat]'> Edit</a> | <a href=./aksi.php?hal=obat&act=hapus&id=$r[kode_obat]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
	
    break;
    	
  case "cari":
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> Data Obat</h2><hr>
    </div>
	<form method=POST action='home.php?hal=obat&act=cari'>
	<td align=right>Pencarian Kode Obat</td><td>: <input type=text name=cari></td><td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span></td>
	      <span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a href='?hal=obat&act=tambahobat' type='button' name='Submit' class='art-button'>Tambah Data</a>
    </span>
	      <span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a href='?hal=obat&act=tambahobat' type='button' name='Submit' class='art-button'>Cetak</a>
    </span></form>
		  ";
    $tampil=mysql_query("SELECT * FROM obat where kode_obat = '$_POST[cari]'");
	
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>Kode Obat</th><th>Nama Obat</th><th>Satuan</th><th>Keterangan</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$r[kode_obat]</td>
			<td>$r[nama_obat]</td>
			<td>$r[satuan]</td>
			<td>$r[keterangan]</td>
            <td><a href='?hal=obat&act=editobat&id=$r[kode_obat]'> Edit</a> | <a href=./aksi.php?hal=obat&act=hapus&id=$r[kode_obat]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
	
    break;
	
  case "tambahobat":
  echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Tambah Data obat</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=obat&act=input'>
	<tr><td align=right>Kode Obat</td><td>: <input type=text name=kode_obat></td></tr>
	<tr><td align=right>Nama Obat</td><td>: <input type=text name=nama_obat size=30></td></tr>
	<tr><td align=right>Satuan</td><td>: <input type=text name=satuan size=20></td></tr>
	<tr><td align=right>Keterangan</td><td>: <input type=text name=keterangan size=50></td></tr>
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
          <tr><th>Kode Obat</th><th>Nama Obat</th><th>Satuan</th><th>Keterangan</th><th>Aksi</th></tr>";
	$tampil=mysql_query("SELECT * FROM obat");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$r[kode_obat]</td>
			<td>$r[nama_obat]</td>
			<td>$r[satuan]</td>
			<td>$r[keterangan]</td>
            <td><a href='?hal=obat&act=editobat&id=$r[kode_obat]'> Edit</a> | <a href=./aksi.php?hal=obat&act=hapus&id=$r[kode_obat]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
    break;
	
  case "editobat":
  $t=mysql_fetch_array(mysql_query("SELECT * FROM obat where kode_obat='$_GET[id]'"));
  echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Edit Data Obat</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=obat&act=update'>
	<input type=hidden name=id value='$t[kode_obat]'>
	<tr><td align=right>Kode Obat</td><td>: <input type=text name=kode_obat value='$t[kode_obat]'></td></tr>
	<tr><td align=right>Nama Obat</td><td>: <input type=text name=nama_obat size=30 value='$t[nama_obat]'></td></tr>
	<tr><td align=right>Satuan</td><td>: <input type=text name=satuan size=20 value='$t[satuan]'></td></tr>
	<tr><td align=right>Keterangan</td><td>: <input type=text name=keterangan size=50 value='$t[keterangan]'></td></tr>
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
          <tr><th>Kode Obat</th><th>Nama Obat</th><th>Satuan</th><th>Keterangan</th><th>Aksi</th></tr>";
	$tampil=mysql_query("SELECT * FROM obat");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
      echo "<tr><td>$r[kode_obat]</td>
			<td>$r[nama_obat]</td>
			<td>$r[satuan]</td>
			<td>$r[keterangan]</td>
            <td><a href='?hal=obat&act=editobat&id=$r[kode_obat]'> Edit</a> | <a href=./aksi.php?hal=obat&act=hapus&id=$r[kode_obat]>Hapus</a></tr>";
			$no++;
    }
	echo "</table>";
	echo "</div>";
  
  break;
  }
?>