<?php
session_start();
error_reporting(0);
include "konfig/koneksi.php";
include "konfig/library.php";

$module=$_GET[hal];
$act=$_GET[act];


// Menghapus data
if ($module=='pasien' AND $act=='hapus'){
  mysql_query("DELETE FROM ".$module." WHERE no_pasien='$_GET[id]'");
  header('location:home.php?hal='.$module);
}


// Update profil
elseif ($module=='profil' AND $act=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE profil SET judul_profil = '$_POST[judul_profil]',
                                   isi_profil  = '$_POST[isi_profil]',
									kepala_pkm = '$_POST[kepala_pkm]'
                             WHERE id_profil   = '1'");
  }
  else{
    move_uploaded_file($lokasi_file,"images/$nama_file");
    mysql_query("UPDATE profil SET judul_profil = '$_POST[judul_profil]',
                                   isi_profil  = '$_POST[isi_profil]',
                                   gambar      = '$nama_file',
									kepala_pkm = '$_POST[kepala_pkm]'   
                             WHERE id_profil   = '1'");
  }
  header('location:home.php?hal='.$module);
}



// Input pasien
elseif ($module=='pasien' AND $act=='input'){
$lahir=sprintf("%02d%02d%02d",$_POST[thn_lahir],$_POST[bln_lahir],$_POST[tgl_lahir]);
mysql_query("INSERT INTO pasien(nama_pasien,
								  tgl_lahir,
								  jenis_kelamin,
                                  pekerjaan,
								  alamat,
								  telepon,
								  status_bantuan) 
	                       VALUES('$_POST[nama_pasien]',
                                  '$lahir',
                                  '$_POST[jk]',
                                  '$_POST[pekerjaan]',
                                  '$_POST[alamat]',
                                  '$_POST[telepon]',
                                  '$_POST[status_bantuan]')");
  header('location:home.php?hal='.$module);
}

