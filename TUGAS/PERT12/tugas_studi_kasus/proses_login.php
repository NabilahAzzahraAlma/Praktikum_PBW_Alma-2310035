<?php
session_start();
include 'koneksi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, nama, katasandi, role FROM pengguna WHERE nama = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($password === $user['katasandi']) {
            $allowed_roles = ['mahasiswa', 'dekan', 'kaprodi', 'rektor'];
            if (!in_array($user['role'], $allowed_roles)) {
                header("Location: login.php?message=" . urlencode("Akses ditolak: Anda tidak memiliki izin."));
                exit;
            }

            $_SESSION['id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['login_Un51k4'] = true;

            header("Location: index.php");
            exit;
        } else {
            header("Location: login.php?message=" . urlencode("Password salah, coba lagi."));
            exit;
        }
    } else {
        header("Location: login.php?message=" . urlencode("Akun tidak ditemukan!"));
        exit;
    }
    $stmt->close();
}
?>