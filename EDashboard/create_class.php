<?php
session_start();
include('db_connection.php');

// Check if the user is logged in (assuming you store the user_id in the session after login)
if (!isset($_SESSION['user_id'])) {
    die("You need to be logged in to create a class.");
}

$user_id = $_SESSION['user_id']; // Get the logged-in user's ID

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cname = $_POST['subject'] ?? '';
    $section = $_POST['section'] ?? '';
    $desc = $_POST['description'] ?? '';

    if (empty($cname) || empty($section)) {
        die("Subject and Section are required fields.");
    }

    // Insert the class with the logged-in user's ID
    $sql = "INSERT INTO tbl_classes (class_name, section, description, user_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $cname, $section, $desc, $user_id);

    if ($stmt->execute()) {
        header("Location: teacher-home.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eduquest</title>
</head>
<body>
    <h2>Create Class</h2>
    <form method="POST">
        <label for="subject">Subject:</label><br>
        <input type="text" name="subject" id="subject" placeholder="Subject" required><br><br>
        <label for="subject">Section:</label><br>
        <input type="text" name="section" id="Section" placeholder="Section Name" required><br><br>
        <label for="subject">Description:</label><br>
        <textarea name="description" id="description" placeholder="Description(optional)"></textarea><br><br>
        <button type="submit">Create</button>
        <button>Close</button>
    </form>
</body>
</html>