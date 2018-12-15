<?php
// include "konfig/koneksi.php";
$server = "localhost";
$username = "root";
$password = "";
$database = "db_rekam08";

// Koneksi dan memilih database di server
$koneksi = mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");
$pass=md5($_POST['password']);
//echo $pass;
$login=mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$_POST[username]' AND password='$pass'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);
// print_r($r);
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  // session_register("namauser");
  // session_register("passuser");

  $_SESSION['namauser'] = $r[id_user];
  $_SESSION['passuser'] = $r[password];

  header('location:home.php?hal=beranda');
}
else{
$usr=mysqli_num_rows(mysql_query($koneksi,"SELECT * FROM user WHERE id_user='$_POST[username]'"));
$pwd=mysqli_num_rows(mysql_query($koneksi,"SELECT * FROM user WHERE password='$pass'"));
if ($usr > 0){
 header('location:index.php?rr=psswd');
} else if ($pwd > 0){
 header('location:index.php?rr=usr');
} else {
 header('location:index.php?rr=al');
}
}
?>
