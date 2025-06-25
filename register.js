
document.addEventListener("DOMContentLoaded", function() {
    const registerForm = document.getElementById("registerForm");
    const newUsername = document.getElementById("newUsername");
    const newEmail = document.getElementById("newEmail");
    const newPassword = document.getElementById("newPassword");
    const usernameError = document.getElementById("newUsernameError");
    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("newPasswordError");

    registerForm.addEventListener("submit", function(event) {
        let valid = true;

        // Clear previous error messages
        usernameError.style.display = "none";
        emailError.style.display = "none";
        passwordError.style.display = "none";

        // Validate username
        if (newUsername.value.trim() === "") {
            usernameError.style.display = "block";
            valid = false;
        }

        // Validate email
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (newEmail.value.trim() === "" || !emailPattern.test(newEmail.value.trim())) {
            emailError.style.display = "block";
            valid = false;
        }

        // Validate password
        if (newPassword.value.trim() === "") {
            passwordError.style.display = "block";
            valid = false;
        }

        // Prevent form submission if validation fails
        if (!valid) {
            event.preventDefault();
        }
    });
});
