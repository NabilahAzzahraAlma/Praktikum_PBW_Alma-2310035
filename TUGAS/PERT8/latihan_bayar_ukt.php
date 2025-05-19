<!-- Latihan praktikum dua
Buatkan fitur menu diskon pembayaran mahasiswa dengan ketentuan sebagai berikut :
a. Inputkan data mahasiswa dengan atribut npm, nama, prodi, semester dan biaya ukt
(dalam rupiah)
b. Jika mahasiswa membayar ukt >= Rp. 5.000.000,- maka diskon 10%
c. Jika mahasiswa membayar ukt >= Rp. 5.000.000,- dan > 8 semester maka diskonnya
ditambah 5% menjadi 15 % -->

<!-- Latihan Praktikum - Diskon Pembayaran Mahasiswa -->
<!DOCTYPE html> <!-- Menentukan tipe dokumen HTML -->
<html lang="id"> <!-- Menggunakan bahasa Indonesia -->
<head>
    <meta charset="UTF-8"> <!-- Mengatur karakter encoding -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Responsif di perangkat mobile -->
    <title>Diskon Pembayaran Mahasiswa</title> <!-- Judul halaman -->
     <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Inter", sans-serif;
            background-color: #eef1f5;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        header {
            background-color: #8a1c2c;
            color: white;
            padding: 30px 20px;
            text-align: center;
            font-size: 2em;
            font-weight: bold;
        }

        .container {
            max-width: 500px;
            margin: 30px auto;
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"], input[type="number"] {
            width: 90%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #327eff;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #1e60d4;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <header>Diskon Pembayaran Mahasiswa</header>
    <div class="container">
    <h2>Form Pembayaran UKT</h2> <!-- Judul form -->
    
    <!-- Form untuk input data mahasiswa -->
    <form method="post" action=""> <!-- metode POST -->
        NPM: <input type="text" name="npm" required><br><br> <!-- isi Input NPM-->
        Nama: <input type="text" name="nama" required><br><br> <!-- Input Nama-->
        Prodi: <input type="text" name="prodi" required><br><br> <!-- Input Program Studi -->
        Semester: <input type="number" name="semester" required><br><br> <!-- Input Semester -->
        Biaya UKT: <input type="number" name="biaya_ukt"  min="0" required><br><br><!-- Validasi HTML: min '0' Input biaya UKT -->
        <input type="submit" value="Proses"> <!-- Tombol submit untuk mengirim data -->
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") { // Cek form kirim lewat metode POST
        $npm = $_POST["npm"]; // Ambil nilai NPM dari form
        $nama = $_POST["nama"]; // Ambil nama mahasiswa dari form
        $prodi = $_POST["prodi"]; // Ambil program studi dari form
        $semester = $_POST["semester"]; // Ambil semester dari form
        $biaya_ukt = $_POST["biaya_ukt"]; // Ambil biaya UKT dari form
        $diskon = 0; // Variabel simpan diskon

        // Penentuan diskon dari ketentuan
        if ($biaya_ukt >= 5000000) { // Jika biaya UKT lebih dari Rp. 5.000.000,-
            $diskon = 10; // Diskon 10%
            if ($semester > 8) { // Jika mahasiswa berada di semester lebih dari 8
                $diskon = 15; // Diskon menjadi 15%
            }
        }

        // Hitung jumlah yang harus dibayar
        $jumlah_diskon = ($diskon / 100) * $biaya_ukt; // Hitung jumlah potongan diskon
        $total_bayar = $biaya_ukt - $jumlah_diskon; // Hitung total yang harus dibayar

        // Tampilkan hasil bayar dan diskon
        echo "<h3>Detail Pembayaran</h3>"; // Tampilkan judul hasil pembayaran
        echo "NPM: $npm <br>"; // Tampilkan NPM
        echo "Nama: $nama <br>"; // Tampilkan Nama
        echo "Prodi: $prodi <br>"; // Tampilkan Program Studi
        echo "Semester: $semester <br>"; // Tampilkan Semester
        echo "Biaya UKT: Rp. " . number_format($biaya_ukt, 0, ',', '.') . ",-<br>"; // Format angka biaya UKT
        echo "Diskon: $diskon% <br>"; // Tampilkan jumlah diskon dalam persen
        echo "Yang Harus Dibayar: Rp. " . number_format($total_bayar, 0, ',', '.') . ",-"; // Format angka total pembayaran
    }
    ?>
    </div>

    <footer>
        &copy; <?= date("Y") ?> Praktikum Pemrograman Berbasis Web
    </footer>
</body>
</html>

<!-- Output Harapan: Detail Pembayaran
    NPM: 12345678035
    Nama: Alma
    Prodi: Informatika
    Semester: 4
    Biaya UKT: Rp. 5.900.000,-
    Diskon: 15%
    Yang Harus Dibayar: Rp. 5.015.000,--->


<!-- Penjelasan Fitur:
- Form input data mahasiswa (NPM, Nama, Prodi, Semester, Biaya UKT).
- Percabangan if-elseif untuk menentukan diskon:
- Jika UKT ≥ Rp. 5.000.000,-, diskon 10%. Jika UKT ≥ Rp. 5.000.000,- & semester > 8, diskon 15%.
- Format uang dengan number_format() dan tidak bisa diisi minus.
- Hitungan total pembayaran setelah potongan diskon. -->