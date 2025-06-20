<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT user_idxxx, user_usrnm, user_passx FROM users WHERE user_usrnm = ? AND user_passx = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['id'] = $user['user_idxxx'];
        $_SESSION['username'] = $user['user_usrnm'];
        $_SESSION['login'] = true;
        header("Location: note.php");
        exit;
    } else {
        header("Location: login.php?msg=" . urlencode("Username atau Password salah!"));
        exit;
    }
    $stmt->close();
}
?>