<?php
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $stmt = $conn->prepare("UPDATE Pelanggan SET Nama=?, Email=?, Telepon=? WHERE ID=?");
    $stmt->bind_param("sssi", $nama, $email, $telepon, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data pelanggan berhasil diperbarui'); window.location='daftar_pelanggan.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data pelanggan: " . addslashes($stmt->error) . "'); window.location='daftar_pelanggan.php';</script>";
    }
}
?>