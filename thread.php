<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum Threads</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
        }

        .forum-thread {
            max-width: 800px;
            margin: 0 auto;
            background: linear-gradient(90deg, #8e2de2, #4a00e0);
            /* background-color: white; */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
            margin-bottom: 20px;
        }

        .forum-thread h1 {
            text-align: center;
            color: white;
            font-size: 2rem;
            margin-bottom: 30px;
        }

        .thread-post {
            border-bottom: 1px solid #e0e0e0;
            padding: 20px 0;
        }

        .thread-post:last-child {
            border-bottom: none;
        }

        .thread-title {
            color: white;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .thread-author {
            color: white;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .thread-content {
            color: white;
            font-size: 1rem;
            margin-bottom: 15px;
        }

        .post-actions {
            font-size: 0.9rem;
        }

        .reply-link, .like-link {
            color: white;
            text-decoration: none;
            margin-right: 15px;
        }

        .reply-link:hover, .like-link:hover {
            text-decoration: underline;
        }

        .reply-form {
            display: none;
            margin-top: 20px;
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 5px;
        }

        .like-count {
            font-weight: bold;
            color: white;
        }
    </style>
</head>
<body>
<?php include 'navbar.php' ?>
    <div class="forum-thread">
        <h1>General Discussions</h1>

        <!-- Thread 1 -->
        <div class="thread-post" id="thread1">
            <h2 class="thread-title">How to create a website?</h2>
            <p class="thread-author">Posted by <strong>JohnDoe</strong> on 25 Nov 2024</p>
            <p class="thread-content">I'm trying to create a website, but I'm not sure where to start. Can anyone give me some advice or point me in the right direction?</p>
            <div class="post-actions">
                <a href="#" class="reply-link" onclick="toggleReplyForm('reply-form1')">Reply</a> | 
                <a href="#" class="like-link" onclick="toggleLike('like-count1')">Like</a>
                <span class="like-count" id="like-count1">0</span>
            </div>
            <div class="reply-form" id="reply-form1">
                <textarea placeholder="Write your reply..." rows="4" style="width: 100%;"></textarea>
                <br>
                <button onclick="submitReply('reply-form1')">Submit Reply</button>
            </div>
        </div>

        <!-- Thread 2 -->
        <div class="thread-post" id="thread2">
            <h2 class="thread-title">Best practices for PHP development?</h2>
            <p class="thread-author">Posted by <strong>JaneSmith</strong> on 24 Nov 2024</p>
            <p class="thread-content">I am working on a PHP project and would love to know the best practices to follow. Any tips?</p>
            <div class="post-actions">
                <a href="#" class="reply-link" onclick="toggleReplyForm('reply-form2')">Reply</a> | 
                <a href="#" class="like-link" onclick="toggleLike('like-count2')">Like</a>
                <span class="like-count" id="like-count2">0</span>
            </div>
            <div class="reply-form" id="reply-form2">
                <textarea placeholder="Write your reply..." rows="4" style="width: 100%;"></textarea>
                <br>
                <button onclick="submitReply('reply-form2')">Submit Reply</button>
            </div>
        </div>

        <!-- Thread 3 -->
        <div class="thread-post" id="thread3">
            <h2 class="thread-title">What is your favorite JavaScript framework?</h2>
            <p class="thread-author">Posted by <strong>CoderX</strong> on 23 Nov 2024</p>
            <p class="thread-content">I'm curious to know which JavaScript framework is the most popular and why. Please share your experiences!</p>
            <div class="post-actions">
                <a href="#" class="reply-link" onclick="toggleReplyForm('reply-form3')">Reply</a> | 
                <a href="#" class="like-link" onclick="toggleLike('like-count3')">Like</a>
                <span class="like-count" id="like-count3">0</span>
            </div>
            <div class="reply-form" id="reply-form3">
                <textarea placeholder="Write your reply..." rows="4" style="width: 100%;"></textarea>
                <br>
                <button onclick="submitReply('reply-form3')">Submit Reply</button>
            </div>
        </div>

    </div>

    <script>
        // Toggle the reply form visibility
        function toggleReplyForm(formId) {
            var form = document.getElementById(formId);
            form.style.display = form.style.display === 'block' ? 'none' : 'block';
        }

        // Toggle like count
        function toggleLike(likeId) {
            var likeCountElement = document.getElementById(likeId);
            var currentLikeCount = parseInt(likeCountElement.innerText);
            likeCountElement.innerText = currentLikeCount + 1;
        }

        // Submit reply (simple placeholder functionality)
        function submitReply(formId) {
            var form = document.getElementById(formId);
            var textarea = form.querySelector('textarea');
            if (textarea.value) {
                alert('Reply submitted: ' + textarea.value);
                textarea.value = '';  // Clear the textarea
                form.style.display = 'none';  // Hide the reply form after submission
            } else {
                alert('Please write a reply before submitting.');
            }
        }
    </script>

<?php include 'footer.php' ?>
</body>
</html>
