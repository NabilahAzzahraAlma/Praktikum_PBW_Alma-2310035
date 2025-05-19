<!-- Latihan praktikum
Kerjakan latihan praktikum dengan ketentuan sebagai berikut:
a. Buat menu/link baru pada progres praktikum sebelumnya untuk latihan pertemuan ini
b. Buatlah file PHP bernama latihan_nilai.php yang akan menerima input dari pengguna
berupa Nama mahasiswa dan Nilai ujian. Gunakan struktur form HTML untuk
mengambil input, lalu gunakan struktur if-elseif-else dan operator perbandingan
untuk menentukan predikat nilai huruf berdasarkan ketentuan berikut:
 -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Nilai Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 30px;
            font-family: 'Inter', sans-serif;
            background-color: #eef1f5;
        }

        header {
            max-width: 720px;
            margin: 0 auto;
            padding: 20px;
            background-color: #8a1c2c;
            color: white;
            font-size: 2em;
            font-weight: bold;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .container {
            width: 100%;
            max-width: 710px;
            background: white;
            margin: 20px auto;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        label {
            font-weight: 500;
            display: block;
            margin-top: 16px;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            max-width: 680px;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 1.1rem;
        }

        input[type="submit"] {
            width: 100%;
            max-width: 700px;
            padding: 12px;
            background-color: #327eff;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
        }

        input[type="submit"]:hover {
            background-color: #1e60d4;
        }

        .result {
            margin-top: 30px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 5px solid #327eff;
        }

        .result p {
            margin: 6px 0;
        }

        .bold {
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>Input Nilai Mahasiswa</header>
<div class="container">    
    <!-- Form untuk menginput Nama dan Nilai -->
    <form method="post" action="">
        Nama: <input type="text" name="nama" required><br><br> <!-- Input Nama, wajib diisi -->
        Nilai: <input type="number" name="nilai" min="0" max="100" required><br><br> <!-- Input Nilai, hanya antara 0 - 100 -->
        <input type="submit" value="SUBMIT"> <!-- Tombol submit untuk mengirim data -->
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // Cek form dikirim melalui POST
        $nama = $_POST["nama"]; // Ambil input Nama dari form
        $nilai = $_POST["nilai"]; // Ambil input Nilai dari form
        $predikat = ""; // Variabel Simpan predikat nilai
        $status = ""; // Variabel Simpan status kelulusan

        // Penentuan predikat lewat nilai
        if ($nilai >= 85 && $nilai <= 100) {
            $predikat = "A"; // Nilai 85-100 mendapat predikat A
            $status = "Lulus"; // Lulus jika mendapat A
        } elseif ($nilai >= 75 && $nilai <= 84) {
            $predikat = "B"; // Nilai 75-84 mendapat predikat B
            $status = "Lulus"; // Lulus jika mendapat B
        } elseif ($nilai >= 65 && $nilai <= 74) {
            $predikat = "C"; // Nilai 65-74 mendapat predikat C
            $status = "Lulus"; // Lulus jika mendapat C
        } elseif ($nilai >= 50 && $nilai <= 64) {
            $predikat = "D"; // Nilai 50-64 mendapat predikat D
            $status = "Tidak Lulus"; // Tidak lulus jika mendapat D
        } elseif ($nilai >= 0 && $nilai <= 49) {
            $predikat = "E"; // Nilai 0-49 mendapat predikat E
            $status = "Tidak Lulus"; // Tidak lulus jika mendapat E
        } else {
            echo "<h3>Error: Nilai harus antara 0 dan 100!</h3>"; // Pesan error jika nilai di luar batas
            exit; // Selesaikan eksekusi jika nilai tidak valid
        }

        // Tampilkan hasil penilaian
        echo "<div class='result'>";
        echo "<p><span class='bold'>Nama:</span> $nama</p>";
        echo "<p><span class='bold'>Nilai:</span> $nilai</p>";
        echo "<p><span class='bold'>Predikat:</span> $predikat</p>";
        echo "<p><span class='bold'>Status:</span> $status</p>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>

<!-- Output harapan:
    Nama : Alma
    Nilai : 100
    Predikat : A
    Status : Lulus -->

<!-- Penjelasan:
- Formulir kirim data ke halaman yang sama menggunakan metode POST.
- Validasi nilai dilakukan dengan 'if-elseif-else' sesuai aturan predikat huruf.
- Jika nilai di luar rentang 0-100, akan muncul pesan "Tidak valid". 
- min="0" dan max="100" pada input nilai agar pengguna tidak bisa memasukkan angka di luar rentang
- Jika nilai di luar rentang 0-100, program akan menampilkan pesan "Error: Nilai harus antara 0 dan 100!", tanpa memproses predikat.
- Cek status lulus Jika ≥ 65, status "Lulus". Jika ≤ 64, status "Tidak Lulus". -->