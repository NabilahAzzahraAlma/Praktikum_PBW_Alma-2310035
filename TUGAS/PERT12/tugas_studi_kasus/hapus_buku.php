<?php include 'proses_hapus.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container mt-4">
    <?php if ($notFound): ?>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'ID tidak valid atau buku tidak ditemukan!'
        }).then(() => {
            window.location.href = 'index.php';
        });
        </script>
    <?php elseif ($deleteStatus === 'success'): ?>
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data buku berhasil dihapus.'
        }).then(() => {
            window.location.href = 'index.php';
        });
        </script>
    <?php elseif ($deleteStatus === 'error'): ?>
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Terjadi kesalahan saat menghapus data.'
        }).then(() => {
            window.location.href = 'index.php';
        });
        </script>
    <?php else: ?>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0">Konfirmasi Hapus Buku</h4>
                    </div>
                    <div class="card-body">
                        <p>Apakah Anda yakin ingin menghapus buku <strong><?= htmlspecialchars($book['Judul']) ?></strong>?</p>
                        <form method="post">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                            <a href="index.php" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
