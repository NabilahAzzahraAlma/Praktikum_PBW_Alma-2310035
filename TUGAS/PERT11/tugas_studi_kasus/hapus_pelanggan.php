<?php include 'proses_hapus_pelanggan.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container mt-4">
    <?php
    include 'koneksi_db.php';

    $notFound = false;
    $deleteStatus = '';

    if (!isset($_GET['pelanggan_id']) || !is_numeric($_GET['pelanggan_id'])) {
        echo "<div class='alert alert-warning'>ID Pelanggan tidak valid.</div>";
    } else {
        $pelanggan_id = $_GET['pelanggan_id'];

        $conn->begin_transaction();

        try {
            // Periksa apakah pelanggan memiliki pesanan terkait sebelum menghapus
            $stmt_check_orders = $conn->prepare("SELECT COUNT(*) FROM Pesanan WHERE Pelanggan_ID = ?");
            $stmt_check_orders->bind_param("i", $pelanggan_id);
            $stmt_check_orders->execute();
            $stmt_check_orders->bind_result($order_count);
            $stmt_check_orders->fetch();
            $stmt_check_orders->close();

            if ($order_count > 0) {
                throw new Exception("Pelanggan tidak dapat dihapus karena masih memiliki pesanan.");
            }

            // Hapus pelanggan
            $stmt_delete_customer = $conn->prepare("DELETE FROM Pelanggan WHERE ID = ?");
            $stmt_delete_customer->bind_param("i", $pelanggan_id);
            if (!$stmt_delete_customer->execute()) {
                throw new Exception("Gagal menghapus pelanggan: " . $stmt_delete_customer->error);
            }
            $stmt_delete_customer->close();

            // Commit transaksi jika semua berhasil
            $conn->commit();
            $deleteStatus = 'success';

        } catch (Exception $e) {
            // Rollback transaksi jika ada kesalahan
            $conn->rollback();
            $deleteStatus = ($order_count > 0) ? 'has_orders' : 'error';
        }
    }

    $conn->close();
    ?>

    <?php if ($notFound): ?>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'ID tidak valid atau pelanggan tidak ditemukan!'
        }).then(() => {
            window.location.href = 'daftar_pelanggan.php';
        });
        </script>
    <?php elseif ($deleteStatus === 'has_orders'): ?>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Pelanggan tidak dapat dihapus karena memiliki pesanan yang terkait!'
        }).then(() => {
            window.location.href = 'daftar_pelanggan.php';
        });
        </script>
    <?php elseif ($deleteStatus === 'success'): ?>
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data pelanggan berhasil dihapus.'
        }).then(() => {
            window.location.href = 'daftar_pelanggan.php';
        });
        </script>
    <?php elseif ($deleteStatus === 'error'): ?>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Terjadi kesalahan saat menghapus data.'
        }).then(() => {
            window.location.href = 'daftar_pelanggan.php';
        });
        </script>
    <?php else: ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0">Konfirmasi Hapus Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        <p>Apakah Anda yakin ingin menghapus pelanggan <strong><?= htmlspecialchars($pelanggan['Nama'] ?? ''); ?></strong>?</p>
                        <form method="post">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                            <a href="daftar_pelanggan.php" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
</body>
</html>