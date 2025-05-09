<!-- disini kita satukan untuk HTML, PHP dan CSS nya sebab kode masih singkat dan belum Kompleks,
    disertakan juga penjelasan pada setiap baris nya menurut pemahaman saya 
    Untuk css nya saya menggunakan template dari pertemuan 3 PBW-->

<!DOCTYPE html>
<html lang="id">
<head>
    <!-- tipe dokumen HTML5 Bahasa Indonesia -->
    <meta charset="UTF-8"> <!-- atur encoding karakter ke UTF-8 untuk berbagai karakter -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Atur viewport halaman responsif di perangkat mobile -->
    <title>Kalkulator Total Pembelian</title> <!-- Judul halaman tampilan di tab browser -->
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <!-- Ambil font 'Inter' dari Google Fonts untuk tampilan teks -->
    <style>
        /* Style CSS tampilan halaman */
        body {
            margin: 30px; /* margin tidak nempel ke tepi window */
            font-family: 'Inter', sans-serif; /* font 'Inter' fallback ke sans-serif */
            background-color: #eef1f5; /* Warna background*/
        }
        
        header {
            max-width: 720px; /* lebar maksimum header menjadi 800px */
            margin: 0 auto;   /* Menempatkan header di tengah halaman dengan margin horizontal otomatis */
            padding: 20px;    /* Padding sebagai ruang dalam untuk teks di header */
            background-color: #8a1c2c; /* Contoh warna latar belakang header */
            color: white;     /* Warna teks header */
            font-size: 2em;   /* Ukuran font header */
            font-weight: bold;/* Menebalkan teks header */
            text-align: center; /* tengahkan teks header */
            border-radius: 12px; /* bulat sudut container */
            box-shadow: 0 5px 15px rgba(0,0,0,0.1); /*efek bayangan sekitar container*/
        }

        .container {
            width: 100%; /* Lebar container sesuai lebar layar */
            max-width: 710px; /* Lebar maksimum konsistensi desain */
            background: white; /* background container putih */
            margin: 10px auto; /* Margin vertikal 10px, dan horizontal otomatis untuk center container */
            padding: 20px; /* Padding dalam container agar isi tidak ketepi */
            border-radius: 12px; /* bulat sudut container */
            box-shadow: 0 5px 15px rgba(0,0,0,0.1); /*efek bayangan sekitar container*/
        }
        label {
            font-weight: 500; /* Tebal teks label*/
            display: block; /* tampilan label elemen blok untuk baris baru */
            margin-bottom: 8px; /* Jarak di bawah label pemisah dari elemen berikutnya */
            margin-top: 16px;
        }

        /* Aturan untuk elemen <select> */
        select {
            width: 100%;              /* Lebar elemen disesuaikan dengan lebar container */
            max-width: 700px;         /* Lebar maksimum tetap konsisten dengan container */
            padding: 10px;            /* Padding agar isi tidak menempel pada tepi elemen */
            border-radius: 6px;       /* Sudut elemen dibulatkan untuk tampilan yang lebih modern */
            border: 1px solid #ccc;   /* Mengatur garis batas tipis berwarna abu-abu */
            font-size: 1.1rem;        /* Ukuran font yang cukup besar untuk kenyamanan membaca */
        }

        /* Aturan untuk elemen <input> dengan tipe number */
        input[type="number"] {
            width: 100%;              /* Lebar elemen disesuaikan agar mengisi lebar container */
            max-width: 680px;         /* Lebar maksimum diatur agar konsisten dengan aturan container */
            padding: 10px;            /* Padding memberikan ruang di dalam input agar tidak menempel pada tepi */
            border-radius: 6px;       /* Sudut input dibulatkan untuk tampilan yang seragam */
            border: 1px solid #ccc;   /* Menambahkan garis batas tipis berwarna abu-abu pada input */
            font-size: 1.1rem;        /* Ukuran font di dalam input agar teks mudah dibaca */
        }

        button {
            max-width: 700px; /* Lebar maks tombol*/
            width: 100%; /* Lebar tombol isi seluruh lebar container */
            padding: 12px; /* Padding tombol di sekitar teks tombol */
            background-color: #327eff; /* Warna latar tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Menghapus border default tombol */
            border-radius: 6px; /* Membulatkan sudut tombol */
            font-weight: bold; /* Teks tombol dibuat tebal */
            cursor: pointer; /* ikon pointer saat mouse melayang di atas tombol indikasi klik */
            margin-top: 16px;
        }
        button:hover {
            background-color: #1e60d4; /* warna latar tombol saat hover*/
        }
        .result {
            margin-top: 30px; /* jarak atas area hasil dari form */
            background-color: #f8f9fa; /* Warna background area hasil */
            padding: 20px; /* Padding hasil*/
            border-radius: 8px; /* Bulatan sudut area hasil */
            border-left: 5px solid #327eff; /* garis aksen di kiri area hasil */
        }
        .result p {
            margin: 6px 0; /* jarak vertikal antar paragraf dalam area hasil */
        }
        .bold {
            font-weight: bold; /* Kelas untuk tebalin teks*/
        }
    </style>
</head>
<body>

<header>Perhitungan Total Pembelian</header> <!-- menampilkan judul -->

