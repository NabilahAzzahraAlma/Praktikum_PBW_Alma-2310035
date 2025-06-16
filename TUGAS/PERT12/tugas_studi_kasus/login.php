<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Login | SiPerpus</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
   <h2>Masuk ke Sistem Perpustakaan</h2>

   <?php if (isset($_GET['message'])): ?>
       <div class="alert alert-danger"><?= htmlspecialchars($_GET['message']) ?></div>
   <?php endif; ?>

   <form method="post" action="proses_login.php">
       <div class="mb-3">
           <label for="username" class="form-label">Nama Pengguna:</label>
           <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required>
       </div>

       <div class="mb-3">
           <label for="password" class="form-label">Kata Sandi:</label>
           <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
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

       <button type="submit" class="btn btn-primary">Login</button>
       <p class="login-register-text">Belum punya akun? <a href="register.php">Daftar di sini</a>.</p>
   </form>
</body>
</html>