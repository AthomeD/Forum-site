<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="A vibrant forum page for discussions, announcements, and more.">

  <title>Basic Forum Page</title>
  <link rel="stylesheet" href="index.css">

  <!-- java script file Don't Touch -->
  <script src="index.js"></script>

</head>

<body>
  <?php include 'navbar.php'; ?>

  <!-- <button><?php include 'admin'; ?></button>  -->

  <div class="forum-body">
    <h2 class="forum-title">Forum Categories</h2>

    <!-- Forum Grid -->
    <div class="forum-grid">
      <!-- Category 1 -->
      <div class="forum-category">
        <div class="forum-icon">🗨️</div>
        <div class="forum-info">
          <h3 class="forum-category-title">General Discussions</h3>
          <p class="forum-description">Talk about general topics and anything that interests you.</p>
          <p class="forum-post-count">Posts: 500k</p>
        </div>
      </div>

      <!-- Category 2 -->
      <div class="forum-category">
        <div class="forum-icon">ℹ️</div>
        <div class="forum-info">
          <h3 class="forum-category-title">Announcements</h3>
          <p class="forum-description">Stay updated with the latest announcements and news.</p>
          <p class="forum-post-count">Posts: 120k</p>
        </div>
      </div>

      <!-- Category 3 -->
      <div class="forum-category">
        <div class="forum-icon">🛠️</div>
        <div class="forum-info">
          <h3 class="forum-category-title">Technical Support</h3>
          <p class="forum-description">Get help with technical issues and troubleshooting.</p>
          <p class="forum-post-count">Posts: 300k</p>
        </div>
      </div>

      <!-- Category 4 -->
      <div class="forum-category">
        <div class="forum-icon">🎮</div>
        <div class="forum-info">
          <h3 class="forum-category-title">Gaming Discussions</h3>
          <p class="forum-description">Join conversations about your favorite games and consoles.</p>
          <p class="forum-post-count">Posts: 200k</p>
        </div>
      </div>

      <!-- Add more categories as needed -->
    </div>
  </div>



  <!-- main content Area -->
  <div class="main-content">
    <div class="side-panel">
      <div class="left-panel">

        <div class="section">
          <h4>Recent Posts</h4>
          <ul>
            <li>AI in Healthcare</li>
            <li>Top 5 Programming Languages</li>
            <li>10 Healthy Foods for Your Diet</li>
            <li>The Future of Electric Cars</li>
          </ul>
        </div>
        <div class="section">
          <h4>Recent Comments</h4>
          <ul>
            <li>"Great post on AI advancements!"</li>
            <li>"Loved the tips on mindfulness."</li>
            <li>"This article on programming languages is super helpful."</li>
            <li>"Excellent insights on electric cars!"</li>
          </ul>
        </div>
      </div>
    </div>


    <div class="container">
      <!-- Announcements Container -->
      <div class="container">
        <div class="header" onclick="toggleContainer(2)">
          <h2>Announcements</h2>
          <button id="toggle-btn-2">Open</button>
        </div>
        <div class="post-section" id="post-section-2">
          <div class="post">
            <h3>Post 1</h3>
            <p>Important updates regarding the platform.</p>
            <span class="category">Announcements</span>
          </div>
          <div class="post">
            <h3>Post 2</h3>
            <p>New feature releases and changes.</p>
            <span class="category">Announcements</span>
          </div>
        </div>
      </div>

      <!-- Feedback Container -->
      <div class="container">
        <div class="header" onclick="toggleContainer(3)">
          <h2>Feedback</h2>
          <button id="toggle-btn-3">Open</button>
        </div>
        <div class="post-section" id="post-section-3">
          <div class="post">
            <h3>Post 1</h3>
            <p>Your feedback on the new website design.</p>
            <span class="category">Feedback</span>
          </div>
          <div class="post">
            <h3>Post 2</h3>
            <p>Suggestions for improving user experience.</p>
            <span class="category">Feedback</span>
          </div>
        </div>
      </div>

      <!-- Support Container -->
      <div class="container">
        <div class="header" onclick="toggleContainer(4)">
          <h2>Support</h2>
          <button id="toggle-btn-4">Open</button>
        </div>
        <div class="post-section" id="post-section-4">
          <div class="post">
            <h3>Post 1</h3>
            <p>Need help with your account?</p>
            <span class="category">Support</span>
          </div>
          <div class="post">
            <h3>Post 2</h3>
            <p>Contact our support team for assistance.</p>
            <span class="category">Support</span>
          </div>
        </div>
      </div>

      <!-- Off-Topic Container -->
      <div class="container">
        <div class="header" onclick="toggleContainer(5)">
          <h2>Off-Topic</h2>
          <button id="toggle-btn-5">Open</button>
        </div>
        <div class="post-section" id="post-section-5">
          <div class="post">
            <h3>Post 1</h3>
            <p>Random discussions not related to the main topics.</p>
            <span class="category">Off-Topic</span>
          </div>
          <div class="post">
            <h3>Post 2</h3>
            <p>Anything that's fun and interesting!</p>
            <span class="category">Off-Topic</span>
          </div>
        </div>
      </div>

      <!-- Gaming Container -->
      <div class="container">
        <div class="header" onclick="toggleContainer(6)">
          <h2>Gaming</h2>
          <button id="toggle-btn-6">Open</button>
        </div>
        <div class="post-section" id="post-section-6">
          <div class="post">
            <h3>GTA 6</h3>
            <p>Latest news and updates in the gaming world.</p>
            <span class="category">Gaming</span>
          </div>
          <div class="post">
            <h3>Latest Gaming updates </h3>
            <p>Discuss your favorite games and gaming experiences.</p>
            <span class="category">Gaming</span>
          </div>
        </div>
      </div>

      <!-- Programming Container -->
      <div class="container">
        <div class="header" onclick="toggleContainer(7)">
          <h2>Programming</h2>
          <button id="toggle-btn-7">Open</button>
        </div>
        <div class="post-section" id="post-section-7">
          <div class="post">
            <h3>Post 1</h3>
            <p>Learn programming languages and coding tips.</p>
            <span class="category">Programming</span>
          </div>
          <div class="post">
            <h3>Post 2</h3>
            <p>Share your coding projects and experiences.</p>
            <span class="category">Programming</span>
          </div>
        </div>
      </div>

      <!-- Technology Container -->
      <div class="container">
        <div class="header" onclick="toggleContainer(8)">
          <h2>Technology</h2>
          <button id="toggle-btn-8">Open</button>
        </div>
        <div class="post-section" id="post-section-8">
          <div class="post">
            <h3>Post 1</h3>
            <p>Latest trends and breakthroughs in technology.</p>
            <span class="category">Technology</span>
          </div>
          <div class="post">
            <h3>Post 2</h3>
            <p>Emerging technologies and their impact.</p>
            <span class="category">Technology</span>
          </div>
        </div>
      </div>

    </div>

    <!-- Right Side Panel -->
    <div class="side-panel">
      <div class="section">
        <h4>Recent Posts</h4>
        <ul>
          <li>AI in Healthcare</li>
          <li>Top 5 Programming Languages</li>
          <li>10 Healthy Foods for Your Diet</li>
          <li>The Future of Electric Cars</li>
        </ul>
      </div>

      <div class="section">
        <!-- <h4>Recent Comments</h4>
      <ul>
        <li>"Great post on AI advancements!"</li>
        <li>"Loved the tips on mindfulness."</li>
        <li>"This article on programming languages is super helpful."</li>
        <li>"Excellent insights on electric cars!"</li>
      </ul>
    </div> -->

        <div class="section">
          <h4>Hot Topics</h4>
          <ul>
            <li><span class="category">Technology:</span> The Future of AI</li>
            <li><span class="category">Health:</span> Wellness in 2024</li>
            <li><span class="category">Education:</span> Online Learning Trends</li>
            <li><span class="category">Lifestyle:</span> Sustainable Living</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- main content area ends here -->


  <!-- post container -->

  <?php include 'post.php' ?>


  <?php include 'footer.php'; ?>
</body>

</html>

<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $userId = $_POST['user_id']; // Assume user_id is passed via POST

  $query = "SELECT * FROM inbox WHERE user_id = $userId";
  $result = mysqli_query($conn, $query);

  if ($result) {
    $inboxData = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $inboxData[] = $row;
    }
    echo json_encode(['status' => 'success', 'data' => $inboxData]);
  } else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to fetch inbox']);
  }
}
mysqli_close($conn);
?>