<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 7 PBW</title>
</head>
<body>
<?php 
echo "Halo, selamat datang di dunia PHP!<br>"; 
?>

<!-- Kode PHP yang menggunakan beberapa variabel -->
<?php 
$nama = "Budi";
$umur = 20; 
// Menampilkan nilai variabel 
echo "Nama: " . $nama . "<br>"; 
echo "Umur: " . $umur . " tahun<br>"; 
?>

<!-- Konstanta dengan define-->
<?php 
define("SITE_NAME", "unsika.ac.id"); 
define("VERSION", "1.0"); 
echo "Selamat datang di " . SITE_NAME . "<br>"; 
echo "Versi Sistem: " . VERSION . "<br>"; 
?> 

<!-- String -->
<?php 
$nama = "Andi"; 
echo "Nama saya adalah " . $nama . "<br>"; 
?>

<!-- Integer -->
<?php 
$umur = 25; 
echo "Umur saya " . $umur . " tahun<br>"; 
?>

<!-- Float -->
<?php 
$berat = 55.5; 
echo "Berat badan saya " . $berat . " kg<br>"; 
?>

<!-- Boolean -->
<?php 
$isLogin = true; 
echo "Login status: " . ($isLogin ? "Aktif" : "Tidak Aktif") . "<br>"; 
?> 

<!-- Array -->
<?php 
$buah = ["apel", "jeruk", "mangga"]; 
echo "Buah favorit saya: " . $buah[1] . "<br>"; 
?> 

<!-- Object -->
<?php 
class Mahasiswa { 
    public $nama; 
    public function sapa() { 
        return "Halo, saya " . $this->nama . "<br>"; 
    } 
} 
$mhs = new Mahasiswa(); 
$mhs->nama = "Jeni"; 
echo $mhs->sapa(); 
?> 

<!-- Null -->
<?php 
$data = null; 
var_dump($data); 
echo "<br>";
?> 

<!-- Deklarasi variabel -->
<?php
$a = 10;
$b = 3;

// Penjumlahan (+)
$hasil_penjumlahan = $a + $b;
echo "Hasil penjumlahan ($a + $b) = $hasil_penjumlahan <br>";

// Pengurangan (-)
$hasil_pengurangan = $a - $b;
echo "Hasil pengurangan ($a - $b) = $hasil_pengurangan <br>";

// Perkalian (*)
$hasil_perkalian = $a * $b;
echo "Hasil perkalian ($a * $b) = $hasil_perkalian <br>";

// Pembagian (/)
$hasil_pembagian = $a / $b;
echo "Hasil pembagian ($a / $b) = $hasil_pembagian <br>";

// Modulus (%)
$hasil_modulus = $a % $b;
echo "Sisa hasil bagi ($a % $b) = $hasil_modulus <br>";

// Operator Increment (++)
$a++; // Menambah nilai $a sebanyak 1
echo "Nilai setelah increment ($a++) = $a <br>";

// Operator Decrement (--)
$b--; // Mengurangi nilai $b sebanyak 1
echo "Nilai setelah decrement ($b--) = $b <br>";
?>

</body>
</html>