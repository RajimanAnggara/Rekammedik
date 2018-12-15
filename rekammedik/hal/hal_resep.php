<?php
switch($_GET[act]){
  // Tampil resep
  default:
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> Data Resep</h2><hr>
    </div>
	<form method=POST action='?hal=resep&act=tambahresep'>
          <span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Tambah Data' />
    </span></form>
		  ";
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Nama Obat</th><th>Jumlah</th><th>Dosis</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM resep order by no_resep DESC");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$t=mysql_fetch_array(mysql_query("SELECT * FROM obat where kode_obat='$r[kode_obat]'"));
	echo "<td>$no</td>
			<td>$t[nama_obat]</td>
			<td>$r[jumlah_item]</td>
			<td>$r[dosis]</td>
            <td><a href='?hal=resep&act=editresep&id=$r[no_resep]'> Edit</a> | <a href=./aksi.php?hal=resep&act=hapus&id=$r[no_resep]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
    break;
  
	case "tambahresep":
	echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Tambah Data Resep</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='home.php?hal=resep&act=cariobat'>
	<tr><td align=right>Kode Obat</td><td>: <input type=text name=kode_obat ></td><td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span></td></tr>
	<tr><td align=right>Nama Obat</td><td colspan=2>: <input type=text name=nama_obat size=40></td></tr>
	<tr><td align=right>Jumlah Obat</td><td>: <input type=text name=jumlah_item size=3></td></tr>
	<tr><td align=right>Dosis</td><td>: <input type=text name=dosis ></td></tr>
	<tr><td colspan=3><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Simpan' />
    </span>
	<span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a class='readon art-button' href='?hal=resep'>Batal</a>
    </span></td></tr>
	</form>
	</table><hr>
	<table border=1>
    <tr><th>No.</th><th>Nama Obat</th><th>Jumlah</th><th>Dosis</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM resep order by no_resep DESC");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$t=mysql_fetch_array(mysql_query("SELECT * FROM obat where kode_obat='$r[kode_obat]'"));
	echo "<td>$no</td>
			<td>$t[nama_obat]</td>
			<td>$r[jumlah_item]</td>
			<td>$r[dosis]</td>
            <td><a href='?hal=resep&act=editresep&id=$r[no_resep]'> Edit</a> | <a href=./aksi.php?hal=resep&act=hapus&id=$r[no_resep]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
    break;
	
	case "cariobat":
	$obat=mysql_query("SELECT * FROM obat where kode_obat='$_POST[kode_obat]'");
	$cekobat=mysql_num_rows($obat);
	if ($cekobat >= 1){
	$r=mysql_fetch_array($obat);
	echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Tambah Data Resep</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=resep&act=input'>
	<tr><td align=right>Kode Obat</td><td>: <input type=text name=kode_obat value='$r[kode_obat]'></td></tr>
	<tr><td align=right>Nama Obat</td><td>: <input type=text name=nama_obat value='$r[nama_obat]' size=40></td></tr>
	<tr><td align=right>Jumlah Obat</td><td>: <input type=text name=jumlah_item size=3></td></tr>
	<tr><td align=right>Dosis</td><td>: <input type=text name=dosis ></td></tr>
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
	} else {
	echo "<h3>Kode obat tidak ditemukan</h3>
		<span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a class='readon art-button' href='?hal=resep&act=tambahresep'>Kembali</a>
    </span>";
	}
	echo "<hr>
	<table border=1>
    <tr><th>No.</th><th>Nama Obat</th><th>Jumlah</th><th>Dosis</th><th>Aksi</th></tr>";
    $tampil=mysql_query("SELECT * FROM resep order by no_resep DESC");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$t=mysql_fetch_array(mysql_query("SELECT * FROM obat where kode_obat='$r[kode_obat]'"));
	echo "<td>$no</td>
			<td>$t[nama_obat]</td>
			<td>$r[jumlah_item]</td>
			<td>$r[dosis]</td>
            <td><a href='?hal=resep&act=editresep&id=$r[no_resep]'> Edit</a> | <a href=./aksi.php?hal=resep&act=hapus&id=$r[no_resep]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
    break;
	
  case "editresep":
  $o=mysql_fetch_array(mysql_query("SELECT * FROM resep where no_resep='$_GET[id]'"));
  $obat=mysql_query("SELECT * FROM obat where kode_obat='$o[kode_obat]'");
	$r=mysql_fetch_array($obat);
	echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Edit Data Resep</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=resep&act=input'>
	<input type=hidden name=id value=$o[no_resep]>
    <tr><td align=right>Kode Obat</td><td>: <input type=text name=kode_obat value='$r[kode_obat]'></td></tr>
	<tr><td align=right>Nama Obat</td><td>: <input type=text name=nama_obat value='$r[nama_obat]' size=40></td></tr>
	<tr><td align=right>Jumlah Obat</td><td>: <input type=text name=jumlah_item size=3 value='$o[jumlah_item]'></td></tr>
	<tr><td align=right>Dosis</td><td>: <input type=text name=dosis value='$o[dosis]'></td></tr>
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
	</table></div>";
  break;
  }
?>