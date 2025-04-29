<?php
session_start();
include('db_connection.php');

// Update session if class_id is passed in URL
if (isset($_GET['class_id'])) {
    $_SESSION['class_id'] = (int) $_GET['class_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $class_id = $_SESSION['class_id'] ?? '';
    $title = $_POST['title'] ?? '';
    $desc = $_POST['description'] ?? '';
    $score = $_POST['score'] ?? '';
    $deadline = $_POST['deadline'] ?? '';

    if (empty($title) || empty($desc)) {
        die("Title and description are required.");
    }

    $filePath = '';
    $fileName = '';
    $fileType = '';
    $fileSize = 0;

    // If file uploaded
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $file = $_FILES['attachment'];
        $fileTmp = $file['tmp_name'];
        $fileName = basename($file['name']);
        $fileType = mime_content_type($fileTmp);
        $fileSize = $file['size'];

        $uploadDir = 'uploads/';
        $filePath = $uploadDir . uniqid() . '_' . $fileName;

        // Move the file
        if (!move_uploaded_file($fileTmp, $filePath)) {
            die("Failed to save the uploaded file.");
        }
    }

    // Insert into database (you must create `announcements` table first)
    $stmt = $conn->prepare("INSERT INTO tbl_acts (class_id, title, description, file_name, file_path, file_type, file_size, score, deadline) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssiis", $class_id, $title, $desc, $fileName, $filePath, $fileType, $fileSize, $score, $deadline);

    if ($stmt->execute()) {
        header("Location: teacher-alltopics.php");
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
    <title>Assignment</title>
    <link rel="stylesheet" href="create-activity.css">
</head>
<body>
    <div class="upload-container">
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" class="input-field" placeholder="✏️ Title of Assignment" />
            <textarea class="textarea-field" name="description" placeholder="✏️ Description"></textarea>

            <div class="button-group">
              <!-- File Upload -->
              <input type="file" name="attachment" id="file-upload" class="file-input" />
              <label for="file-upload" class="btn attach-btn">+ Attach File</label>

              <!-- Score -->
              <input type="number" name="score" class="input-field score-field" placeholder="Score" />

              <!-- Upload & Due Date -->
              <button class="btn upload-btn" type="button">Upload to Students</button>

              <!-- Date & Time Picker -->
              <input type="datetime-local" name="deadline" class="due-date-picker" />
            </div>

            <div class="action-buttons">
                <button class="btn close-btn" onclick="window.location.href='teacher-act.html'" style="cursor: pointer;">Close</button>
                <button class="btn upload-main-btn">Upload</button>
            </div>
        </form>
    </div>
</body>
</html>
