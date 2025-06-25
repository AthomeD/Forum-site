//  <?php
// session_start();
// // Redirect to login page if not logged in
// if (!isset($_SESSION['username'])) {
//     header('Location: index.php');
//     exit;
// }

// $username = $_SESSION['username'];
// ?> 

// Handle navigation and update the content dynamically
document.addEventListener('DOMContentLoaded', () => {
    const content = document.getElementById('content');
    const pageTitle = document.getElementById('page-title');
  
    const pages = {
      dashboard: '<p>Welcome to the Dashboard! Use the features below to manage the forum efficiently.</p>',
      posts: '<p>Manage forum posts. View, edit, delete, or pin posts here.</p>',
      users: '<p>Manage users. View profiles, assign roles, or ban users.</p>',
      categories: '<p>Manage categories. Add, update, or delete forum categories.</p>',
      reports: '<p>Review user reports. Take appropriate actions on reported content or users.</p>',
      analytics: '<p>View forum analytics. Monitor traffic, activity trends, and user engagement.</p>',
      banned_users: '<p>Review banned users. Revoke bans or monitor their activities.</p>',
      moderators: '<p>Manage moderators. Assign or remove moderation roles.</p>',
      settings: '<p>Update forum settings. Change configurations or customize features.</p>',
      notifications: '<p>View system notifications and alerts.</p>',
    };
  
    // Handle sidebar navigation clicks
    document.querySelectorAll('.sidebar nav ul li a').forEach((link) => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const id = e.target.id.split('-')[0];
        if (pages[id]) { // Only update the content if the ID is valid
          content.innerHTML = pages[id];
          pageTitle.textContent = e.target.textContent;
        }
      });
    });
  
    // Handle submenu expansion
    document.querySelectorAll('.expandable').forEach((link) => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        const submenu = link.nextElementSibling;
  
        // Toggle submenu visibility
        if (submenu.style.display === 'block') {
          submenu.style.display = 'none';
          link.classList.remove('active');
        } else {
          submenu.style.display = 'block';
          link.classList.add('active');
        }
      });
    });
  
    // Logout button action
    document.getElementById('logout-button').addEventListener('click', () => {
      alert('You have been logged out!');
      // Add logout logic here
    });
  });
  