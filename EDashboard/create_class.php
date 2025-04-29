<?php
include('db_connection.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cname = $_POST['subject'] ?? '';
    $section = $_POST['section'] ?? '';
    $desc = $_POST['description'] ?? '';

    if (empty($cname) || empty($section)) {
        die("All fields are required.");
    }

    $sql = "INSERT INTO tbl_classes (class_name, section, description) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $cname, $section, $desc);

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