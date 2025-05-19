<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percabangan Latihan Praktikum</title>
</head>
<body>
    <?php
    // Percabangan: program respons kondisi tertentu dengan menjalankan blok kode berdasarkan evaluasi ekspresi, seperti menggunakan if, if-else, atau if-elseif-else. Ambil keputusan dalam program secara logis.
    $nilai = 75;
    if ($nilai >= 80) {
        echo "Nilai A <br>";
    } elseif ($nilai >= 70) {
        echo "Nilai B <br>";
    } else {
        echo "Nilai C <br>";
    }
    // program cek nilai dari variabel $nilai. Jika atas 80, cetak “Nilai A”. Jika masih di atas 70, cetak “Nilai B”. Jika tidak terpenuhi, cetak “Nilai C”.

    // Contoh implementasi if dua kondisi
    $umur = 20;
    $ktp = true;
    if ($umur >= 17 && $ktp) {
    echo "Boleh memilih <br>";
    }
    // kedua kondisi ($umur >= 17 dan $ktp == true) harus terpenuhi agar blok kode jalan. Jika salah satu false, maka false. Kondisi if dipaki validasi input user, filter data kosong
    if (!empty($_POST['nama'])) {
    echo "Nama: " . htmlspecialchars($_POST['nama']);
    } else {
    echo "Nama tidak boleh kosong!";
    }
    ?>
</body>
</html>