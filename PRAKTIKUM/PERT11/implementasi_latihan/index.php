<?php
include 'koneksi_db.php';
include 'nav.php';

$result = $conn->query("SELECT * FROM buku ORDER BY ID DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
   <title>Daftar Buku</title>
</head>
<body>
<div class="container mt-4">
    <h2>Daftar Buku</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= htmlspecialchars($row['ID']) ?></td>
                <td><?= htmlspecialchars($row['Judul']) ?></td>
                <td><?= htmlspecialchars($row['Penulis']) ?></td>
                <td><?= htmlspecialchars($row['Tahun_Terbit']) ?></td>
                <td><?= number_format($row['Harga'], 2, ',', '.') ?></td>
                <td><?= htmlspecialchars($row['Stok']) ?></td>
                <td>
                    <a href="hapus_buku.php?id=<?= $row['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?');">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
<?php
$conn->close();
?>
