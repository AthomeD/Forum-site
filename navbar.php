<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizontal Navbar</title>
    <link rel="stylesheet" href="navbar.css">
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="index.php" class="navbar-logo">Global: Forum </a>

            <!-- Hamburger Menu Icon for Mobile -->
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul class="navbar-menu">
                <a href="index.php">Home</a>
                <a href="admin.php">Admin</a>
                <a href="public\chatapp\inbox.html" id="inboxLink">Inbox</a>

                <div class="dropdown">
                    <a href="#">Categories</a>
                    <div class="dropdown-content">
                        <a href="#">General Discussion</a>
                        <a href="#">Announcements</a>
                        <a href="#">Feedback</a>
                        <a href="#">Support</a>
                        <a href="#">Off-Topic</a>
                        <a href="#">Gaming</a>
                        <a href="#">Programming</a>
                        <a href="#">Technology</a>

                    </div>
                </div>


                <a href="login.php" id="loginLink"> Login/Register</a>
                <a href="userprofile.php" id="profileLink"> Profile </a>
                <!-- <a href="#">Register</a> -->
                <a href="contact.php" id="">Contact Us</a>

                <!-- <a href="#">About Us</a> -->
                <a href="#" class="about-link" onclick="openPopup()">About Us</a>

                <!-- About us page -->
                <!-- Popup overlay and content -->
                <div id="popupOverlay" class="popup-overlay">
                    <div class="popup-content">
                        <button class="close-btn" onclick="closePopup()">Close</button>
                        <h2>About Our Forum</h2>
                        <p>Welcome to our forum! Our goal is to create a vibrant online space where people from all walks of life can come together to share knowledge, discuss diverse topics, and connect in meaningful ways.</p>

                        <h3>Our Mission</h3>
                        <p>We believe in fostering an inclusive, respectful, and supportive community where everyone feels valued and can contribute freely.</p>

                        <h3>Topics You Can Explore</h3>
                        <ul>
                            <li><strong>General Discussion:</strong> Engage in conversations on a wide range of subjects, from daily life to trending news.</li>
                            <li><strong>Announcements:</strong> Stay updated with the latest news, updates, and community guidelines.</li>
                            <li><strong>Feedback & Support:</strong> Share your suggestions, report issues, and get assistance from our support team.</li>
                            <li><strong>Off-Topic:</strong> A place for casual chats, fun discussions, and getting to know each other beyond forum topics.</li>
                            <li><strong>Gaming, Technology & More:</strong> Dive deep into specialized discussions on gaming, technology, programming, and more.</li>
                        </ul>

                        <h3>Our Values</h3>
                        <p>Respect, inclusivity, and transparency are at the heart of everything we do. We’re dedicated to keeping this forum a positive and engaging environment for all members.</p>

                        <h3>Join Us</h3>
                        <p>Becoming part of our forum is easy! Simply sign up, introduce yourself, and start contributing to the conversations that matter to you.</p>
                    </div>
                </div>
                <script>
                    // Pop-up About 
                    // Function to open the popup
                    function openPopup() {
                        document.getElementById("popupOverlay").style.display = "block";
                    }

                    // Function to close the popup
                    function closePopup() {
                        document.getElementById("popupOverlay").style.display = "none";
                    }

                    // Optional: Close popup when clicking outside of it
                    window.onclick = function(event) {
                        var overlay = document.getElementById("popupOverlay");
                        if (event.target == overlay) {
                            overlay.style.display = "none";
                        }
                    }
                </script>

            </ul>
        </div>
    </nav>

    <!-- Inbox Sliding Panel -->
    <div id="inboxPanel" class="inbox-panel">
        <div class="inbox-header">
            <h2>Inbox</h2>
            <button id="closeInbox" class="close-btn">&times;</button>
        </div>
        <div class="inbox-content">
            <p>No new messages!</p>
        </div>
    </div>

    <div id="overlay" class="overlay"></div>

    <script src="navbar.js"></script>
</body>

</html>