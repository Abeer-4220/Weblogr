<title>Post - <?= APP_NAME ?></title>
<?php include '../app/pages/includes/header.php'; ?>
<style>
    @media (max-width: 768px) {
        .comment {
            width: 60%;
        }
    }

    @media (max-width: 450px) {
        .comment {
            width: 90%;
        }
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
        function toggleLike(contentId) {
            // Simulate AJAX request to the backend
            $.post('like_unlike.php', { content_id: contentId }, function (response) {
                if (response == 'like') {
                    // Update UI for "liked" state
                    $('#likeButton').text('Liked');
                    $('#likeButton').attr('disabled', true); // Disable button after liked
                } else if (response == 'unlike') {
                    // Update UI for "unliked" state
                    $('#likeButton').text('Like');
                } else if (response == 'not_authenticated') {
                    // Handle case when user is not logged in
                    alert('Please log in to like/unlike.');
                }
            });
        }
    </script>
<div class="mx-auto col-md-10">
    <!-- <h3 class="mx-4 my-3 text-center">Blog</h3> -->

    <div class="row my-2">

        <?php

        $slug = $url[1] ?? null;

        if ($slug) {
            $query = "select posts.*,categories.category from posts join categories on posts.category_id = categories.id where posts.slug = :slug limit 1";
            $row = query_row($query, ['slug' => $slug]);
        }

        if (!empty($row)) { ?>

            <div class="col-md-12">
                <div class="g-0 border rounded overflow-hidden flex-md-row mb-4 shadow position-relative">
                    <div class="col-12 d-lg-block">
                        <img class="bd-placeholder-img w-100" width="100%" style="object-fit:cover;" src="<?= get_image($row['image']) ?>">
                    </div>
                    <div class="col p-4 d-flex flex-column position-static">
                        <div>
                            <strong class="fs-2 d-inline-block text-primary"><?= esc($row['category'] ?? 'Unknown') ?></strong>
                            <span class="text-muted mt-2 float-end"><?= date("jS M, Y", strtotime($row['date'])) ?></span>
                        </div>
                        <div>
                            <strong class="fs-3 text-info"><?= esc($row['title']) ?></strong>
                            <button class="btn btn-primary like-btn col-md-1 float-end" id="likeButton" onclick="toggleLike(1)" data-post-id="<?= $row['id'] ?>">Like</button>
                        </div>
                        <hr>
                        <p class="card-text mb-auto"><?= nl2br(add_root_to_images($row['content'])) ?></p>
                    </div>
                </div>
                <div class="col d-flex flex-column col-6 ps-4 comment">
                    <form class="comment-form" data-post-id="<?= $row['id'] ?>">
                        <div class="form-group">
                            <label class="mb-1" for="commentName">Your Name:</label>
                            <input type="text" class="form-control mb-3" id="commentName" name="commentName" required>
                        </div>
                        <div class="form-group">
                            <label class="mb-1" for="commentText">Your Comment:</label>
                            <textarea class="form-control mb-3" id="commentText" name="commentText" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    </div>
    <script>
        // blog.js
        $(document).ready(function() {
            // Like button click event
            $('.like-btn').on('click', function() {
                var postId = $(this).data('post-id');
                $.ajax({
                    url: 'like.php',
                    method: 'POST',
                    data: {
                        postId: postId
                    },
                    success: function(response) {
                        alert('Post liked!');
                    }
                });
            });

            // Comment form submission
            $('.comment-form').submit(function(event) {
                event.preventDefault();
                var postId = $(this).data('post-id');
                var commentData = $(this).serialize();
                $.ajax({
                    url: 'comment.php',
                    method: 'POST',
                    data: commentData + '&postId=' + postId,
                    success: function(response) {
                        alert('Comment added!');
                    }
                });
            });
        });
    </script>

    <?php
            // like.php
            require_once 'db.php'; // Include your database connection file
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $postId = $_POST['postId'];
                $userIp = $_SERVER['REMOTE_ADDR'];
                $query = "INSERT INTO likes (post_id, user_ip) VALUES (:postId, :userIp)";
                $params = ['postId' => $postId, 'userIp' => $userIp];
                // Execute query (Use your database handling functions)
            }
            // comment.php
            require_once 'db.php'; // Include your database connection file
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $postId = $_POST['postId'];
                $userName = $_POST['commentName'];
                $commentText = $_POST['commentText'];
                $query = "INSERT INTO comments (post_id, user_name, comment_text) VALUES (:postId, :userName, :commentText)";
                $params = ['postId' => $postId, 'userName' => $userName, 'commentText' => $commentText];
                // Execute query (Use your database handling functions)
            }
    ?>


<?php
        } else {
            echo "No items found!";
        }

?>

</div>


</div>
<?php include '../app/pages/includes/footer.php'; ?>