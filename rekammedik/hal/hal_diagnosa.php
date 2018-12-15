<?php
switch($_GET[act]){
  // Tampil diagnosa
  default:
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> Data Diagnosa</h2><hr>
    </div>
	<table>
	<tr>
	<td>
	<form method=POST action='home.php?hal=diagnosa&act=cari'>
	<td align=right>Pencarian</td><td>: <input type=text name=cari></td><td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span>	
          <span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a href='?hal=diagnosa&act=tambahdiagnosa' type='submit' name='Submit' class='art-button' >Tambah Data</a>
    </span>
	</form>
	</td>
	</tr>
	</table>";
    $tampil=mysql_query("SELECT * FROM diagnosa");
	
	echo "<div class='art-postcontent'><hr><table border=1>
          <tr><th>No.</th><th>Diagnosa</th><th>Kode</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	  echo "<tr><td align=center>$no</td>
    		<td>$r[diagnosa]</td>
    		<td>$r[kode]</td>
            <td><a href='?hal=diagnosa&act=editdiagnosa&id=$r[id_diagnosa]'> Edit</a> | <a href=./aksi.php?hal=diagnosa&act=hapus&id=$r[id_diagnosa]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";

	echo "</div>";
    break;
	
  case "tambahdiagnosa":
  echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Tambah Data Diagnosa</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=diagnosa&act=input'>
	<tr><td align=right>Diagnosa</td><td>: <input type=text name=diagnosa size=60></</td></tr>
	<tr><td align=right>Kode Diagnosa</td><td>: <input type=text name=kode ></</td></tr>
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
	<table>
	<tr>
	<form method=POST action='home.php?hal=obat&act=cari'>
	<td align=right>Pencarian</td><td>: <input type=text name=cari></td><td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span></td>
	</form>
	<td>
	</tr>
	</table>
  <table border=1>
          <tr><th>No.</th><th>Diagnosa</th><th>Kode</th><th>Aksi</th></tr>";
		  $tampil=mysql_query("SELECT * FROM diagnosa");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	  echo "<tr><td align=center>$no</td>
			<td>$r[diagnosa]</td>
			<td>$r[kode]</td>
            <td><a href='?hal=diagnosa&act=editdiagnosa&id=$r[id_diagnosa]'> Edit</a> | <a href=./aksi.php?hal=diagnosa&act=hapus&id=$r[id_diagnosa]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
    break;
	
  case "cari":
      echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> Data Diagnosa</h2><hr>
    </div>
	<table>
	<tr>
	<td>
	<form method=POST action='home.php?hal=diagnosa&act=cari'>
	<td align=right>Pencarian</td><td>: <input type=text name=cari></td><td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span>	
          <span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a href='?hal=diagnosa&act=tambahdiagnosa' type='submit' name='Submit' class='art-button' >Tambah Data</a>
    </span>
	</form>
	</td>
	</tr>
	</table>";
    $tampil=mysql_query("SELECT * FROM diagnosa where diagnosa LIKE '%$_POST[cari]%'");
	
	echo "<div class='art-postcontent'><hr><table border=1>
          <tr><th>No.</th><th>Diagnosa</th><th>Kode</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	  echo "<tr><td align=center>$no</td>
    		<td>$r[diagnosa]</td>
    		<td>$r[kode]</td>
            <td><a href='?hal=diagnosa&act=editdiagnosa&id=$r[id_diagnosa]'> Edit</a> | <a href=./aksi.php?hal=diagnosa&act=hapus&id=$r[id_diagnosa]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";

	echo "</div>";

      break;
	
  case "editdiagnosa":
  $t=mysql_fetch_array(mysql_query("SELECT * FROM diagnosa where id_diagnosa='$_GET[id]'"));
  echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Edit Data diagnosa</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=diagnosa&act=update'>
	<input type=hidden name=id value=$t[id_diagnosa]>
	<tr><td align=right>Diagnosa</td><td>: <input type=text name=diagnosa size=60 value='$t[diagnosa]'></</td></tr>
	<tr><td align=right>Kode Diagnosa</td><td>: <input type=text name=kode value='$t[kode]'></td></tr>
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
	<table>
	<tr>
	<form method=POST action='home.php?hal=diagnosa&act=cari'>
	<td align=right>Pencarian</td><td>: <input type=text name=cari></td><td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span></td>
	</form>
	<td>
		<form method=POST action='?hal=diagnosa&act=tambahdiagnosa'>
          <span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Tambah Data' />
    </span></form>
	</td>
	</tr>
	</table>
  <table border=1>
          <tr><th>No.</th><th>Diagnosa</th><th>Kode Diagnosa</th><th>Aksi</th></tr>";
		  $tampil=mysql_query("SELECT * FROM diagnosa");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	  echo "<tr><td align=center>$no</td>
			<td>$r[diagnosa]</td>
			<td>$r[kode]</td>
            <td><a href='?hal=diagnosa&act=editdiagnosa&id=$r[id_diagnosa]'> Edit</a> | <a href=./aksi.php?hal=diagnosa&act=hapus&id=$r[id_diagnosa]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
  
  break;
  }
?>