<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { // cek form dikirim lewat metode POST
    $var_nama = $_POST['nama']; // Ambil data 'nama' dari form
    $var_email = $_POST['email']; // Ambil data 'email' dari form

    echo "<h2>Data yang Anda Kirim:</h2>"; // tampil judul hasil input
    echo "Nama: $var_nama <br>"; // tampil nama yang telah diinput
    echo "Email: $var_email <br>"; // tampil email yang telah diinput
}
?>
<!-- 
Validasi metode POST agar data dikirim melalui form sebelum diproses.
Ambil data input dari pengguna melalui superglobal $_POST.
tampil hasil input dengan format HTML menggunakan echo. -->