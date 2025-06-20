<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php?msg=" . urlencode("Silahkan login terlebih dahulu!"));
    exit;
} else {
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SiCatet | Tambah Catatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="./public/img/icon.png" />
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(180deg, #402DAE 0%, #BD63D1 100%);
        }
        .card.shadow-dark {
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.5) !important;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card shadow-dark">
        <div class="card-body">
            <h3 class="card-title mb-4">Tambah Catatan</h3>

            <?php if (isset($_GET['msg'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($_GET['msg']) ?>
                </div>
            <?php endif; ?>

            <form action="proses-add-note.php" method="post">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" class="form-control bg-secondary-subtle" id="judul" name="judul">
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Tags <small class="text-muted">(pisahkan dengan koma)</small></label>
                    <input type="text" class="form-control bg-secondary-subtle" id="tags" name="tags" placeholder="contoh: kuliah, tugas, pribadi">
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Catatan</label>
                    <textarea class="form-control bg-secondary-subtle" id="isi" name="isi" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Catatan</button>
                <a href="note.php" class="btn btn-secondary ms-2">Kembali</a>
            </form>
        </div>
    </div>
</div>

<script>
document.querySelector('form').addEventListener('submit', function (e) {
    const tagsInput = document.getElementById('tags').value.trim();
    if (tagsInput && !tagsInput.includes(',')) {
        alert('Tags harus dipisahkan dengan koma (misalnya: kerja,rumah,belajar)');
        e.preventDefault();
    }
});
</script>

</body>
</html>
<?php } ?>