<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title_post_photo'];
    $photo_url = $_FILES['media_file']['name'];
    $upload_dir = 'user/posts/files_post/uploads/photos/';

    // Criar diretório se não existir
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Mover o arquivo para o diretório desejado
    $photo_path = $upload_dir . basename($photo_url);
    if (move_uploaded_file($_FILES['media_file']['tmp_name'], $photo_path)) {
        // Inserir na tabela post_photo
        $sql_image = "INSERT INTO post_photo (user_id, title_post_photo, image_url) VALUES (?, ?, ?)";
        $stmt_image = $conn->prepare($sql_image);
        $stmt_image->bind_param("iss", $user_id, $title, $photo_path);
        $stmt_image->execute();
        $image_post_id = $stmt_image->insert_id;
        $stmt_image->close();

        // Inserir na tabela posts
        insertPost($conn, $user_id, 'image', $image_post_id);

        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao mover o arquivo.";
    }
}



// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $user_id = $_SESSION['user_id'];
//     $title = $_POST['title_post_photo'];
//     $photo_url = $_FILES['media_file']['name'];
// 	$upload_dir = 'user/posts/files_post/uploads/photos/';

//     // Mover o arquivo para o diretório desejado
//     move_uploaded_file($_FILES['media_file']['tmp_name'], $upload_dir . $photo_url);
	
// 	// Criar diretório se não existir
//     if (!is_dir($upload_dir)) {
//         mkdir($upload_dir, 0777, true);
//     }

//     // Inserir na tabela image_posts
//     $sql_image = "INSERT INTO post_photo (user_id, title_post_photo, image_url) VALUES (?, ?, ?)";
//     $stmt_image = $conn->prepare($sql_image);
//     $stmt_image->bind_param("iss", $user_id, $title, $photo_url);
//     $stmt_image->execute();
//     $image_post_id = $stmt_image->insert_id;
//     $stmt_image->close();

//     // Inserir na tabela posts
//     insertPost($conn, $user_id, 'image', $image_post_id);

//     header("Location: index.php");
//     exit();
// }
?>