<?php
    session_start();
    include('../instance/dbinterless.php');

    if (!isset($_SESSION['username_hw'])) {
        header("Location: ./form_reg_log/login.php");
        exit();
    }

    if (!isset($_SESSION['user_id'])) {
        header("Location: ./form_reg_log/login.php");
        exit();
    }

    $user_id = $_SESSION['user_id'];

    //===================================
    //Obter todos os usuarios registrados
    //===================================
    $sql_register_user = "SELECT * FROM register_gch WHERE user_hw_id != '$user_id'";
    $result_register_user = $conn->query($sql_register_user);



    //===================================
    //Obter os detalhes do usuario
    //===================================
    $sql_details_user = "SELECT * FROM register_gch WHERE user_hw_id='$user_id'";
    $result_details_user = $conn->query($sql_details_user);

    if ($result_details_user->num_rows > 0) {
        $user_details = $result_details_user->fetch_assoc();
    } else {
        die("Usuario nao encotrado");
    }
    // $sql = "SELECT * FROM register_gch WHERE user_hw_id='$user_id'";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     $user = $result->fetch_assoc();
    // } else {
    //     die("Usuario nao encotrado");
    // }


    //============================
    // Enviar pedido de amizade
    //============================
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['receiver_id'])) {
        $receiver_id = $_POST['receiver_id'];

        // Verificar se o pedido de amizade já foi enviado
        $sql_check_pending_set = "SELECT * FROM friend_requests WHERE (sender_id='$user_id' AND receiver_id='$receiver_id') OR (sender_id='$receiver_id' AND receiver_id='$user_id')";
        $result_check_pending_set = $conn->query($sql_check_pending_set);

        if ($result_check_pending_set->num_rows > 0) {
            echo "Pedido de amizade já existente entre esses usuários!";
        } else {
            $sql_set_pending = "INSERT INTO friend_requests (sender_id, receiver_id) VALUES ('$user_id', '$receiver_id')";
            if ($conn->query($sql_set_pending) === TRUE) {
                echo "Pedido de amizade enviado!";
            } else {
                echo "Erro: " . $sql_set_pending . "<br>" . $conn->error;
            }
        }
    }

    
    
    // Aceitar pedido de amizade
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aceitar_id'])) {
        $aceitar_id = $_POST['aceitar_id'];
        $sql_accept_request = "UPDATE friend_requests SET status='accepted' WHERE request_id='$aceitar_id' AND receiver_id='$user_id'";
        if ($conn->query($sql_accept_request) === TRUE) {
            echo "Pedido de amizade aceito!";
        } else {
            echo "Erro: " . $sql_accept_request . "<br>" . $conn->error;
        }
    }

    //============================
    // Remover pedido de amizade
    //============================
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_request_id'])) {
        $remove_request_id = $_POST['remove_request_id'];

        // Remover o pedido de amizade de ambos os lados
        $sql_remove = "DELETE FROM friend_requests WHERE (sender_id='$user_id' AND receiver_id='$remove_request_id') OR (sender_id='$remove_request_id' AND receiver_id='$user_id')";
        if ($conn->query($sql_remove) === TRUE) {
            echo "Pedido de amizade removido!";
        } else {
            echo "Erro ao remover pedido de amizade: " . $conn->error;
        }
    }


    //==================================
    // Obter detalhes dos amigos
    //==================================
    
    //==================================
    // Obter pedidos de amizade aceitos
    //==================================
    // $sql_all_pending = "SELECT * FROM friend_requests WHERE  (sender_id = '$user_id' OR receiver_id = '$user_id') AND status='accepted'";
    // $result_all_pending = $conn->query($sql_all_pending);


        $sql_accepted_friend = "
        SELECT u.user_hw_id, u.username_hw, u.personalname_hw, u.email_hw, u.profile_image
        FROM register_gch u
        INNER JOIN friend_requests f
        ON (u.user_hw_id = f.sender_id OR u.user_hw_id = f.receiver_id)
        WHERE f.status = 'accepted' AND (f.sender_id = ? OR f.receiver_id = ?)
        AND u.user_hw_id != ?
        ORDER BY u.username_hw ASC";

        $stmt_accepted_friend = $conn->prepare($sql_accepted_friend);
        // Verificar se a preparação da consulta foi bem-sucedida
        if ($stmt_accepted_friend) {
            $stmt_accepted_friend->bind_param("iii", $user_id, $user_id, $user_id);
            $stmt_accepted_friend->execute();
            $result_accepted_friend = $stmt_accepted_friend->get_result();

            $friends_accepted = [];
            // Verificar se o resultado não é nulo
            if ($result_accepted_friend && $result_accepted_friend->num_rows > 0) {
                while ($row_accepted = $result_accepted_friend->fetch_assoc()) {
                    // $friends_accepted[] = $row_accepted;
                    $friends_accepted[$row_accepted['user_hw_id']] = $row_accepted;
                }
            }
            // Liberar os recursos do resultado
            $result_accepted_friend->free();
        } else {
            echo "Erro na preparação da consulta: " . $conn->error;
        }
        // Fechar a declaração
        $stmt_accepted_friend->close();
    //     $stmt_accepted_friend = $conn->prepare($sql_accepted_friend);
    //     $stmt_accepted_friend->bind_param("iii", $user_id, $user_id, $user_id);
    //     $stmt_accepted_friend->execute();
    //     $result_accepted_friend = $stmt_accepted_friend->get_result();

    //     $friends_accepted = [];
    //     if ($result_accepted_friend->num_rows > 0) {
    //         while ($row_accepted = $result_accepted_friend->fetch_assoc()) {
    //             $friends_accepted[] = $row_accepted;
    //         }
    //     }
    //     // Liberar os recursos do resultado
    //     $result_accepted_friend->free();
    // } else {
    //     echo "Erro na preparação da consulta: " . $conn->error;
    // }

        
        //====================================
        // Obter pedidos de amizade pendentes
        //====================================
        $sql_pending_friend = "SELECT u.user_hw_id, u.username_hw, u.email_hw FROM friend_requests fr JOIN register_gch u ON fr.receiver_id = u.user_hw_id WHERE fr.sender_id='$user_id' AND fr.status='pending'
                UNION
                SELECT u.user_hw_id, u.username_hw, u.email_hw FROM friend_requests fr JOIN register_gch u ON fr.sender_id = u.user_hw_id WHERE fr.receiver_id='$user_id' AND fr.status='pending'";
        $result_pending_friend = $conn->query($sql_pending_friend);


        //====================================
        // Obter pedidos de amizade rejeitados
        //====================================
        $sql_rejected_friend = "SELECT u.user_hw_id, u.username_hw, u.email_hw FROM friend_requests fr JOIN register_gch u ON fr.receiver_id = u.user_hw_id WHERE fr.sender_id='$user_id' AND fr.status='rejected'
                UNION
                SELECT u.user_hw_id, u.username_hw, u.email_hw FROM friend_requests fr JOIN register_gch u ON fr.sender_id = u.user_hw_id WHERE fr.receiver_id='$user_id' AND fr.status='rejected'";
        $result_rejected_friend = $conn->query($sql_rejected_friend);
    

    
    //====================================
    //Obter os posts dos usuarios
    //====================================
    
    $sql_post = "
    SELECT p.id_post, p.user_id, p.post_type, p.created_at,
           t.title_post_content AS text_title, t.content_post AS text_content,
           v.title_post_video AS video_title, v.video_url,
           i.title_post_photo AS image_title, i.image_url,
           m.title_post_music AS music_title, m.music_url
    FROM posts p
    LEFT JOIN post_content t ON p.post_type = 'text' AND p.post_id = t.id_post_content
    LEFT JOIN post_video v ON p.post_type = 'video' AND p.post_id = v.id_post_video
    LEFT JOIN post_photo i ON p.post_type = 'image' AND p.post_id = i.id_post_photo
    LEFT JOIN post_music m ON p.post_type = 'music' AND p.post_id = m.id_post_music
    WHERE p.user_id = ?
    ORDER BY p.created_at DESC";

    $stmt_post = $conn->prepare($sql_post);
    $stmt_post->bind_param("i", $user_id);
    $stmt_post->execute();
    $result_post = $stmt_post->get_result();

    $posts = [];
    if ($result_post->num_rows > 0) {
        while ($row = $result_post->fetch_assoc()) {
            $posts[] = $row;
        }
    }
    $stmt_post->close();

        // //Obter posts de conteudos
        // $sql_post_content = "SELECT id_post, user_id, title_post, content_post, media_type, media_url, created_at FROM posts WHERE user_id = ? AND media_type = 'text_post' ORDER BY created_at DESC";
        // $stmt_post_content = $conn->prepare($sql_post_content);
        // $stmt_post_content->bind_param("i", $user_id);
        // $stmt_post_content->execute();
        // $result_post_content = $stmt_post_content->get_result();
        // // $result_post_content = $conn->query($sql_post_content);

        // $posts_content = [];
        // if ($result_post_content->num_rows > 0) {
        //     while($row = $result_post_content->fetch_assoc()) {
        //         $posts_content[] = $row;
        //     }
        // }

        function insertPost($conn, $user_id, $post_type, $post_id) {
            $sql_post = "INSERT INTO posts (user_id, post_type, post_id) VALUES (?, ?, ?)";
            $stmt_post = $conn->prepare($sql_post);
            $stmt_post->bind_param("isi", $user_id, $post_type, $post_id);
            $stmt_post->execute();
            $stmt_post->close();
        }

        // Obter posts de conteúdos
        $sql_post_content = "
        SELECT * FROM post_content
        WHERE user_id = ?
        ORDER BY created_at DESC";

        $stmt_post_content = $conn->prepare($sql_post_content);
        $stmt_post_content->bind_param("i", $user_id);
        $stmt_post_content->execute();
        $result_post_content = $stmt_post_content->get_result();

        // Armazenar os resultados
        $posts_content = [];
        if ($result_post_content->num_rows > 0) {
        while ($row = $result_post_content->fetch_assoc()) {
            $posts_content[] = $row;
        }
        }


        //Obter posts de videos
        $sql_post_video = "
        SELECT * FROM post_video
        WHERE user_id = ?
        ORDER BY created_at DESC";

        $stmt_post_video = $conn->prepare($sql_post_video);
        $stmt_post_video->bind_param("i", $user_id);
        $stmt_post_video->execute();
        $result_post_video = $stmt_post_video->get_result();
        // $result_post_video = $conn->query($sql_post_video);

        $posts_video = [];
        if ($result_post_video->num_rows > 0) {
            while($row = $result_post_video->fetch_assoc()) {
                $posts_video[] = $row;
            }
        }

        //Obter posts de Musicas
        $sql_post_music = "
        SELECT * FROM post_music
        WHERE user_id = ?
        ORDER BY created_at DESC";

        $stmt_post_music = $conn->prepare($sql_post_music);
        $stmt_post_music->bind_param("i", $user_id);
        $stmt_post_music->execute();
        $result_post_music = $stmt_post_music->get_result();
        // $result_post_music = $conn->query($sql_post_music);

        $posts_music = [];
        if ($result_post_music->num_rows > 0) {
            while($row = $result_post_music->fetch_assoc()) {
                $posts_music[] = $row;
            }
        }

        //Obter posts de Fotografias
        $sql_post_photo = "
        SELECT * FROM post_photo
        WHERE user_id = ?
        ORDER BY created_at DESC";

        $stmt_post_photo = $conn->prepare($sql_post_photo);
        $stmt_post_photo->bind_param("i", $user_id);
        $stmt_post_photo->execute();
        $result_post_photo = $stmt_post_photo->get_result();
        // $result_post_photo = $conn->query($sql_post_photo);

        $posts_photo = [];
        if ($result_post_photo->num_rows > 0) {
            while($row = $result_post_photo->fetch_assoc()) {
                $posts_photo[] = $row;
            }
        }

    //====================================
    //Obter os posts dos Amigos
    //====================================
    $sql_post_friend = "
        SELECT p.id_post, p.user_id, p.post_type, p.created_at, u.user_hw_id, u.username_hw,
            t.title_post_content AS text_title, t.content_post AS text_content,
            v.title_post_video AS video_title, v.video_url,
            i.title_post_photo AS image_title, i.image_url,
            m.title_post_music AS music_title, m.music_url

        FROM posts p
        
        LEFT JOIN post_content t ON p.post_type = 'text' AND p.post_id = t.id_post_content
        LEFT JOIN post_video v ON p.post_type = 'video' AND p.post_id = v.id_post_video
        LEFT JOIN post_photo i ON p.post_type = 'image' AND p.post_id = i.id_post_photo
        LEFT JOIN post_music m ON p.post_type = 'music' AND p.post_id = m.id_post_music

        INNER JOIN register_gch u ON p.user_id = u.user_hw_id
        INNER JOIN friend_requests f ON (p.user_id = f.sender_id OR p.user_id = f.receiver_id)
        WHERE f.status = 'accepted' AND (f.sender_id = ? OR f.receiver_id = ?)

        AND p.user_id != ?
        ORDER BY p.created_at DESC";

    $stmt_post_friend = $conn->prepare($sql_post_friend);
    $stmt_post_friend->bind_param("iii", $user_id, $user_id, $user_id);
    $stmt_post_friend->execute();
    $result_post_friend = $stmt_post_friend->get_result();

    $posts_friend = [];
    if ($result_post_friend->num_rows > 0) {
        while ($row = $result_post_friend->fetch_assoc()) {
            $posts_friend[] = $row;
        }
    }
    

    $sql_replay_comment = "SELECT * FROM comments WHERE parent_id = ? ORDER BY created_at ASC";
    $stmt_replay_comment = $conn->prepare($sql_replay_comment);
    $stmt_replay_comment->bind_param("i", $parent_id);
    $stmt_replay_comment->execute();
    $result_replay_comment = $stmt_replay_comment->get_result();


    
// Função para obter o número de likes (Gostos)
function get_like_count($comment_post, $conn) {
    $sql = "SELECT likes FROM comments WHERE id_comment = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $comment_post);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row['likes'];
}

// Função para obter o número de envios (compartilhamentos)
function get_share_count($comment_id, $conn) {
    $sql = "SELECT shares FROM comments WHERE id_comment = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $comment_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row['shares'];
}


    // Função para obter os detalhes do usuário
    function get_username($user_id, $conn) {
        $sql_details_user = "SELECT * FROM register_gch WHERE user_hw_id = ?";
        $stmt = $conn->prepare($sql_details_user);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            die("Usuário não encontrado");
        }
    }
?>