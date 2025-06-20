<?php
  require 'connection.php';
  session_start();
  if(isset($_SESSION["login"])) {
    $note_id = $_GET['id'] ?? null;

    if (!$note_id) {
      echo "<script>
            alert('ID catatan tidak ditemukan atau tidak valid.');
            window.location.href = 'note.php';
          </script>";
      exit();
    }

  $stmt = $conn->prepare("SELECT note_idxxx, user_idxxx, note_title, note_tagxx, note_cntnt, note_times FROM notes WHERE note_idxxx = ?");
  $stmt->bind_param("s", $note_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $note = $result->fetch_assoc();
  $stmt->close();

  if (!$note) {
    echo "<script>
            alert('Catatan tidak ditemukan. Pastikan ID yang dikirim benar.');
            window.location.href = 'note.php';
          </script>";
    exit();
  }
}else {
  header("Location: login.php?msg=" . urlencode("Anda harus login terlebih dahulu."));
  exit();
}
?>
