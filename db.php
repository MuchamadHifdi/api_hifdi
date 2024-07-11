<?php
$host = 'localhost'; // atau sesuai dengan host database Anda
$user = 'mobw7774_user_hifdi'; // ganti dengan username database Anda
$password = 'hifdi_222'; // ganti dengan password database Anda
$dbname = 'mobw7774_api_hifdi';

// Buat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
