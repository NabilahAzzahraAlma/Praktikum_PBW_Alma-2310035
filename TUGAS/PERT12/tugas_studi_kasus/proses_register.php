<?php
session_start();
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $role = $_POST['role'];

    if ($password !== $cpassword) {
        echo "<script>alert('Password tidak sesuai, coba lagi.'); window.location.href='register.php';</script>";
        exit;
    }

    // Cek apakah email sudah terdaftar
    $stmt = $conn->prepare("SELECT * FROM pengguna WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // Insert data pengguna tanpa hashing password
        $stmt = $conn->prepare("INSERT INTO pengguna (nama, email, katasandi, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password, $role);

        if ($stmt->execute()) {
            echo "<script>alert('Selamat, pendaftaran berhasil!'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Maaf, terjadi kesalahan saat pendaftaran.');</script>";
        }
    } else {
        echo "<script>alert('Ups, email sudah terdaftar! Gunakan email lain.'); window.location.href='register.php';</script>";
    }
    $stmt->close();
}
?>