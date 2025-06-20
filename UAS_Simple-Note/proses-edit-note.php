<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $user_id = $_SESSION['id'];
        $id = $_POST['id'];
   $title = $_POST['title'];
   $tag = trim($_POST['tag']);
   $isi = $_POST['isi'];

      if (strpos($tag, ',') === false) {
        header("Location: edit-note.php?id=".urlencode($id)."&msg=" . urlencode("Tags harus dipisahkan dengan koma, misalnya: kerja,rumah,belajar."));
        exit();
    }


   $stmt = $conn->prepare("UPDATE notes SET note_title=?, note_tagxx=?, note_cntnt=? WHERE note_idxxx=? AND user_idxxx=?");
   $stmt->bind_param("ssssi", $title, $tag, $isi, $id, $user_id);
   if ($stmt->execute()) {
            header("Location: note.php?msg=" . urlencode("Catatan berhasil diperbarui!"));
   } else {
        header("Location: edit-note.php?id=".urlencode($id)."&msg=" . urlencode("Gagal memperbarui catatan: " . urlencode($stmt->error)));
   }
}else{
    header("Location: note.php?id=".urlencode($id)."&msg=" . urlencode("Metode tidak valid!"));
}
?>
