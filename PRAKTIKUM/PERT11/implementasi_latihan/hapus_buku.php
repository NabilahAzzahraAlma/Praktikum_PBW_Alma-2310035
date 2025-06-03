<?php
include 'koneksi_db.php';
include 'nav.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $conn->prepare("SELECT ID, Judul FROM buku WHERE ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    echo "<script>alert('ID tidak valid atau buku tidak ditemukan!'); window.location='index.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("DELETE FROM buku WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data buku berhasil dihapus!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data: " . addslashes($stmt->error) . "'); window.location='index.php';</script>";
    }
    $stmt->close();
    $conn->close();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
   <title>Hapus Buku</title>
</head>
<body>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-danger">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0">Konfirmasi Hapus Buku</h4>
                </div>
                <div class="card-body">
                    <p>Apakah Anda yakin ingin menghapus buku <strong><?= htmlspecialchars($row['Judul']) ?></strong>?</p>
                    <form method="post">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <a href="index.php" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
