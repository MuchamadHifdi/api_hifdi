<?php
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

$sql = "SELECT platform, username FROM social_accounts";
$result = $conn->query($sql);

$social_accounts = array();

if ($result->num_rows > 0) {
  // Output data setiap baris
  while($row = $result->fetch_assoc()) {
    $social_accounts[] = $row;
  }
} else {
  echo "0 results";
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($social_accounts);
?>
