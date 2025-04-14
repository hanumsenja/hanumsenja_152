<?php
include 'includes/db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("DELETE FROM items WHERE id = :id");
$stmt->execute(['id' => $id]);

header("Location: view_items.php");
exit;
?>