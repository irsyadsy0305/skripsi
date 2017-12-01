<?php
$host = 'localhost'; // Nama hostnya
$username = 'root'; // Username
$password = ''; // Password (Isi jika menggunakan password)
$database = 'toko'; // Nama databasenya

// Koneksi ke MySQL dengan PDO
$koneksi = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>
