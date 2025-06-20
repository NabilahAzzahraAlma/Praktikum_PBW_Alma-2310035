<?php
session_start();
if(isset($_SESSION['login'])) {
    // Hapus semua variabel sesi
    session_unset();
    
    // Hancurkan sesi
    session_destroy();
    
    // Redirect ke halaman login dengan pesan sukses
    header("Location: login.php?msg=" . urlencode("Anda telah berhasil logout."));
    exit;
} else {
    // Jika tidak ada sesi yang aktif, redirect ke halaman login
    header("Location: login.php?msg=" . urlencode("invalid method."));
    exit;
}
?>