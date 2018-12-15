<?php
switch($_GET[act]){
  // Tampil tindakan
  default:
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> Data Tindakan</h2><hr>
    </div>
	<form method=POST action='?hal=tindakan&act=tambahtindakan'>
      <span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Tambah Data' />
    </span></form>";
    $tampil=mysql_query("SELECT * FROM tindakan order by kode_tindakan DESC");
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Kode Tindakan</th><th>Nama Tindakan</th><th>Tanggal</th><th>Biaya Tindakan</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$tgl=tgl_indo($r[tgl_tindakan]);
      echo "<tr><td align=center>$no</td>
            <td>$r[kode_tindakan]</td>
			<td>$r[nama_tindakan]</td>
			<td>$tgl</td>
			<td>$r[nama_tindakan]</td>
            <td><a href='?hal=tindakan&act=edittindakan&id=$r[kode_tindakan]'> Edit</a> | <a href=./aksi.php?hal=tindakan&act=hapus&id=$r[kode_tindakan]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
	
    break;
  case "tambahtindakan":
  echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Tambah Data Tindakan</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=tindakan&act=input'>
	<tr><td align=right>Kode Tindakan</td><td>: <input type=text name=kode_tindakan size=10></tr>
	<tr><td align=right>Nama Tindakan</td><td>: <input type=text name=nama_tindakan size=30></td></tr>
	<tr><td align=right>Tgl Tindakan</td><td>: ";
		combotgl1(1,31,'tgl_tindak',$tgl_skrg);
        combobln1(1,12,'bln_tindak',$bln_sekarang);
        $thn_skrg=date("Y");
        combotgl1(2015,$thn_skrg+1,'thn_tindak',$thn_skrg);
	echo "</td><tr><td align=right>Biaya Tindakan</td><td>: <input type=text name=biaya_tindakan size=10></td></tr>
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
	</table><hr>";
  $tampil=mysql_query("SELECT * FROM tindakan order by kode_tindakan DESC");
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Kode Tindakan</th><th>Nama Tindakan</th><th>Tanggal</th><th>Biaya Tindakan</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$tgl=tgl_indo($r[tgl_tindakan]);
      echo "<tr><td align=center>$no</td>
            <td>$r[kode_tindakan]</td>
			<td>$r[nama_tindakan]</td>
			<td>$tgl</td>
			<td>$r[nama_tindakan]</td>
            <td><a href='?hal=tindakan&act=edittindakan&id=$r[kode_tindakan]'> Edit</a> | <a href=./aksi.php?hal=tindakan&act=hapus&id=$r[kode_tindakan]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
    break;
	
  case "edittindakan":
  $t=mysql_fetch_array(mysql_query("SELECT * FROM tindakan where kode_tindakan='$_GET[id]'"));
  echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Edit Data tindakan</h2>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=tindakan&act=update'>
	<input type=hidden name=id value=$t[kode_tindakan]>
	<tr><td align=right>Kode Tindakan</td><td>: <input type=text name=kode_tindakan size=10 value='$t[kode_tindakan]'></tr>
	<tr><td align=right>Nama Tindakan</td><td>: <input type=text name=nama_tindakan size=30 value='$t[nama_tindakan]'></td></tr>
	<tr><td align=right>Tgl Tindakan</td><td>: ";
		$get_tgl=substr("$t[tgl_tindakan]",8,2);
        combotgl1(1,31,'tgl_tindak',$get_tgl);
        $get_bln=substr("$t[tgl_tindakan]",5,2);
        combobln1(1,12,'bln_tindak',$get_bln);
        $get_thn=substr("$t[tgl_tindakan]",0,4);
        $thn_skrg=date("Y");
        combotgl1(2015,$thn_skrg+1,'thn_tindak',$get_thn);
	echo "</td><tr><td align=right>Biaya Tindakan</td><td>: <input type=text name=biaya_tindakan size=10 value='$t[biaya_tindakan]'></td></tr>
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
	</table><hr>";
	$tampil=mysql_query("SELECT * FROM tindakan order by kode_tindakan DESC");
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Kode Tindakan</th><th>Nama Tindakan</th><th>Tanggal</th><th>Biaya Tindakan</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$tgl=tgl_indo($r[tgl_tindakan]);
      echo "<tr><td align=center>$no</td>
            <td>$r[kode_tindakan]</td>
			<td>$r[nama_tindakan]</td>
			<td>$tgl</td>
			<td>$r[nama_tindakan]</td>
            <td><a href='?hal=tindakan&act=edittindakan&id=$r[kode_tindakan]'> Edit</a> | <a href=./aksi.php?hal=tindakan&act=hapus&id=$r[kode_tindakan]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
  
  break;
  }
?>