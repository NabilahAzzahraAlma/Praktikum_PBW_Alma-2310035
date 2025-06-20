<?php include 'proses-detail-note.php';
if (!isset($_SESSION['login'])) {
    header("Location: login.php?msg=" . urlencode("Silahkan login terlebih dahulu!"));
    exit;
} else {
?>
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <title>SiCatet | Detail Catatan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                min-height: 100vh;
                background: linear-gradient(180deg, #402DAE 0%, #BD63D1 100%);
            }

            .card.shadow-dark {
                box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.5) !important;
            }

            .note-box {

                margin-top: 5px;
                background-color: #e9ecef;
                /* abu-abu terang seperti input form Bootstrap */
                padding: 5px;
                border-radius: 4px;
                border: none;
                min-height: 38px;
            }

            /* Khusus untuk isi catatan (agar tampak seperti textarea besar) */
            .note-box.note-content {
                min-height: 150px;
                /* atur sesuai kebutuhan */
                white-space: pre-wrap;
                /* agar line break dari teks ditampilkan */
            }
        </style>
        <link rel="shortcut icon" href="./public/img/icon.png" />
    </head>

    <body>
        <div class="container mt-5">
            <div class="card shadow-dark">
                <div class="card-body">
                    <h3 class="card-title mb-4">Detail Catatan Anda</h3>
                    <div class="note-field mb-3">
                        <label>Judul:</label>
                        <p class="note-box ps-3"><?= htmlspecialchars($note['note_title'] ?? ' ') ?></p>
                    </div>
                    <div class="note-field mb-3">
                        <label>Tags:</label>
                        <p class="note-box ps-3 "><?= htmlspecialchars($note['note_tagxx'] ?? ' ') ?></p>
                    </div>
                    <div class="note-field mb-3">
                        <label>Waktu Dibuat:</label>
                        <p class="note-box ps-3"><?= htmlspecialchars($note['note_times'] ?? ' ') ?></p>
                    </div>
                    <div class="note-field mb-3">
                        <label>Isi Catatan:</label>
                        <div class="note-box ps-3 note-content"><?= nl2br(htmlspecialchars($note['note_cntnt'])) ?></div>
                    </div>
                    <hr>
                    <div class="button-group d-flex justify-content-end gap-2 mt-3">
                        <a href="proses-delete-note.php?id=<?= $note['note_idxxx'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus catatan ini?');">
                            <button class="btn btn-secondary">Delete</button>
                        </a>
                        <a href="edit-note.php?id=<?= $note['note_idxxx'] ?>">
                            <button class="btn btn-success">Edit</button>
                        </a>
                        <a href="note.php">
                            <button class="btn btn-primary">Kembali</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>