<!-- Latihan praktikum
1. Buat program menggunakan switch untuk menentukan jenis kendaraan berdasarkan jumlah roda.
2. Gunakan for untuk mencetak bilangan genap dari 2 sampai 10.
3. Buat array daftar nama hewan dan tampilkan menggunakan foreach.
4. Gunakan ternary operator untuk menentukan apakah angka adalah genap atau ganjil.
5. Buat untuk setiap jawaban soal no 1 sampai 4 dalam file include dalam navigasi -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Latihan Praktikum Modul Bab 8</title>
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

        nav {
            background-color: #327eff;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 800px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline-block;
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: text-decoration 0.3s;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        .container {
            padding: 20px;
            background: white;
            margin: 20px auto;
            max-width: 800px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
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
    <!-- 5. Buat untuk setiap jawaban soal no 1 sampai 4 dalam file include dalam navigasi -->
     <!-- Navigasi dengan GET, jadi tiap klik menu akan ubah URL jadi ?page=nama_file. -->
    <header>Latihan Praktikum - Modul Bab 8</header>
     <nav>
        <ul>
            <li><a href="?page=switch_jenis_kendaraan">Jenis Kendaraan</a></li>
            <li><a href="?page=for_bilangan_genap">Bilangan Genap</a></li>
            <li><a href="?page=array_daftar_hewan">Daftar Hewan</a></li>
            <li><a href="?page=ternary_cek_genap_ganjil">Cek Genap/Ganjil</a></li>
        </ul>
    </nav>
    <div class="container">
        <?php
        // Cek parameter page tersedia?
        if (isset($_GET['page'])) {
            $page = $_GET['page']; // Ambil nilai parameter GET
            $file = $page . ".php"; // Susun nama file dari parameter

            // Cek file tersedia sebelum di-include
            if (file_exists($file)) {
                include $file; // file yang sesuai disertakan sama pilihan user
            } else {
                echo "<p>Halaman tidak ditemukan.</p>";
            }
        }
        ?>
    </div>

    <footer>
        &copy; <?= date("Y") ?> Praktikum Pemrograman Berbasis Web
    </footer>

</body>
</html>