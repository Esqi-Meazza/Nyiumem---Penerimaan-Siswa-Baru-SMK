<?php
// Mulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah user sudah login
if (isset($_SESSION['username'])) {
    // Hapus semua variabel session
    session_unset();

    // Hancurkan session
    session_destroy();

    // Redirect ke halaman login
    header("Location: index.php");
    exit; // hentikan eksekusi setelah redirect
} else {
    // Jika tidak login, langsung redirect juga
    header("Location: login/index.php");
    exit;
}
?>
