<?php
include 'koneksi_db.php'; // Include database connection

// Inisialisasi variabel pencarian
$search_nama = isset($_GET['nama']) ? $_GET['nama'] : '';

// Query untuk menampilkan daftar pelanggan dengan filter pencarian
$query = "SELECT * FROM Pelanggan WHERE 1=1";
if (!empty($search_nama)) {
    $query .= " AND Nama LIKE '%" . $conn->real_escape_string($search_nama) . "%'";
}

$result = $conn->query($query);
?>