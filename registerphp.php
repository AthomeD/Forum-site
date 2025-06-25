<?php
// Include database connection
include 'connection.php'; // Assuming connection.php is handling the connection

// Register handler
if (isset($_POST['action']) && $_POST['action'] === 'register') {
    // Sanitize and trim input
    $newUsername = trim($_POST['newUsername']);
    $newEmail = trim($_POST['newEmail']);
    $newPassword = trim($_POST['newPassword']);

    // Validate email format
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Validate password length (for example, at least 6 characters)
    if (strlen($newPassword) < 6) {
        echo "Password must be at least 6 characters long";
        exit;
    }

    // Prepare query to check if username or email exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param('ss', $newUsername, $newEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username or Email already taken!";
        $stmt->close(); // Close statement
        exit;
    } else {
        // Hash the password before storing it
        $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

        // Prepare query to insert new user into the database
        $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $newUsername, $newEmail, $passwordHash);

        if ($stmt->execute()) {
            // Redirect to login page after successful registration
            header("Location: login.php"); // Adjust the path as needed
            exit;
        } else {
            // Log error and show user-friendly message
            error_log("Database error: " . $conn->error); // More detailed error logging
            echo "An error occurred, please try again later.";
        }
        $stmt->close(); // Close statement
    }
}

// Close the connection at the end
$conn->close();
?>

