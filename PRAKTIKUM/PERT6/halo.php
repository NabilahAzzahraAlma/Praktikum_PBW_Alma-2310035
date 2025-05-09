<?php 
echo "Halo, selamat datang di dunia PHP!"; 
?>

<!-- kode PHP yang menggunakan beberapa variabel: -->
<?php 
$nama = "Budi"; 
$umur = 20; 
// Menampilkan nilai variabel 
echo "Nama: " . $nama . "<br>"; 
echo "Umur: " . $umur . " tahun<br>"; 
?>

<!-- Konstanta -->
define("NAMA_KONSTANTA", nilai);
<?php 
define("SITE_NAME", "unsika.ac.id"); 
define("VERSION", "1.0"); 
echo "Selamat datang di " . SITE_NAME . "<br>"; 
echo "Versi Sistem: " . VERSION . "<br>"; 
?> 

<!-- string -->
<?php 
$nama = "Andi"; 
echo "Nama saya adalah”. $nama; 
?>

// integer
<?php 
$umur = 25; 
echo "Umur saya”. $umur. “tahun"; 
?> 

// float
<?php 
$berat = 55.5; 
echo "Berat badan saya". $berat ."kg"; 
?>

// boolean
<?php 
   $isLogin = true; 
?> 