// update pasien
elseif ($module=='pasien' AND $act=='update'){
$lahir=sprintf("%02d%02d%02d",$_POST[thn_lahir],$_POST[bln_lahir],$_POST[tgl_lahir]);
    mysql_query("UPDATE pasien SET nama_pasien      = '$_POST[nama_pasien]',
								   tgl_lahir 		= '$lahir',
								   jenis_kelamin  	= '$_POST[jk]',
								   pekerjaan		= '$_POST[pekerjaan]',
								   alamat			= '$_POST[alamat]',
								   telepon			= '$_POST[telepon]',
								   status_bantuan	= '$_POST[status_bantuan]'
                             WHERE no_pasien      	= '$_POST[id]'");
	header('location:home.php?hal='.$module);
}

// Input user
elseif ($module=='user' AND $act=='input'){
  $pass=md5($_POST[password]);
	mysql_query("INSERT INTO user(id_user,
								  password,
								  nama_lengkap,
                                  email) 
	                       VALUES('$_POST[id_user]',
                                  '$pass',
                                  '$_POST[nama_lengkap]',
                                  '$_POST[email]')");
	header('location:home.php?hal='.$module);
}

// Update user
elseif ($module=='user' AND $act=='update'){
  // Apabila password tidak diubah
  if (empty($_POST[password])) {
    mysql_query("UPDATE user SET id_user      = '$_POST[id_user]',
                                 nama_lengkap = '$_POST[nama_lengkap]',
                                 email        = '$_POST[email]'
                          WHERE id_user      = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST[password]);
    mysql_query("UPDATE user SET id_user      = '$_POST[id_user]',
                                 password     = '$pass',
                                 nama_lengkap = '$_POST[nama_lengkap]',
                                 email        = '$_POST[email]'  
                           WHERE id_user      = '$_POST[id]'");
	}
  header('location:home.php?hal='.$module);
}

// Menghapus user
elseif ($module=='user' AND $act=='hapus'){
  mysql_query("DELETE FROM ".$module." WHERE id_user='$_GET[id]'");
  header('location:home.php?hal='.$module);
}

// Input rawat jalan
elseif ($module=='rawat_jalan' AND $act=='input'){
 	mysql_query("INSERT INTO rawat_jalan(tanggal_rj,
										no_anamnesis,
										diagnosa,
										terapi,
										jumlah_rj,
										kode_tindakan,
										kode_dokter,
										no_resep) 
								VALUES('$tgl_sekarang',
										'$_POST[no_anamnesis]',
										'$_POST[diagnosa]',
										'$_POST[terapi]',
										'$_POST[jumlah_rj]',
										'$_POST[kode_tindakan]',
										'$_POST[kode_dokter]',
										'$_POST[no_resep]')");
	header('location:home.php?hal='.$module);
}

// update rawat jalan
elseif ($module=='rawat_jalan' AND $act=='update'){
  mysql_query("UPDATE `rawat_jalan` SET `no_anamnesis` = '$_POST[no_anamnesis]',
														`diagnosa` = '$_POST[diagnosa]',
														`terapi` = '$_POST[terapi]',
														`jumlah_rj` = '$_POST[jumlah_rj]',
														`kode_tindakan` = '$_POST[kode_tindakan]',
														`kode_dokter` = '$_POST[kode_dokter]',
														`no_resep` = '$_POST[no_resep]' 
												WHERE `rawat_jalan`.`id_rawat_jalan` =$_POST[id];");
	header('location:home.php?hal='.$module);
}

// Menghapus rawat jalan
elseif ($module=='rawat_jalan' AND $act=='hapus'){
  mysql_query("DELETE FROM ".$module." WHERE id_rawat_jalan='$_GET[id]'");
  header('location:home.php?hal='.$module);
}

// Input dokter
elseif ($module=='dokter' AND $act=='input'){
 	mysql_query("INSERT INTO dokter(kode_dokter,
									nama_dokter,
									alamat,
									no_telpon_d,
									jabatan) 
								VALUES('$_POST[kode_dokter]',
										'$_POST[nama_dokter]',
										'$_POST[alamat]',
										'$_POST[no_telpon_d]',
										'$_POST[jabatan]')");
	header('location:home.php?hal='.$module);
}

// update dokter
elseif ($module=='dokter' AND $act=='update'){
  mysql_query("UPDATE `dokter` SET `kode_dokter` = '$_POST[kode_dokter]',
									`nama_dokter` = '$_POST[nama_dokter]',
									`alamat` = '$_POST[alamat]',
									`no_telpon_d` = '$_POST[no_telpon_d]',
									`jabatan` = '$_POST[jabatan]' 
							WHERE `kode_dokter` =$_POST[id];");
	header('location:home.php?hal='.$module);
}

// Menghapus dokter
elseif ($module=='dokter' AND $act=='hapus'){
  mysql_query("DELETE FROM ".$module." WHERE kode_dokter='$_GET[id]'");
  header('location:home.php?hal='.$module);
}


// Input anamnesis
elseif ($module=='anamnesis' AND $act=='input'){
$bulan=substr($tgl_sekarang,4,2);
mysql_query("INSERT INTO `anamnesis` (`no_pasien`, 
										`pertus_terakhir`, 
										`golongan_darah`, 
										`keluhan`, 
										`tanggal`, 
										`id_diagnosa1`, 
										`id_diagnosa2`, 
										`gpa`, 
										`terapi`, 
										`hpht`, 
										`abosrtus_terakhir`, 
										`rujukan`,
										`id_bulan`,
										`id_dokter`) 
								VALUES ('$_POST[no_pasien]',
										'$_POST[pertus_terakhir]',
										'$_POST[golongan_darah]',
										'$_POST[keluhan]',
										'$tgl_sekarang',
										'$_POST[id_diagnosa1]',
										'$_POST[id_diagnosa2]',
										'$_POST[gpa]',
										'$_POST[terapi]',
										'$_POST[hpht]',
										'$_POST[abostrus_terakhir]',
										'$_POST[rujukan]',
										'$bulan',
										'$_POST[id_dokter]')");
	header('location:home.php?hal='.$module);
}

// update anamnesis
elseif ($module=='anamnesis' AND $act=='update'){
  mysql_query("UPDATE `anamnesis` SET `no_pasien` 			= '$_POST[no_pasien]',
										`pertus_terakhir` 	= '$_POST[pertus_terakhir]',
										`golongan_darah` 	= '$_POST[golongan_darah]',
										`keluhan`			= '$_POST[keluhan]',
										`id_diagnosa1` 		= '$_POST[id_diagnosa1]',
										`id_diagnosa2` 		= '$_POST[id_diagnosa2]',
										`gpa` 				= '$_POST[gpa]',
										`terapi` 			= '$_POST[terapi]',
										`hpht` 				= '$_POST[hpht]',
										`abosrtus_terakhir` = '$_POST[abostrus_terakhir]',
										`rujukan` 			= '$_POST[rujukan]',
										`id_dokter` 		= '$_POST[id_dokter]'
									WHERE `no_anamnesis`	= '$_POST[id]';");
	header('location:home.php?hal='.$module);
}

// Menghapus anamnesis
elseif ($module=='anamnesis' AND $act=='hapus'){
  mysql_query("DELETE FROM ".$module." WHERE no_anamnesis='$_GET[id]'");
  header('location:home.php?hal='.$module);
}

// Input diagnosa
elseif ($module=='diagnosa' AND $act=='input'){
 	mysql_query("INSERT INTO diagnosa(diagnosa,
									kode) 
								VALUES('$_POST[diagnosa]',
										'$_POST[kode]')");
	header('location:home.php?hal='.$module);
}


// update diagnosa
elseif ($module=='diagnosa' AND $act=='update'){
  mysql_query("UPDATE `diagnosa` SET `diagnosa` = '$_POST[diagnosa]',
									`kode` = '$_POST[kode]' 
							WHERE `id_diagnosa` =$_POST[id];");
	header('location:home.php?hal='.$module);
}

// Menghapus diagnosa
elseif ($module=='diagnosa' AND $act=='hapus'){
  mysql_query("DELETE FROM ".$module." WHERE id_diagnosa='$_GET[id]'");
  header('location:home.php?hal='.$module);
}

// tambah obat
elseif ($module=='obat' AND $act=='input'){
 	mysql_query("INSERT INTO obat(kode_obat,
									nama_obat,
									satuan,
									keterangan) 
								VALUES('$_POST[kode_obat]',
										'$_POST[nama_obat]',
										'$_POST[satuan]',
										'$_POST[keterangan]')");
	header('location:home.php?hal='.$module);
}

// update obat
elseif ($module=='obat' AND $act=='update'){
  mysql_query("UPDATE `obat` SET `kode_obat` = '$_POST[kode_obat]',
									`nama_obat` = '$_POST[nama_obat]',
									`satuan` = '$_POST[satuan]',
									`keterangan` = '$_POST[keterangan]'
							WHERE `kode_obat` = '$_POST[id]';");
	header('location:home.php?hal='.$module);
}

// Menghapus obat
elseif ($module=='obat' AND $act=='hapus'){
  mysql_query("DELETE FROM ".$module." WHERE kode_obat='$_GET[id]'");
  header('location:home.php?hal='.$module);
}

// tambah resep
elseif ($module=='resep' AND $act=='input'){
 	mysql_query("INSERT INTO resep(tanggal,
									kode_obat,
									jumlah_item,
									dosis) 
								VALUES('$tgl_sekarang',
										'$_POST[kode_obat]',
										'$_POST[jumlah_item]',
										'$_POST[dosis]')");
	header('location:home.php?hal='.$module);
}

// update resep
elseif ($module=='resep' AND $act=='update'){
  mysql_query("UPDATE `resep` SET `kode_obat` = '$_POST[kode_obat]',
									`jumlah_item` = '$_POST[jumlah_item]',
									`dosis` = '$_POST[dosis]'
							WHERE `kode_resep` = '$_POST[id]';");
	header('location:home.php?hal='.$module);
}

// Menghapus resep
elseif ($module=='resep' AND $act=='hapus'){
  mysql_query("DELETE FROM ".$module." WHERE kode_resep='$_GET[id]'");
  header('location:home.php?hal='.$module);
}

// tambah tindakan
elseif ($module=='tindakan' AND $act=='input'){
$tgl_tindakan=sprintf("%02d%02d%02d",$_POST[thn_tindak],$_POST[bln_tindak],$_POST[tgl_tindak]);
 	mysql_query("INSERT INTO tindakan(kode_tindakan,
									nama_tindakan,
									tgl_tindakan,
									biaya_tindakan) 
								VALUES('$_POST[kode_tindakan]',
										'$_POST[nama_tindakan]',
										'$tgl_tindakan',
										'$_POST[biaya_tindakan]')");
	header('location:home.php?hal='.$module);
}

// tambah tindakan
elseif ($module=='tindakan' AND $act=='update'){
$tgl_tindakan=sprintf("%02d%02d%02d",$_POST[thn_tindak],$_POST[bln_tindak],$_POST[tgl_tindak]);
  mysql_query("UPDATE `tindakan` SET `kode_tindakan` = '$_POST[kode_tindakan]',
									`nama_tindakan` = '$_POST[nama_tindakan]',
									`tgl_tindakan` = '$tgl_tindakan',
									`biaya_tindakan` = '$_POST[biaya_tindakan]'
							WHERE `kode_tindakan` = '$_POST[id]';");
	header('location:home.php?hal='.$module);
}

// Menghapus tindakan
elseif ($module=='tindakan' AND $act=='hapus'){
  mysql_query("DELETE FROM ".$module." WHERE kode_tindakan='$_GET[id]'");
  header('location:home.php?hal='.$module);
}

?>
