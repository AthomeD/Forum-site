<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <div class="post-detail">
        <h1><?php echo $post['title']; ?></h1>
        <p><?php echo $post['content']; ?></p>
        <span class="category"><?php echo $post['category']; ?></span>
        <p><strong>Posted on:</strong> <?php echo $post['created_at']; ?></p>

        <div class="comments-section">
            <h3>Comments</h3>
            <?php
            // Fetch comments for this post
            $commentQuery = "SELECT * FROM comments WHERE post_id = $postId";
            $commentResult = mysqli_query($conn, $commentQuery);

            if ($commentResult) {
                while ($comment = mysqli_fetch_assoc($commentResult)) {
                    echo "<div class='comment'>";
                    echo "<p><strong>User {$comment['user_id']}:</strong> {$comment['comment']}</p>";
                    echo "</div>";
                }
            }
            ?>

            <!-- Comment Form -->
            <form method="POST">
                <textarea name="comment" placeholder="Add a comment" required></textarea><br>
                <input type="hidden" name="user_id" value="1"> <!-- Replace with actual logged-in user ID -->
                <button type="submit">Post Comment</button>
            </form>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>

<?php
include 'connection.php';

if (isset($_GET['post_id'])) {
    $postId = $_GET['post_id'];

    // Fetch post details
    $query = "SELECT * FROM posts WHERE post_id = $postId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $post = mysqli_fetch_assoc($result);
    } else {
        echo "Error: Post not found.";
        exit();
    }
}

// Handle comment submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['user_id']; // Assume user_id is passed via POST
    $comment = $_POST['comment'];

    $commentQuery = "INSERT INTO comments (post_id, user_id, comment) VALUES ($postId, $userId, '$comment')";
    $commentResult = mysqli_query($conn, $commentQuery);

    if ($commentResult) {
        echo "Comment posted successfully!";
    } else {
        echo "Failed to post comment.";
    }
}

mysqli_close($conn);
?>