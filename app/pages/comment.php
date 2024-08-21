<?php
include '../app/config.php'; // Include your database configuration
$postId = $_POST['post_id'];
$commentText = $_POST['comment_text'];

// Insert the new comment into the database
$insertQuery = "INSERT INTO comments (post_id, user_name, comment_text) VALUES (:postId, 'Anonymous', :commentText)";
query($insertQuery, ['postId' => $postId, 'commentText' => $commentText]);

// Load and return the updated comments
$loadCommentsQuery = "SELECT * FROM comments WHERE post_id = :postId ORDER BY created_at DESC";
$comments = $query_all($loadCommentsQuery, ['postId' => $postId]);

foreach ($comments as $comment) {
    echo '<p><strong>' . $comment['user_name'] . ':</strong> ' . $comment['comment_text'] . '</p>';
}
?>
