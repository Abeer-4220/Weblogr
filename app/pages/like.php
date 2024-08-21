<?php
include '../app/config.php'; // Include your database configuration
$postId = $_POST['post_id'];

// Check if the user already liked the post (you can use session/user authentication)
$userIp = $_SERVER['REMOTE_ADDR'];
$query = "SELECT * FROM likes WHERE post_id = :postId AND user_ip = :userIp";
$result = query_row($query, ['postId' => $postId, 'userIp' => $userIp]);

if (!$result) {
    // User hasn't liked the post, so add a new like
    $insertQuery = "INSERT INTO likes (post_id, user_ip) VALUES (:postId, :userIp)";
    query($insertQuery, ['postId' => $postId, 'userIp' => $userIp]);
}

// Get and return the updated like count
$likeCountQuery = "SELECT COUNT(*) as count FROM likes WHERE post_id = :postId";
$likeCount = $query_value($likeCountQuery, ['postId' => $postId]);
echo $likeCount;
?>
