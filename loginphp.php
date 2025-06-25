<?php
// Start the session
session_start();

// Include database connection
include 'connection.php';

// Initialize error and success messages
$error_message = '';
$success_message = '';

// Login handler
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    // Sanitize inputs
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error_message = "Both fields are required.";
    } else {
        // Prepare SQL query
        $stmt = $conn->prepare("SELECT id, username, password_hash FROM users WHERE username = ?");
        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password_hash'])) {
                    // Regenerate session ID for security
                    session_regenerate_id();

                    // Set session variables
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];

                    // Redirect to profile page
                    header("Location: profile.php?user=" . urlencode($user['username']));
                    exit;
                } else {
                    $error_message = "Invalid password.";
                }
            } else {
                $error_message = "User not found.";
            }
            $stmt->close();
        } else {
            $error_message = "Database error. Please try again later.";
        }
    }
}
?>
