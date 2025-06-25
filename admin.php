<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forum Admin Panel</title>
  <link rel="stylesheet" href="admin.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body>
  <div class="admin-panel">



    <!-- Sidebar -->
    <aside class="sidebar">
      <h2>Admin Panel</h2>
      <nav>
        <ul>
          <li>
            <a href="#" id="dashboard-link">Dashboard</a>
          </li>
          <li>
            <a href="#" id="posts-link" class="expandable">Manage Posts</a>
            <ul class="submenu">
              <li><a href="#">View All Posts</a></li>
              <li><a href="#">Edit Posts</a></li>
              <li><a href="#">Delete Posts</a></li>
              <li><a href="#">Pin Posts</a></li>
              <li><a href="#">Search Posts</a></li>
              <li><a href="#">Approve Pending Posts</a></li>
              <li><a href="#">Draft Posts</a></li>
              <li><a href="#">Restore Deleted Posts</a></li>
              <li><a href="#">Post Reports</a></li>
              <li><a href="#">Post Analytics</a></li>
            </ul>
          </li>
          <li>
            <a href="#" id="users-link" class="expandable">Manage Users</a>
            <ul class="submenu">
              <li><a href="#">View All Users</a></li>
              <li><a href="#">Edit User Roles</a></li>
              <li><a href="#">Ban Users</a></li>
              <li><a href="#">Unban Users</a></li>
              <li><a href="#">Search Users</a></li>
              <li><a href="#">View User Profiles</a></li>
              <li><a href="#">Reset User Passwords</a></li>
              <li><a href="#">Activate/Deactivate Accounts</a></li>
              <li><a href="#">Monitor User Activity</a></li>
              <li><a href="#">User Analytics</a></li>
            </ul>
          </li>
          <li>
            <a href="#" id="categories-link" class="expandable">Manage Categories</a>
            <ul class="submenu">
              <li><a href="#">View All Categories</a></li>
              <li><a href="#">Add New Category</a></li>
              <li><a href="#">Edit Categories</a></li>
              <li><a href="#">Delete Categories</a></li>
              <li><a href="#">Sort Categories</a></li>
              <li><a href="#">Archive Categories</a></li>
              <li><a href="#">View Category Stats</a></li>
              <li><a href="#">Assign Moderators</a></li>
              <li><a href="#">Manage Subcategories</a></li>
              <li><a href="#">Category Permissions</a></li>
            </ul>
          </li>
          <li>
            <a href="#" id="reports-link" class="expandable">User Reports</a>
            <ul class="submenu">
              <li><a href="#">View All Reports</a></li>
              <li><a href="#">Filter Reports</a></li>
              <li><a href="#">Resolve Reports</a></li>
              <li><a href="#">Dismiss Reports</a></li>
              <li><a href="#">View User History</a></li>
              <li><a href="#">Report Analytics</a></li>
              <li><a href="#">Escalate Reports</a></li>
              <li><a href="#">View Report Trends</a></li>
              <li><a href="#">Ban Reported Users</a></li>
              <li><a href="#">Track False Reports</a></li>
            </ul>
          </li>
          <li>
            <a href="#" id="analytics-link" class="expandable">Forum Analytics</a>
            <ul class="submenu">
              <li><a href="#">Traffic Overview</a></li>
              <li><a href="#">User Activity</a></li>
              <li><a href="#">Post Statistics</a></li>
              <li><a href="#">Daily Signups</a></li>
              <li><a href="#">Category Engagement</a></li>
              <li><a href="#">Thread Analysis</a></li>
              <li><a href="#">Moderation Actions</a></li>
              <li><a href="#">Report Trends</a></li>
              <li><a href="#">User Retention</a></li>
              <li><a href="#">Performance Overview</a></li>
            </ul>
          </li>
          <!-- Add similar structures for Banned Users, Moderators, Settings, and Notifications -->
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <header>
        <h1 id="page-title">Dashboard</h1>
        <button id="logout-button">Logout</button>
      </header>
      <section id="content">
        <p>Welcome to the Admin Panel! Select a tool to get started.</p>
      </section>
    </main>
  </div>

  <script src="admin.js"></script>
</body>

</html>