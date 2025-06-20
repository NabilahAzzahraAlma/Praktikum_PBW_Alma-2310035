<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "simple_note";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
