<?php
include 'koneksi_db.php';
include 'nav.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? 0;
$pelanggan = null;

if ($id > 0) {
    // Ambil data pelanggan berdasarkan ID
    $stmt = $conn->prepare("SELECT * FROM Pelanggan WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $pelanggan = $result->fetch_assoc();
    $stmt->close();
}

// Jika pelanggan tidak ditemukan, lakukan redirect atau tampilkan pesan error
if (!$pelanggan) {
    echo "<script>
        alert('Pelanggan tidak ditemukan!');
        window.location.href = 'daftar_pelanggan.php';
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
   <title>Edit Pelanggan</title>
</head>
<body>
   <div class="container mt-4">
       <h2>Edit Data Pelanggan</h2>
       <form method="post" action="proses_edit_pelanggan.php">
           <input type="hidden" name="id" value="<?= $pelanggan['ID'] ?>">

           <div class="mb-3">
               <label for="nama" class="form-label">Nama</label>
               <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($pelanggan['Nama'] ?? '') ?>" required>
           </div>
           <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($pelanggan['Email'] ?? '') ?>" required>
           </div>
           <div class="mb-3">
               <label for="telepon" class="form-label">Telepon</label>
               <input type="text" class="form-control" id="telepon" name="telepon" value="<?= htmlspecialchars($pelanggan['Telepon'] ?? '') ?>" required>
           </div>
           <button type="submit" class="btn btn-success">Simpan Perubahan</button>
       </form>
   </div>
</body>
</html>