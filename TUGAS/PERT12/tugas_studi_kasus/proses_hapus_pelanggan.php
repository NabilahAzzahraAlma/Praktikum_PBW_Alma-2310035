<?php
include 'koneksi_db.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 0;
$pelanggan = null;
$deleteStatus = null;

// Validasi ID pelanggan
if ($id > 0) {
    // Cek keberadaan pelanggan
    $stmt = $conn->prepare("SELECT ID, Nama FROM Pelanggan WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $pelanggan = $result->fetch_assoc();
    $stmt->close();

    if (!$pelanggan) {
        $deleteStatus = 'not_found';
    }
}

// Jika pelanggan ditemukan dan ada permintaan penghapusan
if ($pelanggan && $_SERVER["REQUEST_METHOD"] === "POST") {
    // Cek apakah pelanggan memiliki pesanan terkait
    $stmt = $conn->prepare("SELECT COUNT(*) FROM Pesanan WHERE Pelanggan_ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($orderCount);
    $stmt->fetch();
    $stmt->close();

    if ($orderCount > 0) {
        $deleteStatus = 'has_orders';
    } else {
        // Mulai proses penghapusan pelanggan
        $stmt = $conn->prepare("DELETE FROM Pelanggan WHERE ID = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            $deleteStatus = 'success';
        } else {
            $deleteStatus = 'error';
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!-- Tampilan Status Penghapusan -->
<?php if ($deleteStatus === 'not_found'): ?>
    <div class="alert alert-warning">Pelanggan tidak ditemukan.</div>
<?php elseif ($deleteStatus === 'has_orders'): ?>
    <div class="alert alert-danger">Pelanggan tidak dapat dihapus karena memiliki pesanan terkait.</div>
<?php elseif ($deleteStatus === 'success'): ?>
    <div class="alert alert-success">Data pelanggan berhasil dihapus.</div>
<?php elseif ($deleteStatus === 'error'): ?>
    <div class="alert alert-danger">Terjadi kesalahan saat menghapus data pelanggan.</div>
<?php endif; ?>