<?php
session_start();
require_once '../service/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['username'] = 'admin';
        $_SESSION['level'] = 'admin';
        header('Location: ../admin/index.php'); // Redirect ke halaman admin
        exit();
    }

    // Cek ke database user 
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $aksi = $koneksi->query($sql);
    $banyak = $aksi->num_rows;

    if ($banyak > 0) {
        $isi = $aksi->fetch_assoc();
        $_SESSION['username'] = $isi['username'];
        $_SESSION['id_user'] = $isi['id_user'];
        $_SESSION['level'] = $isi['level'];
        header('Location: ../casis/index.php'); // Redirect ke halaman user 
        exit();
    } else {
        header('location:index.php?gagal=Username atau password salah.');
        exit();
    }
}
mysqli_close($koneksi);
?>
