<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <lind rel="stylesheet" href="register.css">
    <script src="register.js"></script>
    
</head>
<body>

<div class="panel">
    <div id="formContainer">
        <!-- Registration Form -->
        <form id="registerForm" action="register.php" method="post">
            <h2>Register</h2>

            <?php if (!empty($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php elseif (!empty($success_message)): ?>
                <div class="success-message"><?php echo $success_message; ?></div>
            <?php endif; ?>

            <div class="form-group">
                <label for="newUsername">Username</label>
                <input type="text" id="newUsername" name="newUsername" required>
                <div class="error-message" id="newUsernameError" style="display: none;">Username is required</div>
            </div>
            <div class="form-group">
                <label for="newEmail">Email</label>
                <input type="email" id="newEmail" name="newEmail" required>
                <div class="error-message" id="emailError" style="display: none;">Valid email is required</div>
            </div>
            <div class="form-group">
                <label for="newPassword">Password</label>
                <input type="password" id="newPassword" name="newPassword" required>
                <div class="error-message" id="newPasswordError" style="display: none;">Password is required</div>
            </div>
            <button type="submit" name="register">Register</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</div>

</body>
</html>

