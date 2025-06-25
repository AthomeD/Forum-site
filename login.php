<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <link rel="stylesheet" href="login.css">
    <script src="login.js"></script>
    <!-- <script src="register.js" ></script> -->
</head>

<body>
    <div class="panel">
        <div id="formContainer">
            <!-- Login Form -->
            <form id="loginForm" action="loginphp.php" method="post" style="display: block;">
                <h2>Login</h2>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                    <div class="error-message" id="usernameError" style="display: none;">Username is required</div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <div class="error-message" id="passwordError" style="display: none;">Password is required</div>
                </div>
                <button type="submit" name="login">Login</button>
                <p> <a href="register.php"> Don't have an account? Register</p></a>
            </form>


        </div>
    </div>

    <!-- PHP: Display messages -->
    <?php if (!empty($error_message)): ?>
        <script>
            alert("Error: <?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?>");
        </script>
    <?php elseif (!empty($success_message)): ?>
        <script>
            alert("Success: <?php echo htmlspecialchars($success_message, ENT_QUOTES, 'UTF-8'); ?>");
        </script>
    <?php endif; ?>
</body>

</html>