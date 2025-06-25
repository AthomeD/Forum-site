
    // Handle login form submission
    loginForm.addEventListener("submit", (event) => {
        event.preventDefault(); // Prevent form reload
        const formData = new FormData(loginForm);
    
        fetch("login.php", {
            method: "POST",
            body: formData,
        })
        .then((response) => response.text())
        .then((data) => {
            if (data.includes("success")) {
                const username = data.split(":")[1]; // Extract username from response
                window.location.href = `profile.php?user=${username}`;
            } else {
                alert(data || "Invalid login credentials.");
            }
        })
        .catch((error) => console.error("Error:", error));
    });
    
