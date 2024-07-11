<?php
include 'db.php';

header('Content-Type: application/json');

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $response['error'] = true;
        $response['message'] = 'Email and password cannot be empty';
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $response['error'] = false;
            $response['message'] = 'Login successful';
        } else {
            $response['error'] = true;
            $response['message'] = 'Invalid email or password';
        }
    }
} else {
    $response['error'] = true;
    $response['message'] = 'Invalid request method';
}

echo json_encode($response);
?>
