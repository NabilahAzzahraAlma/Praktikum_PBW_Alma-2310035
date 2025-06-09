<?php
include 'koneksi_db.php';

if (isset($_GET['selesai_id'])) {
    $pesanan_id = $_GET['selesai_id'];

    $stmt = $conn->prepare("UPDATE Pesanan SET Status = 'completed' WHERE ID = ?");
    $stmt->bind_param("i", $pesanan_id);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error updating record: " . $conn->error . "</div>";
    }
    $stmt->close();
}

if (isset($_GET['hapus_pesanan_id'])) {
    $pesanan_id_to_delete = $_GET['hapus_pesanan_id'];

    $stmt_delete_pesanan = $conn->prepare("DELETE FROM Pesanan WHERE ID = ?");
    $stmt_delete_pesanan->bind_param("i", $pesanan_id_to_delete);

    if ($stmt_delete_pesanan->execute()) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error deleting order: " . $conn->error . "</div>";
    }
    $stmt_delete_pesanan->close();
}

$query = "
    SELECT Pesanan.ID AS Pesanan_ID, Pelanggan.Nama AS Nama_Pelanggan,
           Pesanan.Tanggal_Pesanan, Pesanan.Total_Harga, Pesanan.Status
    FROM Pesanan
    JOIN Pelanggan ON Pesanan.Pelanggan_ID = Pelanggan.ID
    ORDER BY Pesanan.Tanggal_Pesanan DESC
";
$result = $conn->query($query);

if (!$result) {
    echo "<div class='alert alert-danger'>Error executing query: " . $conn->error . "</div>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .status-badge {
            padding: 0.3em 0.6em;
            border-radius: 0.25rem;
            font-size: 0.85em;
            font-weight: bold;
            color: #fff;
        }

        .status-completed {
            background-color: #28a745;
        }

        .status-pending {
            background-color: #ffc107;
        }
    </style>
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container py-4" style="max-width:1200px;">
        <h2 class="mb-4">Daftar Pesanan</h2>

        <table class="table table-hover shadow-sm rounded-3">
            <thead class="table-light">
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pesanan</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['Pesanan_ID']) ?></td>
                            <td><?= htmlspecialchars($row['Nama_Pelanggan']) ?></td>
                            <td><?= htmlspecialchars($row['Tanggal_Pesanan']) ?></td>
                            <td>Rp<?= number_format($row['Total_Harga'], 2, ',', '.') ?></td>
                            <td>
                                <?php if ($row['Status'] === 'completed'): ?>
                                    <span class="status-badge status-completed">Selesai</span>
                                <?php else: ?>
                                    <span class="status-badge status-pending">Pending</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if ($row['Status'] !== 'completed'): ?>
                                    <a href="?selesai_id=<?= urlencode($row['Pesanan_ID']) ?>" class="btn btn-sm btn-success btn-selesai" onclick="return confirm('Apakah Anda yakin ingin menandai pesanan ini sebagai selesai?');">Tandai Selesai</a>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="?hapus_pesanan_id=<?= urlencode($row['Pesanan_ID']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini? Aksi ini tidak dapat dibatalkan!');">Hapus Pesanan</a>
                            </td>
                        </tr>
                    <?php endwhile;
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Tidak ada data pesanan yang ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>