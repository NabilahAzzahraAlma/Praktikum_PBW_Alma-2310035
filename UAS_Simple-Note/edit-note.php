<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php?msg=" . urlencode("Anda harus login terlebih dahulu."));
    exit();
}

$id = $_GET['id'] ?? 0;
$user_id = $_SESSION['id'];

// Ambil data catatan berdasarkan ID dan user
$stmt = $conn->prepare("SELECT * FROM notes WHERE note_idxxx = ?");
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    header("Location: note.php?msg=" . urlencode("Catatan tidak ditemukan."));
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SiCatet | Edit Catatan</title>
            <link rel="shortcut icon" href="./public/img/icon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            <h3 class="card-title mb-4">Edit Catatan</h3>

            <?php if (isset($_GET['msg'])): ?>
                <script>alert('<?= htmlspecialchars($_GET['msg']) ?>');</script>
            <?php endif; ?>

            <form action="proses-edit-note.php" method="post">
                <input type="hidden" name="id" id="id" value="<?= htmlspecialchars($row['note_idxxx']) ?>">

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control bg-light" id="title" name="title" value="<?= htmlspecialchars($row['note_title']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="tag" class="form-label">Tags <small class="text-muted">(pisahkan dengan koma)</small></label>
                    <input type="text" class="form-control bg-light" id="tag" name="tag" value="<?= htmlspecialchars($row['note_tagxx']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label">Isi Catatan</label>
                    <textarea class="form-control bg-light" id="isi" name="isi" rows="5"><?= htmlspecialchars($row['note_cntnt']) ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah mengubah catatan ini?')">Perbarui Catatan</button>
                <a href="note.php" class="btn btn-secondary ms-2">Batal</a>
            </form>
        </div>
    </div>
</div>

<script>
document.querySelector('form').addEventListener('submit', function (e) {
    const tagsInput = document.getElementById('tag').value.trim();
    if (tagsInput && !tagsInput.includes(',')) {
        alert('Tags harus dipisahkan dengan koma (misalnya: kerja,rumah,belajar)');
        e.preventDefault();
    }
});
</script>

</body>
</html>