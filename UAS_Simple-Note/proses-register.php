<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connection.php'; // koneksi menggunakan MySQLi OOP

    $stmt = $conn->prepare("SELECT user_idxxx FROM users ORDER BY user_idxxx DESC LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $id = ((int)$row['user_idxxx'])+ 1;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $conf_pass = $_POST['confirm_password'];
    $quest = $_POST['question'];
    $answer = $_POST['answer'];

    $stmt = $conn->prepare("SELECT user_usrnm FROM users WHERE user_usrnm = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        header("Location: register.php?msg=" . urlencode("Username sudah terdaftar!"));
        exit;
    } else {
        if ($password !== $conf_pass) {
            header("Location: register.php?msg=" . urlencode("Password dan konfirmasi password tidak cocok!"));
            exit;
        } else {
            $password = md5($password); // Enkripsi password
            $stmt = $conn->prepare("INSERT INTO users (user_idxxx, user_usrnm, user_passx, user_quest, user_answr) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issis", $id, $username, $password, $quest, $answer);
            if ($stmt->execute()) {
                header("Location: login.php?msg=" . urlencode("Registrasi berhasil! Silakan login."));
                $stmt->close();
                $conn->close();
                exit;
            } else {
                header("Location: register.php?msg=" . urlencode("Error Database!"));
                exit;
            }
        }
    }
} else {
    echo "Invalid request method.";
}
