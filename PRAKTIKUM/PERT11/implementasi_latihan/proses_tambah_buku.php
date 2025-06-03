<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi sederhana
    $judul = trim($_POST['judul']);
    $penulis = trim($_POST['penulis']);
    $tahun_terbit = intval($_POST['tahun_terbit']);
    $harga = floatval($_POST['harga']);
    $stok = intval($_POST['stok']);

    if ($judul === '' || $penulis === '' || $tahun_terbit < 1900 || $tahun_terbit > date('Y') || $harga < 0 || $stok < 0) {
        echo "<script>alert('Input tidak valid'); window.location='tambah_buku.php';</script>";
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO buku (Judul, Penulis, Tahun_Terbit, Harga, Stok) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssidi", $judul, $penulis, $tahun_terbit, $harga, $stok);

    if ($stmt->execute()) {
        echo "<script>alert('Buku berhasil ditambahkan!'); window.location='tambah_buku.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan buku: " . addslashes($stmt->error) . "'); window.location='tambah_buku.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: tambah_buku.php');
    exit;
}
?>
