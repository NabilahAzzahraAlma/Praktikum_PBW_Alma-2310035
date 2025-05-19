<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modul Pertemuan 8 - PBW</title>
  </head>
  <body>
    <?php
    // Contoh sederhana penggunaan switch:
    $hari = "Senin";
    switch ($hari) {
    case "Senin":
        echo "Hari pertama kerja! <br>";
        break;
    case "jum'at":
        echo "Solat jumat!<br>";
        break;
    case "Minggu":
        echo "Libur akhir pekan!<br>";
        break;
    default:
        echo "Hari biasa.<br>";
    }
  // Output: Hari pertama kerja!

  // Contoh sederhana penggunaan for:
  for ($i = 1; $i <= 5; $i++) {
    echo "Angka ke-”.$i.”<br>";
  }
  // Output:
  // Angka ke-”.1.”
  // Angka ke-”.2.”
  // Angka ke-”.3.”
  // Angka ke-”.4.”
  // Angka ke-”.5.”

  // akses elemen dalam array menggunakan indeks numerik seperti contoh dibawah ini :
  $buah = ["Apel", "Jeruk", "Mangga"];
  for ($i = 0; $i < count($buah); $i++) {
    echo $buah[$i] . "<br>";
  }
  // Output:
  // Apel
  // Jeruk
  // Mangga  

  // Contoh penerapan perulangan while : 
  $nilai = 1;
  while ($nilai <= 5) {
    echo "Nilai: ". $nilai ."<br>";
    $nilai++;
  }
  // Output:
  // Nilai: 1
  // Nilai: 2
  // Nilai: 3
  // Nilai: 4
  // Nilai: 5

  // Contoh perulangan foreach : 
  $mahasiswa = [
    "10001" => "Andi",
    "10002" => "Budi",
    "10003" => "Citra"
  ];
  foreach ($mahasiswa as $nim => $nama) {
    echo "NIM: ". $nim .", Nama:". $nama."<br>";
  }
  // Output: 
  // NIM: 10001, Nama:Andi
  // NIM: 10002, Nama:Budi
  // NIM: 10003, Nama:Citra

  // Contoh penerapan Ternary Operator:
  $umur = 18;
  $status = ($umur >= 17) ? "Dewasa" : "Anak-anak";
  echo $status;
  // Output: Dewasa

  // Contoh syntax dasar Fungsi Include dan Require pada PHP 
  //include 'index.php';
  //require 'index.php';
  // Contoh Penggunaan:
  include 'header.php';
  require 'menu.php';
  // Output:
  // Beranda | Tentang | Kontak
  // Beranda | Tentang | Kontak
    ?>
  </body>
</html>
