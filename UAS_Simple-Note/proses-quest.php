<?php
    include 'connection.php'; // koneksi menggunakan MySQLi OOP
    $stmt = $conn->prepare("SELECT ques_idxxx, ques_namex FROM quest;");
    $stmt->execute();
    $result = $stmt->get_result();
?>