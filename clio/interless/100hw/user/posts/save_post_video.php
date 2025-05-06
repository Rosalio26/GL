<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title_post_video'];
    $video_url = $_FILES['media_file']['name'];
    $upload_dir = 'user/posts/files_post/uploads/videos/';

    // Criar diretório se não existir
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Mover o arquivo para o diretório desejado
    $video_path = $upload_dir . basename($video_url);
    if (move_uploaded_file($_FILES['media_file']['tmp_name'], $video_path)) {
        // Inserir na tabela video_posts
        $sql_video = "INSERT INTO post_video (user_id, title_post_video, video_url) VALUES (?, ?, ?)";
        $stmt_video = $conn->prepare($sql_video);
        $stmt_video->bind_param("iss", $user_id, $title, $video_path);
        $stmt_video->execute();
        $video_post_id = $stmt_video->insert_id;
        $stmt_video->close();

        // Inserir na tabela posts
        insertPost($conn, $user_id, 'video', $video_post_id);

        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao mover o arquivo.";
    }
}
?>


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $user_id = $_SESSION['user_id'];
//     $title = $_POST['title_post_video'];
//     $video_url = $_FILES['media_file']['name'];

//     // Mover o arquivo para o diretório desejado
//     move_uploaded_file($_FILES['media_file']['tmp_name'], "uploads/" . $video_url);

//     // Inserir na tabela video_posts
//     $sql_video = "INSERT INTO video_posts (user_id, video_title, video_url) VALUES (?, ?, ?)";
//     $stmt_video = $conn->prepare($sql_video);
//     $stmt_video->bind_param("iss", $user_id, $title, $video_url);
//     $stmt_video->execute();
//     $video_post_id = $stmt_video->insert_id;
//     $stmt_video->close();

//     // Inserir na tabela posts
//     insertPost($conn, $user_id, 'video', $video_post_id);

//     header("Location: index.php");
//     exit();
// }