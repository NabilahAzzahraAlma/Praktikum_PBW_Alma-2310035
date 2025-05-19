<?php
if (isset($_GET['nama'])) {
    $var_nama = $_GET['nama'];
    echo "Halo, $var_nama! Selamat datang.";
} else {
    echo "Nama tidak ditemukan dalam URL.";
}
?>
<!-- Penjelasan:
Superglobal $_GET digunakan untuk menangkap nilai dari query string di URL.
isset($_GET['nama']) memastikan bahwa parameter nama ada sebelum digunakan.
Jika parameter nama diberikan dalam URL, maka akan ditampilkan.
Jika tidak ada, pesan Nama tidak ditemukan dalam URL akan muncul. -->