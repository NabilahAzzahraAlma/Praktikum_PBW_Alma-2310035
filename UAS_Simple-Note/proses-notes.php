<?php
require 'connection.php';
session_start();
$search_title = $_GET['title'] ?? '';
$id = $_SESSION["id"] ?? null;


$query = "SELECT note_idxxx, note_title, note_tagxx, note_times FROM notes WHERE user_idxxx = ?";

if (!empty($search_title)) {
    $query .= " AND note_title LIKE ?";
}

$stmt = $conn->prepare($query);

if (!empty($search_title)) {
    $search_judul = "%$search_title%";
    $stmt->bind_param("is", $id, $search_judul);
} 
else{
    $stmt->bind_param("i", $id);
}

$stmt->execute();
$result = $stmt->get_result();
$notes = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
$conn->close();
