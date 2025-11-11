<?php
$host = "localhost";
$user = "root"; 
$pass = ""; 
$db   = "nyiumem";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (!mysqli_set_charset($koneksi, "utf8")) {
    die("Error setting character set: " . mysqli_error($conn));
}
?>