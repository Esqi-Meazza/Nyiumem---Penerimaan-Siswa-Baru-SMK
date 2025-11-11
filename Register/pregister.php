<?php
session_start();
require_once '../service/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $level = 'casis';

    //cek validasi input
     if (empty($username) || empty($password) || empty($nama_lengkap)) {
        header('Location: index.php?gagal=Semua field harus diisi.');
        exit();
    }

    // Cek apakah username sudah ada
    $cek_sql = "SELECT * FROM user WHERE username = '$username'";
    $cek_aksi = $koneksi->query($cek_sql);
    $cek_banyak = $cek_aksi->num_rows;

    if ($cek_banyak == 0) {
        // Jika belum ada, insert data baru (tambahkan level ke dalam query)
        $insert_sql = "INSERT INTO user (username, password, nama_lengkap, level) VALUES ('$username', '$password', '$nama_lengkap', '$level')";
        if ($koneksi->query($insert_sql) === TRUE) {
            // Jika berhasil register, redirect ke login
            header('Location: ../Login/index.php?sukses=Registrasi berhasil, silakan login.');
            exit();
        } else {
            // Jika gagal insert
            header('Location: index.php?gagal=Gagal registrasi.');
        }
    } else {
        // Jika username sudah ada
        header('Location: index.php?gagal=Username sudah digunakan.');
    }
}
mysqli_close($koneksi);
?>
