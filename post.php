<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Post</title>
  <style>
    /* body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to bottom right, #6a11cb, #2575fc);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #333;
    } */

    .post-container {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to bottom right, #6a11cb, #2575fc);
      /* background: #ffffff; */
      border-radius: 15px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      padding: 30px;
      width: 100%;
      max-width: 1240px;
      animation: fadeIn 0.8s ease-in-out;
      margin-left: 330px;
      /* margin-right: 400px; */
      margin-bottom: 10px;

    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: scale(0.9);
      }

      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    .post-container h1 {
      text-align: center;
      font-size: 1.8em;
      margin-bottom: 20px;
      /* color: #4a4a4a; */

    }

    .form-group {
      margin-bottom: 20px;
      position: relative;
    }

    .form-group label {
      font-weight: bold;
      display: block;
      margin-bottom: 8px;
      color: white;
      transition: all 0.3s ease-in-out;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      width: 100%;
      padding: 12px;
      font-size: 1em;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
      transition: box-shadow 0.3s, border-color 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
      border-color: #2575fc;
      box-shadow: 0 0 8px rgba(37, 117, 252, 0.4);
      outline: none;
    }

    .form-group textarea {
      resize: vertical;
      min-height: 120px;
    }

    .form-actions {
      text-align: center;
    }

    .form-actions button {
      background: linear-gradient(to right, #6a11cb, #2575fc);
      color: #fff;
      border: none;
      padding: 12px 20px;
      font-size: 1em;
      font-weight: bold;
      border-radius: 25px;
      cursor: pointer;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .form-actions button:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
    }

    .form-actions button:active {
      transform: translateY(0);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
  <div class="post-container">
    <h1>Create a New Post</h1>
    <form>
      <div class="form-group">
        <label for="post-title">Title</label>
        <input type="text" id="post-title" name="post-title" placeholder="Enter the title of your post" required>
      </div>
      <div class="form-group">
        <label for="post-content">Content</label>
        <textarea id="post-content" name="post-content" placeholder="Write your content here" required></textarea>
      </div>
      <div class="form-group">
        <label for="post-category">Category</label>
        <select id="post-category" name="post-category" required>
          <option value="" disabled selected>Select a category</option>
          <option value="general">General</option>
          <option value="discussion">Discussion</option>
          <option value="questions">Questions</option>
          <option value="feedback">Feedback</option>
        </select>
      </div>
      <div class="form-actions">
        <button type="submit">Submit Post</button>
      </div>
    </form>
  </div>
</body>

</html>

<?php
// Include database connection
include 'connection.php'; // Make sure this file is correctly included

// Check if form is submitted
if (isset($_POST['submit'])) {
  // Sanitize and trim input values
  $postTitle = trim($_POST['post-title']);
  $postContent = trim($_POST['post-content']);
  $postCategory = trim($_POST['post-category']);

  // Check if inputs are valid
  if (empty($postTitle) || empty($postContent) || empty($postCategory)) {
    echo "All fields are required.";
    exit;
  }

  // Prepare the query to insert the post into the database
  $stmt = $conn->prepare("INSERT INTO posts (title, content, category) VALUES (?, ?, ?)");
  $stmt->bind_param('sss', $postTitle, $postContent, $postCategory);

  // Execute the query
  if ($stmt->execute()) {
    // Redirect to a page after successful post creation (e.g., post list or the new post itself)
    header("Location: view_post.php?id=" . $stmt->insert_id); // Adjust according to your setup
    exit;
  } else {
    // Log error and show a message if something goes wrong
    error_log("Database error: " . $conn->error);
    echo "An error occurred, please try again later.";
  }

  // Close statement
  $stmt->close();
}

// Close the database connection
$conn->close();
?>