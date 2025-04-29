<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500&display=swap" rel="stylesheet">
  <title>EduQuest/Classroom</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Fredoka', sans-serif;
      background-color: #6f62d2;
    }

    header {
      background-color: #5E4CC2;
      padding: 0px 20px;
      display: flex;
      align-items: center;
      gap: 15px;
    }
	
		.points{
	  background-color: white;
	  border-radius: 50px;
	  padding:12px;
	  text-align: center;
	}
	
    .menu-btn {
      background-color: #5E4CC2;
      color: white;
      font-size: 25px;
      border: none;
      cursor: pointer;
      padding: 8px 12px;
      border-radius: 5px;
    }

    .join-btn {
      background-color: #00B894;
      color: white;
      font-size: 16px;
      padding: 10px 18px;
      border: none;
      border-radius: 25px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-left: auto;
      text-align: center;
    }

    .join-btn:hover {
      background-color: #019174;
    }

    .shop-btn,
    .logo-btn,
    .acc-btn {
      border: none;
      background: none;
      cursor: pointer;
    }

    aside {
      width: 60px;
      background-color: #2F285B;
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
	
	aside.hover-active:hover ~ .subject-box,
	aside.show ~ .subject-box {
	margin-left: 300px;
	transition: margin-left 0.3s ease;
	}

    aside nav a {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 12px;
      text-decoration: none;
      color: white;
      font-size: 18px;
      background-color: #5E4CC2;
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
    }

    aside.hover-active:hover .label,
    aside.show .label {
      display: inline;
    }

	.subject-box {
    background: white;
    border-radius: 15px;
    padding: 1rem; /* Padding for content */
    position: relative;
	margin-left: 60px;
	transition: margin-left 0.3s ease;
    }
	
  	aside.hover-active:hover ~ .subject-box,
	aside.show ~ .subject-box {
	margin-left: 300px;
	transition: margin-left 0.3s ease;
	}
	
  .subject-header {
    background: #3c98ff;
    color: white;
    padding: 0.5rem 1rem;
    margin: -1rem -1rem 1rem -1rem; /* To remove spacing around the header */
  }
  
  .filters {
  margin: 1rem 0;
  display: flex;
  gap: 0.5rem;
  flex-wrap: wrap;
}

.filter-btn {
  padding: 0.4rem 0.8rem;
  background-color: white;
  color: black;
  border: black;
  border-radius: 8px;
  cursor: pointer;
  font-weight: bold;
  transition: background-color 0.2s ease;
}

.filter-btn:hover {
  background-color: gray;
}

  
  .task-list .task-item {
    background: #f0f0f0;
    margin-bottom: 0.5rem;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 1rem;
  }
  
  /* Icon container */
  .task-item .icons {
    display: flex;
    gap: 0.5rem; /* Space between icons */
  }
  
  /* Icon images */
  .task-item .icons img {
    width: 24px;
    height: 24px;
    cursor: pointer;
    transition: transform 0.2s;
  }
  
  .task-item .icons img:hover {
    transform: scale(1.1);
  }
</style>
<body>
  <header>
    <button class="menu-btn" onclick="toggleSidebar()">&#9776;</button>
    <button class="logo-btn">
      <a href="student-home.html"><img src="eduquest.png" alt="Eduquest Logo" style="height: 70px; width: auto;"></a>
    </button>
    <button class="join-btn">Join Class</button>
	<span class="points">✨ 0.00</span>
    <button class="shop-btn">
      <a href="shop.html"><img src="shopping-cart.png" alt="cart" style="height: 40px; width: auto;"></a>
    </button>
    <button class="acc-btn">
      <a href="account.html"><img src="account.png" alt="profile" style="height: 40px; width: auto;"></a>
    </button>
  </header>

  <aside id="sidebar" class="hover-active">
    <nav>
      <a href="student-home.html">
        <span class="icon">🏠</span><span class="label">Home</span>
      </a>
      <a href="student-tasks.html">
        <span class="icon">📝</span><span class="label">Tasks</span>
      </a>
      <a href="leaderboards.html">
        <span class="icon">🏆</span><span class="label">Leaderboard</span>
      </a>
      <a href="student-settings.html">
        <span class="icon">⚙️</span><span class="label">Settings</span>
      </a>
    </nav>
  </aside>
  
  <section class="subject-box">
        <div class="subject-header">
          <h2>Subject Name</h2>
          <p>Section</p>
        </div>
        <div class="filters">
          <button class="filter-btn" onclick="window.location.href='student-alltopics.html'">All Topics</button>
          <button class="filter-btn" onclick="window.location.href='student-activities.html'">Activities</button>
          <button class="filter-btn" onclick="window.location.href='student-people.html'">People</button>

        </div>        
        <div class="task-list">
            <div class="task-item" onclick="window.location.href='lesson.html'" style="cursor: pointer;">
              Lessons
              <span class="icons">
                <a href="summarize.html">
                  <img src="pencil-edit.png" alt="Lesson Icon" />
                </a>
                <a href="discussion.html">
                  <img src="comment.png" alt="Chat Icon" />
                </a>
              </span>
            </div>
            <div class="task-item" onclick="window.location.href='quizdashboard.html'" style="cursor: pointer;">
              Quizzes
              <span class="icons">
                <a href="quiz-details.html">
                  <img src="comment.png" alt="Quiz Icon" />
                </a>
              </span>
            </div>
            <div class="task-item" onclick="window.location.href='announcement-dashboard.html'" style="cursor: pointer;">
              Announcements
              <span class="icons">
                <a href="announcement-details.html">
                  <img src="comment.png" alt="Announcement Icon" />
                </a>
              </span>
            </div>
            <div class="task-item" onclick="window.location.href='assignmentdashboard.html'" style="cursor: pointer;">
              Assignments
              <span class="icons">
                <img src="comment.png" alt="Assignment Icon" />
              </span>
            </div>
            
          </div>
  </section>

  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('show');
    }
  </script>
</body>
</html>