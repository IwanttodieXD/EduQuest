<?php
$host = 'localhost';
$db = 'eduquest';  
$user = 'root';  
$pass = '';     

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $usertpye = $_POST['user-type'] ?? '';
} else {
    echo "Invalid request method.";
}

if (empty($name) || empty($email) || empty($password) || empty($usertpye)) {
    die("All fields are required.");
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO tbl_users (name, email, password, user_type) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $hashed_password, $usertpye);

if ($stmt->execute()) {
    header("Location: signin.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>