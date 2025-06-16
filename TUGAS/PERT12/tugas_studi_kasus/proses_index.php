<?php
   include 'koneksi_db.php'; // Koneksi database

   // Inisialisasi variabel pencarian
   $search_judul = isset($_GET['judul']) ? $_GET['judul'] : '';
   $search_tahun = isset($_GET['tahun_terbit']) ? $_GET['tahun_terbit'] : '';

   // Query untuk menampilkan daftar buku dengan filter pencarian
   $query = "SELECT * FROM buku WHERE 1=1";
   if (!empty($search_judul)) {
       $query .= " AND Judul LIKE '%" . $conn->real_escape_string($search_judul) . "%'";
   }
   if (!empty($search_tahun)) {
       $query .= " AND Tahun_Terbit = " . $conn->real_escape_string($search_tahun); //.= untuk menambahkan dari string sebelumnya. real_escape_string untuk menghindari sql injek
   }

   $result = $conn->query($query);
?>


<?php
require_once 'koneksi_db.php';

// Inisialisasi variabel pencarian
$search_judul = $_GET['judul'] ?? '';
$search_tahun = $_GET['tahun_terbit'] ?? '';

$query = "SELECT * FROM buku WHERE 1";
$params = [];
$param_types = '';

if (!empty($search_judul)) {
    $query .= " AND Judul LIKE ?";
    $params[] = "%" . $search_judul . "%";
    $param_types .= "s";
}
if (!empty($search_tahun)) {
    $query .= " AND Tahun_Terbit = ?";
    $params[] = $search_tahun;
    $param_types .= "i";
}

$stmt = $conn->prepare($query);

// Hanya panggil bind_param jika ada parameter pencarian
if (!empty($params)) {
    $stmt->bind_param($param_types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

// Ambil data buku yang telah terhapus
$stmt_deleted = $conn->prepare("SELECT * FROM buku_terhapus ORDER BY Tanggal_Hapus DESC");
$stmt_deleted->execute();
$result_deleted = $stmt_deleted->get_result();
$stmt_deleted->close();
?>