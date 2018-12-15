<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_rekam08";

// Koneksi dan memilih database di server
mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");
// mysqli_select_db($database) or die("Database tidak bisa dibuka");
?>
