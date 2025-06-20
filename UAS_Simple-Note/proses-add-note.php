<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $judul = trim($_POST['judul'] ?? '');
    $tags  = trim($_POST['tags'] ?? '');
    $isi   = trim($_POST['isi'] ?? '');
    $user_id = $_SESSION['id'] ?? '';
    if (empty($judul) || empty($tags) || empty($isi)) {
        header("Location: add-note.php?msg=" . urlencode("Semua field harus diisi."));
        exit();
    }

    // Pastikan ada koma sebagai pemisah
    if (strpos($tags, ',') === false) {
        header("Location: add-note.php?msg=" . urlencode("Tags harus dipisahkan dengan koma, misalnya: kerja,rumah,belajar."));
        exit();
    }

    // Simpan ke database
    $stmt = $conn->prepare("INSERT INTO notes (note_idxxx, user_idxxx, note_title, note_tagxx, note_cntnt) VALUES (UUID(), ?, ?, ?, ?)");

    $stmt->bind_param("isss", $user_id, $judul, $tags, $isi);
    if ($stmt->execute()) {
        header("Location: note.php?msg=" . urlencode("Catatan berhasil ditambahkan!."));
    } else {
        header("Location: add-note.php?msg=" . urlencode("Gagal menambahkan catatan: " . $stmt->error));
    }

    $stmt->close();
} else {
    header("Location: add-note.php?msg=" . urlencode("Invalid method!"));
    exit();
}