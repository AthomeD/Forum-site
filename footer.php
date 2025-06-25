<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple HTML Page</title>
    <link rel="stylesheet" href="footer.css">

    <script>
        // Ensure you load FontAwesome for icons
        document.addEventListener("DOMContentLoaded", () => {
            const socialLinks = document.querySelectorAll('.social-icon');
            socialLinks.forEach(link => {
                link.setAttribute('target', '_blank'); // Open social links in a new tab
            });
        });
    </script>
</head>

<body>


    <!-- Footer Section -->
    <footer class="forum-footer">
        <div class="footer-container">
            <!-- About Section -->
            <div class="footer-about">
                <h3>About Our Forum</h3>
                <p>Welcome to our community! A place to discuss ideas, share knowledge, and connect with like-minded individuals. Join the conversation today!</p>
            </div>

            <!-- Quick Links Section -->
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Popular Topics</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Support</a></li>
                </ul>
            </div>

            <!-- Social Media Section -->
            <div class="footer-social">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#" class="social-icon facebook" aria-label="Facebook">🌐</a>
                    <a href="#" class="social-icon twitter" aria-label="Twitter">🌐</a>
                    <a href="#" class="social-icon instagram" aria-label="Instagram">🌐</a>
                    <a href="#" class="social-icon youtube" aria-label="YouTube">🌐</a>
                    <a href="#" class="social-icon linkedin" aria-label="LinkedIn">🌐</a>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Section -->

        <div class="footer-bottom">

            <p>&copy; 2024 Forum Site. All rights reserved.</p>
            <p>Powered by Passion for Community</p>
        </div>
    </footer>

</body>

</html>