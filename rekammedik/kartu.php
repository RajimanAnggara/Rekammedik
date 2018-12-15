<?php
error_reporting(0);
include "konfig/koneksi.php";
include "konfig/library.php";
$b=mysql_fetch_array(mysql_query("select * from pasien where no_pasien='$_GET[id]'"));

?>
<html>
<head>
<title>Print Kartu Pasien</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
body {
	background-image: url(file:///D|/proyek web/web smk kes/smkkes/image/background.jpg);
	background-repeat:no-repeat;
	background-position:top;
	font-family:"Courier New", Courier, monospace;
	font-weight:bold;
}
.style12 {
	font-size: 18px;
	font-weight: bold;
}
.style14 {
	font-size: 12px;
	font-weight: bold;
	font-family: "Times New Roman", Times, serif;
}
.style15 {
	font-size: 10px;
	font-style: italic;
	font-family: "Times New Roman", Times, serif;
}
.style16 {font-family: "Times New Roman", Times, serif}
.style17 {font-weight: bold; font-size: 12px;}
.style19 {font-family: "Times New Roman", Times, serif; font-size: 16px; }
.style21 {font-size: 14px; font-weight: bold; }
.style23 {font-family: "Times New Roman", Times, serif; font-size: 12px; }
.style24 {font-size: 12px}
-->
</style>
</head>
<body onLoad="javascript:window.print()">
<table width="516" border="0">
  <tr>
    <td width="72" height="71" rowspan="2"><img src="images/lotengputih.png" width="67" height="69" /></td>
    <td width="434" height="50"><p align="center"><span class="style14">SISTEM INFORMASI REKAM MEDIK PASIEN RAWAT JALAN</span><span class="style16"><br>
      <span class="style12">UPT PUSKESMAS AIKMUAL </span><br />
    </span><br>
    </p>
    </td>
  <tr><td colspan="3"><div align="center"><span class="style15">Alamat: Jalan Raya Praya - Mantang Kecamatan Praya Lombok Tengah </span></div></td></tr>
  </tr><tr><td colspan="3"><hr></td></tr>
  </tr><tr><td colspan="3"><div align="center" class="style19"><span class="style12">KARTU PASIEN </span></div></td>
  </tr><tr><td colspan="3"><hr></td></tr>
</table>
<table>
  <tr>
    <td width="14"></td>
    <td width="105"><span class="style23">Nomor Pasien </span></td>
    <td width="135"><span class="style23">: <?php echo "$b[no_pasien]"; ?>
	</span></td>
	<td width="10"></td>
    <td width="94"><span class="style23">Jenis Kelamin </span></td>
    <td width="129"><span class="style23">: <?php
	if ($b[jenis_kelamin]=='L'){
	 echo "Pria";
	 } else {
	 echo "Wanita";
	 }
	 ?>
	</span></td>
  </tr>
  <tr>
    <td></td>
    <td><span class="style23">Nama</span></td>
    <td><span class="style23">: <?php echo "$b[nama_pasien]"; ?></span></td>
	<td width="10"></td>
    <td width="94"><span class="style23">Nomor Telepon </span></td>
    <td width="129"><span class="style23">: <?php echo "$b[telepon]"; ?>
	</span></td>
  </tr>
  <tr>
    <td></td>
    <td><span class="style23">Alamat</span></td>
    <td><span class="style23">: <?php echo "$b[alamat]"; ?></span></td>
  </tr>
  </tr><tr><td colspan="6"><hr></td></tr>
</table>
<table>
<?php
	$tampil=mysql_query("SELECT * FROM anamnesis where no_pasien='$_GET[id]'");
	echo "<div class='art-postcontent'><table border=1>
          <tr><th><span class=style23>No.</span></th><th><span class=style23>Nama Pasien</span></th><th><span class=style23>Kode Dokter</span></th><th><span class=style23>Diagnosa</span></th></tr>";
	$no=1;
    while ($r=mysql_fetch_array($tampil)){
	$p=mysql_fetch_array(mysql_query("SELECT * FROM pasien where no_pasien='$r[no_pasien]'"));
	$d=mysql_fetch_array(mysql_query("SELECT * FROM dokter where kode_dokter='$r[id_dokter]'"));
	$d1=mysql_fetch_array(mysql_query("SELECT * FROM diagnosa where id_diagnosa='$r[id_diagnosa1]'"));
	$d2=mysql_fetch_array(mysql_query("SELECT * FROM diagnosa where id_diagnosa='$r[id_diagnosa2]'"));
if ($p[no_pasien]==$r[no_pasien]){
      echo "<tr><td align=center><span class=style23>$no</span></td>
            <td><span class=style23>$p[nama_pasien]</span></td>
			<td><span class=style23>$d[nama_dokter]</span></td>
			<td><span class=style23>$d1[diagnosa], $d2[diagnosa]</span></td>";
			echo "<tr>";
			$no++;
			}
    }
    echo "</table>";
	echo "</div>";
?>
</table>
<table width="512">
<tr><td width="308"></td><td width="173"><div align="center"><span class="style23">Mengetahui</span></div></td>
</tr>
<tr><td></td><td><div align="center"><span class="style23">Kepala Puskesmas Aikmual </span></div></td><td width="15"></td>
&nbsp;
</tr>
<tr><td></td><td height="46"><div align="center"><span class="style23">TTD</span></div></td><td width="15"></td>
&nbsp;
</tr>
<tr><td></td><td><div align="center"><span class="style23">dr. Muhammad</span></div></td><td>
</tr>
</table>
<tr>
  <td width="100%" valign="top" style="padding: 10px;">
  
</body>
</html>
