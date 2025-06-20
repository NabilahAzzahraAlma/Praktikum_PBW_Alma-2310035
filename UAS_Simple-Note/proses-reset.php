<?php
include 'connection.php'; // koneksi menggunakan MySQLi OOP
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pass = $_POST['pass'];
    $conf_pass = $_POST['conf_pass'];
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    if ($pass !== $conf_pass) {
        header("Location: reset.php?msg=" . urlencode("Password dan konfirmasi password tidak cocok!"));
        exit;
    } else {
        $stmt = $conn->prepare("SELECT user_idxxx FROM users WHERE user_usrnm = ? AND user_idxxx = ?");
        $stmt->bind_param("si", $username, $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $pass = md5($pass);
            $stmt = $conn->prepare("UPDATE users SET user_passx = ? WHERE user_idxxx = ? AND user_usrnm = ?");
            $stmt->bind_param("sis", $pass, $id, $username);
            if ($stmt->execute()) {
                session_unset();
                session_destroy();
                header("Location: login.php");
                exit;
            } else {
            header("Location: reset.php?msg=" . urlencode("Error Database!"));
                exit;
            }
        } else {
            header("Location: reset.php?msg=" . urlencode("Username tidak ditemukan!"));
            exit;
        }
        $stmt->close();
    }
}else{
    header("Location: reset.php?msg=" . urlencode("Invalid method!"));
    exit;
}
