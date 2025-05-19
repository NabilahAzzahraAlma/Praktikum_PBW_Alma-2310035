    <?php
    // 1. Buat program menggunakan switch untuk menentukan jenis kendaraan berdasarkan jumlah roda.
    $jumlah_roda = 2;
    switch ($jumlah_roda) {
    case 2:
        echo "Jenis Kendaraan: Motor <br>";
        break;
    case 3:
        echo "Jenis Kendaraan: Becak/Bajaj<br>";
        break;
    case 4:
        echo "Jenis Kendaraan: Mobil Biasa/Bus<br>";
        break;
    case 6:
        echo "Jenis Kendaraan: Truk<br>";
        break;
    default:
        echo "Jenis Kendaraan tidak diketahui.<br>";
    }
    ?>

    <!-- output langsung hasil tanpa input user -->