<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | SiPerpus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Daftar Akun Sistem Perpustakaan</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_GET['message']) ?></div>
    <?php endif; ?>

    <form method="post" action="proses_register.php">
        <div class="mb-3">
            <label for="username" class="form-label">Nama Pengguna:</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
        </div>

        <div class="mb-3">
            <label for="cpassword" class="form-label">Konfirmasi Kata Sandi:</label>
            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Masukkan Ulang Password" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Pilih Peran:</label>
            <select name="role" id="role" class="form-control" required>
                <option value="">-- Pilih Peran --</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="dekan">Dekan</option>
                <option value="kaprodi">Kaprodi</option>
                <option value="rektor">Rektor</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>
        <p class="login-register-text">Sudah punya akun? <a href="login.php">Login di sini</a>.</p>
    </form>
</body>
</html>
