<?php
error_reporting(0);
session_start();
if (empty($_SESSION[username]) AND empty($_SESSION[passuser])){
  echo "<link href='konfig/adminstyle.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else {
include "konfig/koneksi.php";
include "konfig/fungsi_indotgl.php";
include "konfig/fungsi_combobox.php";
include "konfig/library.php";
$u=mysql_fetch_array(mysql_query("SELECT * from user where id_user='$_SESSION[namauser]'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"[]>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <!--
    Created by Artisteer v3.1.0.48375
    Base template (without user's data) checked by http://validator.w3.org : "This page is valid XHTML 1.0 Transitional"
    -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Rekam Medik | Puskesmas Aikmual</title>



    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>

</head>
<body>
<div id="art-main">
    <div class="cleared reset-box"></div>
    <div class="art-box art-sheet">
        <div class="art-box-body art-sheet-body">
            <div class="art-header">
                <div class="art-logo">
                                                                        </div>
                
            </div>
            <div class="cleared reset-box"></div>
<div class="art-bar art-nav">
<div class="art-nav-outer">
	
</div>
</div>
<div class="cleared reset-box"></div>
<div class="art-layout-wrapper">
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
					<div class="art-layout-cell art-sidebar1">
<div class="art-box art-vmenublock">
    <div class="art-box-body art-vmenublock-body">
                <div class="art-bar art-vmenublockheader">
                    <h3 class="t">User Menu</h3>
                </div>
                <div class="art-box art-vmenublockcontent">
                    <div class="art-box-body art-vmenublockcontent-body">
                               <ul class="art-vmenu">
			<li>
			<a href="?hal=beranda" >Beranda</a>
		</li>	
		<?php
		if ($u[level]=='admin'){
		echo "</li>";
		}
		?>
        <li>
            <a>Master</a>
            <ul>
            <li>
                <a href='?hal=pasien' >Pasien</a>
            </li>
            <li>
                <a href='?hal=dokter' >Dokter</a>
            </li>
            <li>
                <a href='?hal=tindakan' >Tindakan</a>
            </li>   
            <li>
                <a href='?hal=obat' >Obat</a>
            </li>   
            <li>
                <a href='?hal=diagnosa' >Diagnosa</a>
            </li>
            <li>
                <a href='?hal=profil' >Profil</a>
            </li>
            </ul>
        </li>   
        <li>
            <a >Data Rekam Medik</a>
            <ul>
            <li>
                <a href='?hal=anamnesis' >Anamnesis</a>
            </li>
            <li>
                <a href='?hal=rawat_jalan' >Rawat Jalan</a>
            </li>   
            <li>
                <a href='?hal=resep' >Resep</a>
            </li>           
            </ul>
        </li>
        <li>
            <a >Laporan</a>
            <ul>
            <li>
                <a href="?hal=kartu_pasien" >Kartu Pasien</a>
            </li>   
            <li>
                <a href="?hal=rekam_medik" >Rekam Medik</a>
            </li>   
            </ul>
        </li>   
		<li>


			<a href="logout.php" >Logout</a>
		</li>
</ul>
                
                                		<div class="cleared"></div>
                    </div>
                </div>
		<div class="cleared"></div>
    </div>
</div>
                          <div class="cleared"></div>
                        </div>
                        <div class="art-layout-cell art-content">
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
<div class="art-post-inner art-article">
<?php include "tengah.php"; ?>
                </div>

		<div class="cleared"></div>
    </div>
</div>
   <div class="cleared"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="art-footer">
        <div class="art-footer-body">
            <div class="art-footer-center">
                <div class="art-footer-wrapper">
                    <div class="art-footer-text"><p>Copyright © 2015. All Rights Reserved.</p>
                        <div class="cleared"></div>
                        <p class="art-page-footer">design by siti_marnah.</p>
                    </div>
                </div>
            </div>
            <div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
</div>

</body>
</html>
<?php } ?>
