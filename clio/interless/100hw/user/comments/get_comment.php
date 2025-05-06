<?php

    // Recupera posts do banco de dados
    $sql = "
        SELECT p.id_post, p.user_id, p.post_type, p.created_at,
            t.title_post_content AS text_title, t.content_post AS text_content
        FROM posts p
        LEFT JOIN post_content t ON p.post_type = 'text' AND p.post_id = t.id_post_content
        WHERE p.user_id = ?
        ORDER BY p.created_at DESC";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $posts = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    }


    // Recupera comentários para cada post
    $comments = [];
    foreach ($posts as $post) {
        $post_id = $post['id_post'];
        $sql = "SELECT c.*, u.username_hw FROM comments c INNER JOIN register_gch u ON c.user_id = u.user_hw_id WHERE post_id = ? ORDER BY created_at ASC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $post_comments = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $post_comments[] = $row;
            }
        }
        $comments[$post_id] = $post_comments;
    }


    return ['posts' => $posts, 'comments' => $comments];
?>
