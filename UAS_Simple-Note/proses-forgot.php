<?php
include 'connection.php'; // koneksi menggunakan MySQLi OOP
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    $stmt = $conn->prepare("SELECT user_idxxx, user_usrnm FROM users WHERE user_usrnm = ? AND user_quest = ? AND user_answr = ?");
    $stmt->bind_param("sis", $username, $question, $answer);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['id'] = $user['user_idxxx'];
        $_SESSION['username'] = $user['user_usrnm'];
        $_SESSION['forgot'] = true;
        header("Location: reset.php");
        exit;
    } else {
        header("Location: forgot.php?msg=" . urlencode("Username atau pertanyaan tidak valid!"));
        exit;
    }
    $stmt->close();
}else{
    header("Location: forgot.php?msg=" . urlencode("invalid method!"));
    exit;
}
