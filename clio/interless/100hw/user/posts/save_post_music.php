<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title_post_music'];
    $music_url = $_FILES['media_file']['name'];
    $upload_dir = 'user/posts/files_post/uploads/music/';

    // Criar diretório se não existir
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Mover o arquivo para o diretório desejado
    $music_path = $upload_dir . basename($music_url);
    if (move_uploaded_file($_FILES['media_file']['tmp_name'], $music_path)) {
        // Inserir na tabela video_posts
        $sql_music = "INSERT INTO post_music (user_id, title_post_music, music_url) VALUES (?, ?, ?)";
        $stmt_music = $conn->prepare($sql_music);
        $stmt_music->bind_param("iss", $user_id, $title, $music_path);
        $stmt_music->execute();
        $music_post_id = $stmt_music->insert_id;
        $stmt_music->close();

        // Inserir na tabela posts
        insertPost($conn, $user_id, 'music', $music_post_id);

        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao mover o arquivo.";
    }
}
?>