<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inbox</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="inbox">

    <!-- Sidebar Section -->
    <div class="sidebar">

      <!-- Profile Section -->
      <div class="profile-section">
        <div class="profile-avatar">
          <img src="img/user-1.jpg" alt="User 1" />
        </div>
        <div class="profile-info">
          <h3>Hardik</h3>
          <span>Web Designer</span>
        </div>
      </div>

      <!-- Search Bar -->
      <div class="search-bar">
        <input type="text" placeholder="Search" id="search">
      </div>

      <!-- Contact List -->
      <div class="contact-list">
        <div class="contact-item" data-chat="hemal">
          <div class="contact-avatar">
            <img src="img/user-2.jpg" alt="User 2" />
          </div>
          <div class="contact-text">
            <h4>Hemal</h4>
            <p>Hello Hemal</p>
          </div>
          <span class="contact-date">Nov 28</span>
        </div>
        <div class="contact-item" data-chat="wow">
          <div class="contact-avatar">
            <img src="img/user-3.jpg" alt="User 3" />
          </div>
          <div class="contact-text">
            <h4>Wow Mate</h4>
            <p>What is up</p>
          </div>
          <span class="contact-date">Sep 28</span>
        </div>
      </div>
    </div>

    <!-- Chat Section -->
    <div class="chat">
      <div class="chat-header">
        <div class="header-avatar">
          <img src="img/user-2.jpg" alt="Contact Avatar" />
        </div>
        <h3 id="chat-name">Select a Chat</h3>
        <div class="header-icons">
          <button title="Call">📞</button>
          <button title="Video">📹</button>
          <button title="Delete Chat">🗑</button>
          <button title="More Options">⋮</button>
        </div>
      </div>

      <!-- Chat Body -->
      <div class="chat-body" id="chat-body">
        <p class="placeholder">Select a contact to start chatting.</p>
      </div>

      <!-- Chat Footer -->
      <div class="chat-footer">
        <input type="text" id="message-input" placeholder="Type your message..." disabled>
        <button id="send-button" disabled>Send</button>
      </div>
    </div>
  </div>

  <!-- Loading Spinner -->
  <div id="loading-spinner" style="display: none;">Loading...</div>

  <script src="script.js"></script>
</body>

</html>