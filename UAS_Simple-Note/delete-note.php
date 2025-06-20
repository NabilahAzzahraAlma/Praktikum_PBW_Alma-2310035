<form action="proses-delete-note.php" method="post">

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SiCatet | Hapus Catatan</title>
    <link rel="shortcut icon" href="./public/img/icon.png" />
</head>
<body>
    <h2>Hapus Catatan</h2>

    <p><strong>Judul:</strong> <?= htmlspecialchars($note['note_title'] ?? 'Tidak ada data') ?></p>
    <p><strong>Tags:</strong> <?= htmlspecialchars($note['note_tagxx'] ?? 'Tidak ada data') ?></p>
    <p><strong>Isi:</strong></p>
    <p><?= nl2br(htmlspecialchars($note['note_cntnt'] ?? 'Tidak ada data')) ?></p>

    <hr>
<form action="proses-delete-note.php" method="post">
    <input type="hidden" name="note_idxxx" value="<?= htmlspecialchars($note['note_idxxx']) ?>">
    <button type="submit">Hapus Catatan</button>
</form>
    <br>
    <a href="notes.php">Batal</a>
</body>
</html>