<div class="container"> <!-- wadah form dan komponen lainnya -->
    <form method="POST"> <!-- Formulir metode POST untuk kirim inputan ke server -->
        <label for="barang">Pilih Barang:</label>  <!-- Label select, instruksi user suruh pilih barang -->
        <select name="barang" id="barang" required> <!-- Elemen select pilih barang; atribut 'required' agar pilihan harus dibuat -->
            <?php
            // Definisikan array $daftar_barang untuk simpan informasi nama barang dan harga
            $daftar_barang = [ // Informasi harga barang dalam array
                "Keyboard" => 150000,  // Nama barang "Keyboard" dengan harga 150000
                "Mouse" => 50000,      // "Mouse" 80000
                "Monitor" => 1200000,   // "Monitor" 1200000
                "Headphone" => 80000 // "Headphone" 80000
            ];
            // Iterasi array $daftar_barang untuk tiap opsi select
            foreach ($daftar_barang as $barang => $harga) {
                // cetak <option> dengan nilai nama barang dan harga,
                // tampilkan teks hasil diformat agar mudah dibaca user (hasil cari referensi)
                echo "<option value='$barang-$harga'>$barang - Rp " . number_format($harga, 0, ',', '.') . "</option>";
            }
            ?>
        </select>

        <label for="jumlah">Jumlah Beli:</label> <!-- Label input jumlah pembelian -->
        <input type="number" name="jumlah" id="jumlah" min="1" required> <!-- Input tipe number masukkan jumlah pembelian;
        di 'min="1"' agar pengguna tidak bisa memasukkan angka kurang dari 1 -->

        <button type="submit">Hitung</button> <!-- Tombol 'Hitung' submit kirim formulir ke server-->
    </form>
    <!-- 
    <head> untuk encoding, viewport, judul, dan font link gaya CSS.
    Style CSS di jadikan satu karena belum kompleks (seperti body, header, .container, label, dsb.)
    <body> berisi header, container, dan formulir.
        Formulir dengan metode POST agar data dikirim ke server secara aman.
        <label> dan <select> untuk pilih barang, data harga dalam array lalu iterasi lewat PHP.
        Input jumlah dari user nilai tidak kuarng dari 1.
        Tombol submit kirim data untuk diproses. 
    -->

    <?php
    // cek metode request yang digunakan adalah POST,
    // cek formulir (form) telah dikirimkan.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Mendefinisikan konstanta PAJAK dengan nilai 0.1 (atau 10%),
    // agar nilai pajak tidak berubah selama eksekusi program.
    define("PAJAK", 0.1);

    // Mengambil value dari input 'barang' yang dipilih user 
    // pisah string lewat tanda "-" jadi hhasilnya array.
    // Misal: "Keyboard-150000" akan pisah menjadi array: ["Keyboard", "150000"].
    $barangData = explode("-", $_POST["barang"]);

    // Ambil nama barang dari elemen pertama array lalu ubah huruf pertamanya menjadi kapital.
    $namaBarang = ucfirst($barangData[0]);

    // Ambil harga satuan dari elemen kedua array dan konversi ke tipe data integer.
    $hargaSatuan = (int) $barangData[1];

    // Ambil nilai jumlah beli dari input form dan konversi ke integer.
    // Nilai jumlah barang yang dibeli oleh pelanggan.
    $jumlah = (int) $_POST["jumlah"];

    // Hitung total harga sebelum pajak (kalikan harga satuan sama jumlah pembelian).
    $total = $hargaSatuan * $jumlah;

    // Hitung besar pajak lewat kalikan total harga dengan konstanta PAJAK.
    // Pajak selalu 10% dari total harga.
    $pajak = PAJAK * $total;

    // Jumlahkan total harga sebelum pajak dan nilai pajak untuk mendapatkan total bayar.
    $totalBayar = $total + $pajak;

    // Tampilkan hasil hitung nya ke web lewat HTML bersama PHP.
    // Function number_format() buat memformat angka sesuai penulisan Rupiah. dari referensi
    echo "<div class='result'>
            <p>Nama Barang: $namaBarang</p>
            <p>Harga Satuan: Rp " . number_format($hargaSatuan, 0, ',', '.') . "</p>
            <p>Jumlah Beli: $jumlah</p>
            <p>Total Harga (Sebelum Pajak): Rp " . number_format($total, 0, ',', '.') . "</p>
            <p>Pajak (10%): Rp " . number_format($pajak, 0, ',', '.') . "</p>
            <p class='bold'>Total Bayar: Rp " . number_format($totalBayar, 0, ',', '.') . "</p>
        </div>";
}
?>
<!-- 
1. Cek Request untuk Kode mulai cek formulir telah di input lalu submit (referensi: metode POST).
2. Konstanta PAJAK untuk 10% dideklarasi konstanta.
3. Ambilan dan Proses Data inputan form, dari pilihan barang dan jumlah pembelian, menjadi string dan tipe data nya masing-masing.
4. Perhitungan untuk Total harga, pajak, dan total bayar dihitung dengan operasi aritmatika dasar.
5. Output untuk hasil hitung halaman HTML. 
-->

</div>

</body>
</html>