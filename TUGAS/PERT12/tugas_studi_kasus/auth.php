<?php
function hanyaUntuk($roleDiperbolehkan) {
    if (!in_array($_SESSION['role'], (array)$roleDiperbolehkan)) {
        header("Location: index.php?message=" . urlencode("Akses ditolak untuk role: " . $_SESSION['role']));
        exit;
    }
}
?>