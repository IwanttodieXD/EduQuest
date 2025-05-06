<?php
session_start();
include('db_connection.php'); // Use require_once for critical files
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: eduquest.html?error=Please+log+in+first+>:l");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&display=swap" rel="stylesheet">
  <title>EduQuest/Classroom</title>
  <style>
    header {
      background-color: #5E4CC2;
      padding: 0px 20px;
      display: flex;
      align-items: center;
      gap: 15px;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Fredoka', sans-serif;
      background: radial-gradient(100% 259.2% at 72.65% 0%, #FFF8A7 16%, #FFA973 34%, #A4E8ED 72%);
    }

    .panel {
      background: linear-gradient(to right, #5E4CC2, #8E79E6);
      margin: 10px 30px;
      padding: 20px;
      border-radius: 20px;
      height: 80vh;
      color: white;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .class-accounts {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 50px;
      width: 100%;
      max-width: 1000px;
      margin: 0 auto;
      padding: 50px 0;
    }

    .accounts {
      background-color: rgba(47, 40, 91, 0.8);
      border-radius: 20px;
      padding: 60px 100px;
      box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
      border: 1px solid gray;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .accounts h2 {
      color: white;
      font-size: 20px;
    }

    .accounts:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    a {
      display: block;
      text-decoration: none;
      color: inherit;
    }

    .acc-btn {
      border: none;
      background: none;
      cursor: pointer;
      margin-left: auto;
    }

    h1 {
      text-transform: uppercase;
      text-shadow: 1px 1px 4px #000000;
      font-size: 36px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <header>
    <div>
      <img src="eduquest.png" alt="Eduquest Logo" style="height: 60px; width: auto;">
    </div>
    <div class="acc-btn">
      <a href="logout.php"><img src="logout.png" alt="Logout" style="height: 40px; width: auto;"></a>
    </div>
  </header>
  <div class="panel">
    <h1>Manage Accounts</h1>
    <div class="class-accounts">
      <a href="admin-students.html" class="accounts">
        <h2>Student Accounts</h2>
      </a>
      <a href="admin-teachers.html" class="accounts">
        <h2>Teacher Accounts</h2>
      </a>
      <a href="admin-admins.html" class="accounts">
        <h2>Admin Accounts</h2>
      </a>
    </div>
  </div>
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const errorMsg = urlParams.get('error');
    if (errorMsg) {
      alert(decodeURIComponent(errorMsg));
    }
  </script>
</body>

</html>