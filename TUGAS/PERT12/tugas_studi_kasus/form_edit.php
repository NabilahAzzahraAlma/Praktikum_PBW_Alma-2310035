<?php
include 'koneksi_db.php';
include 'nav.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 0;
$book = null;

if ($id > 0) {
    // Ambil data buku berdasarkan ID
    $stmt = $conn->prepare("SELECT * FROM buku WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $book = $result->fetch_assoc();
    $stmt->close();
}

// Jika buku tidak ditemukan, lakukan redirect atau tampilkan pesan error
if (!$book) {
    echo "<script>
        alert('Buku tidak ditemukan!');
        window.location.href = 'index.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <title>Edit Buku</title>
</head>
<body>
   <div class="container mt-4">
       <h2>Edit Data Buku</h2>
       <form method="post" action="proses_edit.php">
           <input type="hidden" name="id" value="<?= $book['ID'] ?>">

           <div class="mb-3">
               <label for="judul" class="form-label">Judul</label>
               <input type="text" class="form-control" id="judul" name="judul" value="<?= htmlspecialchars($book['Judul'] ?? '') ?>" required>
           </div>
           <div class="mb-3">
               <label for="penulis" class="form-label">Penulis</label>
               <input type="text" class="form-control" id="penulis" name="penulis" value="<?= htmlspecialchars($book['Penulis'] ?? '') ?>" required>
           </div>
           <div class="mb-3">
               <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
               <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= $book['Tahun_Terbit'] ?? '' ?>" required>
           </div>
           <div class="mb-3">
               <label for="harga" class="form-label">Harga</label>
               <input type="number" class="form-control" id="harga" name="harga" value="<?= $book['Harga'] ?? '' ?>" step="0.01" required>
           </div>
           <div class="mb-3">
               <label for="stok" class="form-label">Stok</label>
               <input type="number" class="form-control" id="stok" name="stok" value="<?= $book['stok'] ?? '' ?>" required>
           </div>
           <button type="submit" class="btn btn-success">Simpan Perubahan</button>
       </form>
   </div>
</body>
</html>
