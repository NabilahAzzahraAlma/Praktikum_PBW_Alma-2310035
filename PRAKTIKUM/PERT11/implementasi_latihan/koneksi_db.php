<?php
$servername = "localhost";
$username = "root";       // sesuaikan dengan user database Anda
$password = "";           // sesuaikan dengan password database Anda
$dbname = "perpustakaan";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
