<?php
function insertPost($conn, $user_id, $post_type, $post_id) {
    $sql_post = "INSERT INTO posts (user_id, post_type, post_id) VALUES (?, ?, ?)";
    $stmt_post = $conn->prepare($sql_post);
    $stmt_post->bind_param("isi", $user_id, $post_type, $post_id);
    $stmt_post->execute();
    $stmt_post->close();
}
?>