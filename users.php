<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "mobw7774_user_hifdi";
$password = "hifdi_222";
$dbname = "mobw7774_api_hifdi";
// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email, password FROM users";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Output data setiap baris
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}

$conn->close();

echo json_encode($data);
?>
