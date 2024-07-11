<?php
header('Content-Type: application/json');
$servername = "localhost";
$username = "mobw7774_user_hifdi";
$password = "hifdi_222";
$dbname = "mobw7774_api_hifdi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $date = date('Y-m-d H:i:s'); // Menggunakan tanggal dan waktu saat ini

    $sql = "INSERT INTO comments (name, comment, date) VALUES ('$name', '$comment', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "New record created successfully"]);
    } else {
        echo json_encode(["error" => "Error: " . $sql . "<br>" . $conn->error]);
    }

    $conn->close();
} else {
    $sql = "SELECT name, comment, date FROM comments";
    $result = $conn->query($sql);

    $data = array();

    if ($result->num_rows > 0) {
        // Output data setiap baris
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    } else {
        echo json_encode(["message" => "0 results"]);
    }

    $conn->close();

    echo json_encode($data);
}
?>
