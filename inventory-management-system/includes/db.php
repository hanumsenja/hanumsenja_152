<?php
$host = 'localhost';       // Host database (default: localhost)
$dbname = 'inventory-management-system';     // Nama database
$username = 'root';        // Username database (default: root)
$password = '';            // Password database (default: kosong)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>