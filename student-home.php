<?php
session_start();
include('db_connection.php'); // Use require_once for critical files

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: eduquest.php?error=Please+log+in+first+>:l");
  exit();
}

$user_id = $_SESSION['user_id'];  // Fetch the user ID from session

// Handle joining a class
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['class_code'])) {
    $class_code = $_POST['class_code'];
    
    // Check if the class exists with the given class code
    $sql = "SELECT class_id FROM tbl_classes WHERE class_code = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $class_code); // Bind class_code as string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $class_id = $row['class_id'];

        // Check if the student is already enrolled in the class
        $checkEnrollment = "SELECT * FROM tbl_enrollment WHERE student_id = ? AND class_id = ?";
        $enrollStmt = $conn->prepare($checkEnrollment);
        $enrollStmt->bind_param("ii", $user_id, $class_id);
        $enrollStmt->execute();
        $enrollResult = $enrollStmt->get_result();

        if ($enrollResult->num_rows == 0) {
            // Enroll the student in the class
            $enrollQuery = "INSERT INTO tbl_enrollment (student_id, class_id, enrolled_at) VALUES (?, ?, NOW())";
            $enrollStmt = $conn->prepare($enrollQuery);
            $enrollStmt->bind_param("ii", $user_id, $class_id);
            $enrollStmt->execute();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="EduQuest - Student Classroom Management System">
  <title>EduQuest - Student Home</title>
  <style>
    :root {
      --primary-color: #5E4CC2;
      --secondary-color: #2F285B;
      --accent-color: #00B894;
      --text-color: #333;
      --light-bg: #f4f4f4;
      --card-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
      --card-hover-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: #6f62d2;
      color: var(--text-color);
    }

    header {
      background-color: var(--primary-color);
      padding: 0 20px;
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .menu-btn {
      background-color: var(--primary-color);
      color: white;
      font-size: 25px;
      border: none;
      cursor: pointer;
      padding: 8px 12px;
      border-radius: 5px;
    }

    .join-btn {
      background-color: var(--accent-color);
      color: white;
      font-size: 16px;
      padding: 10px 18px;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-left: auto;
      text-align: center;
      text-decoration: none;
      display: inline-block;
    }

    .join-btn:hover {
      background-color: #019174;
    }

    .logo-btn,
    .acc-btn {
      border: none;
      background: none;
      cursor: pointer;
    }

    aside {
      width: 60px;
      background-color: var(--secondary-color);
      color: white;
      padding: 15px 10px;
      height: 100vh;
      box-sizing: border-box;
      position: fixed;
      left: 0;
      overflow: hidden;
      transition: width 0.3s ease;
      z-index: 1;
    }

    aside.hover-active:hover,
    aside.show {
      width: 300px;
    }

    aside nav a {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 12px;
      text-decoration: none;
      color: white;
      font-size: 18px;
      background-color: var(--primary-color);
      border-radius: 8px;
      margin-bottom: 10px;
      transition: background-color 0.3s ease;
    }

    aside nav a:hover {
      background-color: black;
    }

    .icon {
      font-size: 22px;
      min-width: 30px;
      text-align: center;
    }

    .label {
      display: none;
      margin-left: 15px;
      white-space: nowrap;
      text-align: center;
    }

    aside.hover-active:hover .label,
    aside.show .label {
      display: inline;
    }

    .panel {
      background: white;
      border-radius: 15px;
      padding: 1rem;
      margin-left: 80px;
      margin-right: 20px;
      margin-top: 20px;
      transition: margin-left 0.3s ease;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    aside.hover-active:hover~.panel,
    aside.show~.panel {
      margin-left: 320px;
    }

    .class-panel {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
      padding: 20px 0;
    }

    .class-card {
      background-color: white;
      border-radius: 10px;
      padding: 20px;
      box-shadow: var(--card-shadow);
      transition: all 0.3s ease;
      border: 1px solid #eee;
    }

    .class-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--card-hover-shadow);
    }

    .class-card h3 {
      margin: 0 0 10px;
      font-size: 1.5rem;
      color: var(--primary-color);
    }

    .class-card h4 {
      margin: 0 0 10px;
      font-size: 1.1rem;
      color: #555;
      font-weight: normal;
    }

    .class-card p {
      font-size: 1rem;
      color: #777;
      margin: 10px 0 0;
    }

    .panel h1 {
      color: var(--primary-color);
      margin: 0 0 20px;
      padding-bottom: 10px;
      border-bottom: 1px solid #eee;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    button:focus-visible {
      outline: 2px solid var(--accent-color);
      outline-offset: 2px;
    }

    /* Modal styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      max-width: 400px;
      width: 80%;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .modal-header {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .close {
      color: #aaa;
      font-size: 28px;
      font-weight: bold;
      float: right;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    /* For small screens */
    @media (max-width: 768px) {
      aside {
        width: 60px;
      }

      aside.show {
        width: 200px;
      }

      .panel {
        margin-left: 0;
        width: calc(100% - 40px);
      }

      aside.show~.panel {
        margin-left: 200px;
      }

      .class-panel {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>
  <header>
    <button class="menu-btn" onclick="toggleSidebar()" aria-label="Toggle sidebar" aria-expanded="false"
      aria-controls="sidebar">&#9776;</button>
    <button class="logo-btn">
      <a href="student-home.php"><img src="eduquest.png" alt="EduQuest Logo" width="70" height="70"
          style="height: auto;"></a>
    </button>
    <button class="join-btn" id="joinClassBtn">Join Class</button>
    <button class="acc-btn">
      <a href="account.php"><img src="account.png" alt="User profile" width="40" height="40" style="height: auto;"></a>
    </button>
  </header>

  <aside id="sidebar" class="hover-active">
    <nav>
      <a href="student-home.php">
        <span class="icon">🏠</span><span class="label">Home</span>
      </a>
      <a href="student-task.html">
        <span class="icon">📝</span><span class="label">Tasks</span>
      </a>
      <a href="leaderboards.php">
        <span class="icon">🏆</span><span class="label">Leaderboard</span>
      </a>
      <a href="settings.php">
        <span class="icon">🔔</span><span class="label">Notification</span>
      </a>
    </nav>
  </aside>

  <div class="panel">
    <h1>Join a Class</h1>

    <h2>Your Enrolled Classes</h2>
    <?php
    // Fetch the classes the student is enrolled in
    $sql = "SELECT c.class_id, c.class_name, c.section, c.description
            FROM tbl_classes c
            JOIN tbl_enrollment e ON c.class_id = e.class_id
            WHERE e.student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>
    <div class="class-panel">
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="class-card" role="article">
            <a href="student-alltopics.php?class_id=<?= $row['class_id'] ?>"
               aria-label="View <?= htmlspecialchars($row['class_name']) ?> classroom">
              <h3><?= htmlspecialchars($row['class_name']) ?></h3>
              <h4><?= htmlspecialchars($row['section']) ?></h4>
              <p><?= htmlspecialchars($row['description']) ?></p>
            </a>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No classes found. Join a class using the class code.</p>
      <?php endif; ?>
    </div>
  </div>

  <!-- Modal for Joining Class -->
  <div id="joinClassModal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="closeModal()">&times;</span>
      <div class="modal-header">
        <h2>Join a Class</h2>
      </div>
      <form action="student-home.php" method="POST">
        <label for="class_code">Enter Class Code:</label>
        <input type="text" id="class_code" name="class_code" required>
        <button type="submit">Join Class</button>
      </form>
    </div>
  </div>

  <script>
    // Modal Logic
    const joinClassBtn = document.getElementById("joinClassBtn");
    const modal = document.getElementById("joinClassModal");
    const closeBtn = document.querySelector(".close");

    joinClassBtn.onclick = function () {
      modal.style.display = "flex";
    }

    closeBtn.onclick = function () {
      modal.style.display = "none";
    }

    window.onclick = function (event) {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    }

    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const btn = document.querySelector('.menu-btn');
      const isShown = sidebar.classList.toggle('show');
      btn.setAttribute('aria-expanded', isShown);
    }
  </script>
</body>

</html>
