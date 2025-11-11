<?php
session_start();
require_once '../service/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_casis = $_POST['id_casis'];
    $nama = $_POST['nama'];
    $nisn = (int)$_POST['nisn'];
    $status = $_POST['status'];

    $sql_update = "UPDATE casis SET 
        nama = '$nama', 
        NISN = $nisn, 
        status = '$status' 
        WHERE id_casis = $id_casis";
    
    if ($koneksi->query($sql_update) === TRUE) {
        header('Location: index.php?sukses=Data berhasil diupdate.');
        exit();
    } else {
        header('Location: edit.php?id='.$id_casis.'&gagal=Gagal update: '.$koneksi->error);
        exit();
    }
}
mysqli_close($koneksi);
?>