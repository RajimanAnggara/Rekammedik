<?php
switch($_GET[act]){
  // Tampil pasien
  default:
    echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> Data Pasien</h2><hr>
    </div>
	<form method=POST action='home.php?hal=pasien&act=cari'>
	<td align=right>Pencarian Nama</td><td>: <input type=text name=cari></td><td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span></td>
	<span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a href='?hal=pasien&act=tambahpasien' type='submit' name='Submit' class='art-button' >Tambah Data</a>
    </span></form>";
    $tampil=mysqli_query("SELECT * FROM pasien");
	
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Nama Pasien</th><th>Tgl Lahir</th><th>Jenis Kelamin</th><th>Pekerjaan</th><th>Alamat</th><th>Telp</th><th>Status Bantuan</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$tgl=tgl_indo($r[tgl_lahir]);
	if ($r[jenis_kelamin]=='L'){
		$jk='Pria';
	} else {
		$jk='Wanita';
	}
      echo "<tr><td align=center>$no</td>
            <td>$r[nama_pasien]</td>
			<td>$tgl</td>
			<td>$jk</td>
			<td>$r[pekerjaan]</td>
			<td>$r[alamat]</td>
			<td>$r[telepon]</td>
			<td>$r[status_bantuan]</td>
            <td><a href='?hal=pasien&act=editpasien&id=$r[no_pasien]'> Edit</a> | <a href=./aksi.php?hal=pasien&act=hapus&id=$r[no_pasien]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
	
    break;
	
  case "tambahpasien":
  echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Form Pendaftaran Pasien</h2><hr>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=pasien&act=input'>
	<tr><td align=right>Nomor Pasien</td><td>: <input type=text name=no_pasien></td><td align=right>Tgl Lahir</td><td>: ";
		//$get_tgl=substr("$r[tgl_lahir]",8,2);
        combotgl1(1,31,'tgl_lahir',$tgl_skrg);
        //$get_bln=substr("$r[tgl_lahir]",5,2);
        combobln1(1,12,'bln_lahir',$bln_sekarang);
        //$get_thn=substr("$r[tgl_lahir]",0,4);
        $thn_skrg=date("Y");
        combotgl1(1945,$thn_skrg,'thn_lahir',$thn_skrg);
	echo "</td></tr>
	<tr><td align=right>Nama Pasien</td><td>: <input type=text name=nama_pasien></td><td align=right>Jenis Kelamin</td><td>: 
										<input type=radio name='jk' value='L' checked>Pria
                                         <input type=radio name='jk' value='P'>Wanita</td></td></tr>
	<tr><td align=right>Pekerjaan</td><td>: <input type=text name=pekerjaan size=30></td><td align=right>Status Bantuan</td><td>: 
	<select name='status_bantuan'>
            <option value=0 selected>- Pilih Status -</option>";
              echo "<option value='askes'>ASKES</option>
					<option value='jps'>JPS</option>";
    echo "</select>
	</td></tr>
	<tr><td align=right>Alamat</td><td>: <input type=text name=alamat size=40></td></tr>
	<tr><td align=right>Telepon</td><td>: <input type=text name=telepon><br></td></tr>
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
          <tr><th>No.</th><th>Nama Pasien</th><th>Tgl Lahir</th><th>Jenis Kelamin</th><th>Pekerjaan</th><th>Alamat</th><th>Telp</th><th>Status Bantuan</th><th>Aksi</th></tr>";
	$tampil=mysql_query("SELECT * FROM pasien");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$tgl=tgl_indo($r[tgl_lahir]);
	if ($r[jenis_kelamin]=='L'){
		$jk='Pria';
	} else {
		$jk='Wanita';
	}
      echo "<tr><td align=center>$no</td>
            <td>$r[nama_pasien]</td>
			<td>$tgl</td>
			<td>$jk</td>
			<td>$r[pekerjaan]</td>
			<td>$r[alamat]</td>
			<td>$r[telepon]</td>
			<td>$r[status_bantuan]</td>
            <td><a href='?hal=pasien&act=editpasien&id=$r[no_pasien]'> Edit</a> | <a href=./aksi.php?hal=pasien&act=hapus&id=$r[no_pasien]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
    break;
	
  case "cari":
echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'> Data Pasien</h2><hr>
    </div>
	<form method=POST action='home.php?hal=pasien&act=cari'>
	<td align=right>Pencarian Nama</td><td>: <input type=text name=cari></td><td><span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <input type='submit' name='Submit' class='art-button' value='Cari' />
    </span></td>
	<span class='art-button-wrapper'>
      <span class='art-button-l'> </span>
      <span class='art-button-r'> </span>
      <a href='?hal=pasien&act=tambahpasien' type='submit' name='Submit' class='art-button' >Tambah Data</a>
    </span></form>
		  ";
    $tampil=mysql_query("SELECT * FROM pasien where nama_pasien LIKE '%$_POST[cari]%'");
	
	echo "<div class='art-postcontent'><table border=1>
          <tr><th>No.</th><th>Nama Pasien</th><th>Tgl Lahir</th><th>Jenis Kelamin</th><th>Pekerjaan</th><th>Alamat</th><th>Telp</th><th>Status Bantuan</th><th>Aksi</th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$tgl=tgl_indo($r[tgl_lahir]);
	if ($r[jenis_kelamin]=='L'){
		$jk='Pria';
	} else {
		$jk='Wanita';
	}
      echo "<tr><td align=center>$no</td>
            <td>$r[nama_pasien]</td>
			<td>$tgl</td>
			<td>$jk</td>
			<td>$r[pekerjaan]</td>
			<td>$r[alamat]</td>
			<td>$r[telepon]</td>
			<td>$r[status_bantuan]</td>
            <td><a href='?hal=pasien&act=editpasien&id=$r[no_pasien]'> Edit</a> | <a href=./aksi.php?hal=pasien&act=hapus&id=$r[no_pasien]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";    
	break;
	
  case "editpasien":
  $t=mysql_fetch_array(mysql_query("SELECT * FROM pasien where no_pasien='$_GET[id]'"));
  echo "<div class='art-postmetadataheader'>
    <h2 class='art-postheader'>Edit Data Pasien</h2>
    </div><div class='art-postcontent'>
	<table>
	<form method=POST action='aksi.php?hal=pasien&act=update'>
	<input type=hidden name=id value=$t[no_pasien]>
	<tr><td align=right>Nomor Pasien</td><td>: $t[no_pasien]</td><td align=right>Tgl Lahir</td><td>: ";
		$get_tgl=substr("$t[tgl_lahir]",8,2);
        combotgl1(1,31,'tgl_lahir',$get_tgl);
        $get_bln=substr("$t[tgl_lahir]",5,2);
        combobln1(1,12,'bln_lahir',$get_bln);
        $get_thn=substr("$t[tgl_lahir]",0,4);
        $thn_skrg=date("Y");
        combotgl1(1945,$thn_skrg,'thn_lahir',$get_thn);
	echo "</td></tr>
	<tr><td align=right>Nama Pasien</td><td>: <input type=text name=nama_pasien value='$t[nama_pasien]'></td><td align=right>Jenis Kelamin</td><td>: ";
	if ($t[jenis_kelamin]=='L'){
	echo "<input type=radio name='jk' value='L' checked>Pria
          <input type=radio name='jk' value='P'>Wanita";
	} else {
	echo "<input type=radio name='jk' value='L'>Pria
          <input type=radio name='jk' value='P' checked>Wanita";
	}	  
	echo "</td></td></tr>
	<tr><td align=right>Pekerjaan</td><td>: <input type=text name=pekerjaan size=30 value='$t[pekerjaan]'></td><td align=right>Status Bantuan</td><td>: 
	<select name='status_bantuan'>
            <option value=0 selected>- Pilih Status -</option>";
              echo "<option value='askes'>ASKES</option>
					<option value='jps'>JPS</option>";
    echo "</select>
	</td></tr>
	<tr><td align=right>Alamat</td><td>: <input type=text name=alamat size=40 value='$t[alamat]'></td></tr>
	<tr><td align=right>Telepon</td><td>: <input type=text name=telepon value='$t[telepon]'><br></td></tr>
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
          <tr><th>No.</th><th>Nama Pasien</th><th>Tgl Lahir</th><th>Jenis Kelamin</th><th>Pekerjaan</th><th>Alamat</th><th>Telp</th><th>Status Bantuan</th><th>Aksi</th></tr>";
	$tampil=mysql_query("SELECT * FROM pasien");
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$tgl=tgl_indo($r[tgl_lahir]);
	if ($r[jenis_kelamin]=='L'){
		$jk='Pria';
	} else {
		$jk='Wanita';
	}
      echo "<tr><td align=center>$no</td>
            <td>$r[nama_pasien]</td>
			<td>$tgl</td>
			<td>$jk</td>
			<td>$r[pekerjaan]</td>
			<td>$r[alamat]</td>
			<td>$r[telepon]</td>
			<td>$r[status_bantuan]</td>
            <td><a href='?hal=pasien&act=editpasien&id=$r[no_pasien]'> Edit</a> | <a href=./aksi.php?hal=pasien&act=hapus&id=$r[no_pasien]>Hapus</a></tr>";
			$no++;
    }
    echo "</table>";
	echo "</div>";
  
  break;
  }
?>