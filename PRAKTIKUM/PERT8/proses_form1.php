<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Cek form dikirim lewat metode POST
    $nama = $_POST["nama"]; // Ambil input Nama dari form
    $email = $_POST["email"]; // Ambil input Email dari form
    $usia = $_POST["usia"]; // Ambil input Usia dari form
    $gender = $_POST["gender"]; // Ambil input Jenis Kelamin dari form

    echo "<h2>Data yang Anda Kirim:</h2>"; // tampilkan judul hasil input
    echo "Nama: $nama <br>"; // tampilkan Nama yang telah diinput
    echo "Email: $email <br>"; // tampilkan Email yang telah diinput
    echo "Usia: $usia <br>"; // tampilkan Usia yang telah diinput
    echo "Jenis Kelamin: $gender <br>"; // tampilkan Jenis Kelamin yang telah dipilih
}
?>

<!--
Cek metode POST sebelum ambil data.
ambil input dari form lewat $_POST.
tampilkan hasil input dengan format HTML dengan echo. -->