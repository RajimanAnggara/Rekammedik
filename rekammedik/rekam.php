<?php
include "konfig/koneksi.php";
include "konfig/library.php";
include "konfig/fungsi_indotgl.php";

?>
<html>
<head>
<title>Print Rekam Pasien</title>
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
<table width="675" border="0">
  <tr>
    <td width="72" height="71" rowspan="2"><img src="images/lotengputih.png" width="67" height="69" /></td>
    <td width="434" height="50"><p align="center"><span class="style14">SISTEM INFORMASI REKAM MEDIK PASIEN RAWAT JALAN</span><span class="style16"><br>
      <span class="style12">UPT PUSKESMAS AIKMUAL </span><br />
    </span><br>
    </p>
    </td>
  <tr><td colspan="3"><div align="center"><span class="style15">Alamat: Jalan Raya Praya - Mantang Kecamatan Praya Lombok Tengah </span></div></td></tr>
  </tr><tr><td colspan="3"><hr></td></tr>
  </tr><tr><td colspan="3"><div align="center" class="style19"><span class="style12">LAPORAN REKAM MEDIK PASIEN </span></div></td>
</table>
<?php
	$a=mysql_fetch_array(mysql_query("SELECT * FROM anamnesis where no_pasien=$_GET[id]"));
	$p=mysql_fetch_array(mysql_query("SELECT * FROM pasien where no_pasien='$_GET[id]'"));
	$d=mysql_fetch_array(mysql_query("SELECT * FROM dokter where kode_dokter='$r[id_dokter]'"));
	$d1=mysql_fetch_array(mysql_query("SELECT * FROM diagnosa where id_diagnosa='$r[id_diagnosa1]'"));
	$d2=mysql_fetch_array(mysql_query("SELECT * FROM diagnosa where id_diagnosa='$r[id_diagnosa2]'"));
	$tgl= tgl_indo($p[tgl_lahir]);
			echo "<table>";
	echo "<tr><td>Nama Pasien </td><td>: $p[nama_pasien]</td></tr>
		<tr><td>Tgl Lahir </td><td>: $tgl</td></tr></table>";
	echo "<table border =1><tr><th><span class=style23>No.</span></th><th><span class=style23>Tgl Anamnesis</span></th><th><span class=style23>Kode Dokter</span></th><th><span class=style23>Diagnosa</span></th></tr>";
	$no=1;
    echo "</table>";
	echo "</div>";
?>
<table width="671">
<tr><td width="308"></td><td width="188"><div align="center"><span class="style23">Mengetahui</span></div></td>
</tr>
<tr><td></td><td><div align="center"><span class="style23">Kepala Puskesmas Aikmual </span></div></td><td width="10"></td>
&nbsp;
</tr>
<tr><td></td><td height="46"><div align="center"><span class="style23">TTD</span></div></td><td width="10"></td>
&nbsp;
</tr>
<tr><td></td><td><div align="center"><span class="style23"><?php
$p=mysql_fetch_array(mysql_query("select kepala_pkm from profil where id_profil='1'"));
echo "$p[kepala_pkm]";
?></span></div></td><td>
</tr>
</table>
<tr>
  <td width="100%" valign="top" style="padding: 10px;">
  
</body>
</html>
