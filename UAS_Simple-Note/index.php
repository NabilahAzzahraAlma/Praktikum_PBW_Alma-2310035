<?php
session_start();
if (isset($_SESSION['login'])) {
    header("Location: note.php");
    exit;
} else {
    header("Location: login.php");
    exit;
}
