<?php
require 'connection.php';
session_start();
if(isset($_GET['id']) && isset($_SESSION['login'])){
  $note_id = $_GET['id'] ?? null;
  $user_id = $_SESSION['id'] ?? null;

$stmt = $conn->prepare("DELETE FROM notes WHERE note_idxxx = ? AND user_idxxx = ?");
$stmt->bind_param("si", $note_id, $user_id); ;

if ($stmt->execute()) {
  header("Location: note.php?msg=" . urlencode("Berhasil menghapus data."));
} else {
  header("Location: note.php?msg=" . urlencode("Gagal menghapus data."));
}
$stmt->close();
}else{
  header("Location: note.php?msg=" . urlencode("invalid method."));
  exit();
}

?>
