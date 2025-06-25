<?php
session_start();
// Redirect to login page if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userprofile.css">
    <title>Profile Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .profile {
            text-align: center;
            padding: 20px;
            background-color: #007BFF;
            color: white;
        }

        .profile-container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .profile-container h2 {
            text-align: center;
            color: #333;
        }

        .avatar-container {
            text-align: center;
            margin: 20px 0;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 2px solid #ddd;
            object-fit: cover;
        }

        .upload-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }

        .upload-btn:hover {
            background: #0056b3;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 48%;
            padding: 10px;
            margin: 10px 1%;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #edit-btn {
            background-color: #f0ad4e;
            color: white;
        }

        #edit-btn:hover {
            background-color: #ec971f;
        }

        #save-btn {
            background-color: #28a745;
            color: white;
        }

        #save-btn:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="profile">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>This is your profile page.</p>
        <a href="logout.php" style="color: white; text-decoration: underline;">Logout</a>
    </div>

    <div class="profile-container">
        <h2>Edit Profile</h2>

        <!-- Profile Image -->
        <div class="avatar-container">
            <img src="default-avatar.png" alt="Profile Avatar" class="avatar" id="profile-avatar">
            <label for="avatar-upload" class="upload-btn">Change Avatar</label>
            <input type="file" id="avatar-upload" accept="image/*" style="display: none;">
        </div>

        <!-- Form Fields -->
        <form action="profile.php" method="POST" enctype="multipart/form-data">
            <label for="bio">Bio</label>
            <input type="text" id="bio" name="bio" placeholder="Write something about yourself" required>

            <label for="createdat">Created At</label>
            <input type="text" id="createdat" name="createdat" value="2024-11-20" readonly>

            <label for="profileid">Profile ID</label>
            <input type="text" id="profileid" name="profileid" value="12345" readonly>

            <label for="userid">User ID</label>
            <input type="text" id="userid" name="userid" value="67890" readonly>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>

            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="firstname" placeholder="Enter first name" required>

            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lastname" placeholder="Enter last name" required>

            <label for="email">Email ID</label>
            <input type="email" id="email" name="email" placeholder="Enter email address" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter new password" required>

            <!-- Buttons -->
            <button type="button" id="edit-btn" onclick="enableEditing()">Edit Profile</button>
            <button type="submit" id="save-btn">Save Profile</button>
        </form>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        function enableEditing() {
            document.querySelectorAll('input').forEach(input => {
                if (!input.readOnly) {
                    input.disabled = !input.disabled;
                }
            });
        }
    </script>
</body>

</html>


<?php
include 'connection.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];

    // Retrieve form data
    $newBio = trim($_POST['bio']);
    $firstName = trim($_POST['firstname']);
    $lastName = trim($_POST['lastname']);
    $email = trim($_POST['email']);
    // $newPassword = trim($_POST['password_hash']);
    // $avatarFile = $_FILES['avatar-upload'];

    // Validate required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($newBio)) {
        echo "All fields except password must be filled out.";
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Update avatar if uploaded
    $avatarPath = "";
    if (isset($avatarFile) && $avatarFile['error'] == UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/avatars/';
        $fileName = uniqid() . "-" . basename($avatarFile['name']);
        $targetFilePath = $uploadDir . $fileName;

        // Create directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move uploaded file to target directory
        if (move_uploaded_file($avatarFile['tmp_name'], $targetFilePath)) {
            $avatarPath = $targetFilePath;
        } else {
            echo "Failed to upload avatar.";
            exit;
        }
    }

    // Update password if provided
    $passwordHash = null;
    if (!empty($newPassword)) {
        $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    }

    // Build SQL query
    $query = "UPDATE users SET bio = ?, firstname = ?, lastname = ?, email = ?";
    $params = [$newBio, $firstName, $lastName, $email];

    if (!empty($passwordHash)) {
        $query .= ", password_hash = ?";
        $params[] = $passwordHash;
    }

    if (!empty($avatarPath)) {
        $query .= ", avatar = ?";
        $params[] = $avatarPath;
    }

    $query .= " WHERE username = ?";
    $params[] = $username;

    // Prepare and execute the query
    $stmt = $conn->prepare($query);
    $stmt->bind_param(str_repeat('s', count($params)), ...$params);

    if ($stmt->execute()) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>