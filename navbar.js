// JavaScript for Mobile Hamburger Menu
document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector(".hamburger");
  const navbarMenu = document.querySelector(".navbar-menu");

  hamburger.addEventListener("click", () => {
    navbarMenu.classList.toggle("open");
    hamburger.classList.toggle("open");
  });
});

// Inbox Script

document.addEventListener("DOMContentLoaded", () => {
  const inboxLink = document.getElementById("inboxLink");
  const inboxPanel = document.getElementById("inboxPanel");
  const closeInbox = document.getElementById("closeInbox");
  const overlay = document.getElementById("overlay");

  // Open the Inbox Panel
  inboxLink.addEventListener("click", (e) => {
    e.preventDefault();
    inboxPanel.classList.add("active");
    overlay.classList.add("active");
  });

  // Close the Inbox Panel
  closeInbox.addEventListener("click", () => {
    inboxPanel.classList.remove("active");
    overlay.classList.remove("active");
  });

  // Close the Inbox when clicking outside (on overlay)
  overlay.addEventListener("click", () => {
    inboxPanel.classList.remove("active");
    overlay.classList.remove("active");
  });
});

// Example: Submitting Contact Us Form via AJAX
document.querySelector("#contactForm").addEventListener("submit", (e) => {
  e.preventDefault();

  const formData = new FormData(e.target);
  fetch("contact.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === "success") {
        alert(data.message);
      } else {
        alert(data.message);
      }
    })
    .catch((err) => console.error("Error:", err));
});
