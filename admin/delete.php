<?php
session_start();
require_once '../service/koneksi.php';

// Ambil ID dari URL
$id_casis = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id_casis > 0) {
    // Query delete
    $sql_delete = "DELETE FROM casis WHERE id_casis = $id_casis";
    
    if ($koneksi->query($sql_delete) === TRUE) {
        header('Location: index.php?sukses=Data berhasil dihapus.');
        exit();
    } else {
        header('Location: index.php?gagal=Gagal hapus: '.$koneksi->error);
        exit();
    }
} else {
    header('Location: index.php?gagal=ID tidak valid');
    exit();
}
mysqli_close($koneksi);
?>