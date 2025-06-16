<?php
require_once 'koneksi_db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 0;
$book = null;
$notFound = false;
$deleteStatus = null;

// Validasi dan cek keberadaan buku
if ($id > 0) {
    $stmt = $conn->prepare("SELECT ID, Judul FROM buku WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();
    $stmt->close();
}

// Tandai status jika buku tidak ditemukan
if (!$book) {
    $notFound = true;
}

// Proses penghapusan setelah konfirmasi pengguna
if ($_SERVER["REQUEST_METHOD"] === "POST" && $book) {
    // Simpan data ke tabel buku_terhapus sebelum menghapus dari daftar utama
    $stmt = $conn->prepare("INSERT INTO buku_terhapus (Judul, Tanggal_Hapus) VALUES (?, NOW())");
    $stmt->bind_param("s", $book['Judul']);
    $stmt->execute();
    $stmt->close();

    // Hapus dari tabel utama
    $stmt = $conn->prepare("DELETE FROM buku WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $deleteStatus = 'success';
    } else {
        $deleteStatus = 'error';
    }

    $stmt->close();
}

$conn->close();
?>
