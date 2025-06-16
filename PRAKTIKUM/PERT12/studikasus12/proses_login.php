<!-- session_start();
$_SESSION['username'] = 'andi';
$_SESSION['is_logged_in'] = true;

session_start();
echo $_SESSION['username']; // Output: andi

session_unset();
session_destroy(); -->


<?php
session_start();
include 'koneksi_db.php'; // koneksi menggunakan MySQLi OOP


// Proses jika form dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $username = $_POST['username'];
   $password = $_POST['password'];


   // Cek user di database
   $stmt = $conn->prepare("SELECT id, nama, katasandi FROM pengguna WHERE nama = ? AND katasandi = ?");
   $stmt->bind_param("ss", $username,$password);
   $stmt->execute();


   $result = $stmt->get_result();


   // Validasi hasil
   if ($result->num_rows === 1) {
      
       $user = $result->fetch_assoc();
      
       $_SESSION['id'] = $user['id'];
       $_SESSION['nama'] = $user[‘nama’];
       $_SESSION['login_Un51k4'] = true;
       header("Location: index.php");
       exit;
      
   } else {


     header("Location: login.php?message=" . urlencode("password salah broo..."));
   }


   $stmt->close();
}
?>