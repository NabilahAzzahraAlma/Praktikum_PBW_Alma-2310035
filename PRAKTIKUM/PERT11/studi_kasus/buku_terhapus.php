<?php
require_once 'koneksi_db.php';

$stmt = $conn->prepare("SELECT ID, Judul, Tanggal_Hapus FROM buku_terhapus ORDER BY Tanggal_Hapus DESC");
$stmt->execute();
$result_deleted = $stmt->get_result();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku yang Telah Dihapus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container mt-4">
    <h2>Daftar Buku yang Telah Dihapus</h2>
    <table class="table table-bordered">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Tanggal Penghapusan</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row_deleted = $result_deleted->fetch_assoc()): ?>
                <tr>
                    <td><?= $row_deleted['ID'] ?></td>
                    <td><?= htmlspecialchars($row_deleted['Judul']) ?></td>
                    <td><?= $row_deleted['Tanggal_Hapus'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
