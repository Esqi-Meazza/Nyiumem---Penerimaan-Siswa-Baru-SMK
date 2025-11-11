<?php
session_start();
require_once '../service/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cek apakah user sudah login
    if (!isset($_SESSION['id_user'])) {
        header('Location: index.php?gagal=Silakan login terlebih dahulu.');
        exit();
    }
    
    $id_user = $_SESSION['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nisn = (int)$_POST['nisn'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $id_jurusan = (int)$_POST['id_jurusan'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    // Upload foto
    $foto = $_FILES['foto']['name'];
    $target_dir = "../assets/upload/";
    $target_file = $target_dir . basename($foto);
    if (!move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        header('Location: index.php?gagal=Upload foto gagal.');
        exit();
    }

    // Map id_jurusan ke nilai enum
    $id_jurusan_map = [1 => 'RPL', 2 => 'TKJ', 3 => 'DKV', 4 => 'Animasi'];
    $jurusan = isset($id_jurusan_map[$id_jurusan]) ? $id_jurusan_map[$id_jurusan] : NULL;

    // Cek apakah user sudah pernah mendaftar
    $sql_check_user = "SELECT * FROM casis WHERE id_user = $id_user";
    $cek_user = $koneksi->query($sql_check_user);
    
    if ($cek_user->num_rows > 0) {
        header('Location: index.php?gagal=Anda sudah Daftar.');
        exit();
    }

    // Cek apakah NISN sudah terdaftar
    $sql_check_nisn = "SELECT * FROM casis WHERE NISN = $nisn";
    $cek_nisn = $koneksi->query($sql_check_nisn);

    if ($cek_nisn->num_rows == 0) {
        $sql_insert = "INSERT INTO casis 
        (nama, NISN, jenis_kelamin, jurusan, alamat, no_hp, foto, id_jurusan, id_user, email) 
        VALUES 
        ('$nama', $nisn, '$jenis_kelamin', '$jurusan', '$alamat', $no_hp, '$target_file', $id_jurusan, $id_user, '$email')";

        if ($koneksi->query($sql_insert) === TRUE) {
            header('Location: index.php?sukses=Registrasi berhasil, Silahkan Tunggu pengumuman.');
            exit();
        } else {
            header('Location: index.php?gagal=Gagal registrasi: '.$koneksi->error);
            exit();
        }
    } else {
        header('Location: index.php?gagal=NISN sudah terdaftar.');
        exit();
    }
}
mysqli_close($koneksi);
?>