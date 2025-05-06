<?php
   
   
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $comment_id = $_POST['comment_id'];

    // Verifica se o comentário existe
    $sql_check_comment = "SELECT * FROM comments WHERE id_comment = ?";
    $stmt_check_comment = $conn->prepare($sql_check_comment);
    $stmt_check_comment->bind_param("i", $comment_id);
    $stmt_check_comment->execute();
    $result_check_comment = $stmt_check_comment->get_result();

    if ($result_check_comment->num_rows > 0) {
        // Verifica se o usuário já deu like no comentário
        $sql_check_like = "SELECT * FROM likes WHERE user_id = ? AND comment_id = ?";
        $stmt_check_like = $conn->prepare($sql_check_like);
        $stmt_check_like->bind_param("ii", $user_id, $comment_id);
        $stmt_check_like->execute();
        $result_check_like = $stmt_check_like->get_result();

        if ($result_check_like->num_rows == 0) {
            // Adiciona o like
            $sql = "INSERT INTO likes (user_id, comment_id) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $user_id, $comment_id);
            $stmt->execute();
            $stmt->close();

            // Atualiza o contador de likes na tabela comments
            $sql_update = "UPDATE comments SET likes = likes + 1 WHERE id_comment = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("i", $comment_id);
            $stmt_update->execute();
            $stmt_update->close();

            echo "Like adicionado com sucesso!";
        } else {
            echo "Você já deu like neste comentário.";
        }

        $stmt_check_like->close();
    } else {
        echo "Comentário não encontrado.";
    }

    $stmt_check_comment->close();
}
   
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $user_id = $_SESSION['user_id'];
//     $comment_id = $_POST['comment_id'];

//     // Verifica se o usuário já deu like no comentário
//     $sql_check = "SELECT * FROM likes WHERE user_id = ? AND comment_id = ?";
//     $stmt_check = $conn->prepare($sql_check);
//     $stmt_check->bind_param("ii", $user_id, $comment_id);
//     $stmt_check->execute();
//     $result_check = $stmt_check->get_result();

//     if ($result_check->num_rows == 0) {
//         // Adiciona o like
//         $sql_insert_like = "INSERT INTO likes (user_id, comment_id) VALUES (?, ?)";
//         $stmt_insert_like = $conn->prepare($sql_insert_like);
//         $stmt_insert_like->bind_param("ii", $user_id, $comment_id);
//         $stmt_insert_like->execute();
//         $stmt_insert_like->close();

//         // Atualiza o contador de likes na tabela comments
//         $sql_update = "UPDATE comments SET likes = likes + 1 WHERE id = ?";
//         $stmt_update = $conn->prepare($sql_update);
//         $stmt_update->bind_param("i", $comment_id);
//         $stmt_update->execute();
//         $stmt_update->close();

//         echo "Like adicionado com sucesso!";
//     } else {
//         echo "Você já deu like neste comentário.";
//     }

//     $stmt_check->close();
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_id'])) {
//     $comment_id = $_POST['comment_id'];
//     $user_id = $_SESSION['user_id'];

//     if (has_liked($user_id, $comment_id, $conn)) {
//         echo json_encode(['status' => 'error', 'message' => 'Você já deu like neste comentário.']);
//     } else {
//         // Adiciona o like ao banco de dados
//         $sql = "INSERT INTO likes (user_id, comment_id) VALUES (?, ?)";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param("ii", $user_id, $comment_id);
//         $stmt->execute();
//         $stmt->close();

//         // Atualiza o contador de likes na tabela comments
//         $sql_update = "UPDATE comments SET likes = likes + 1 WHERE id_comment = ?";
//         $stmt_update = $conn->prepare($sql_update);
//         $stmt_update->bind_param("i", $comment_id);
//         $stmt_update->execute();
//         $stmt_update->close();

//         echo json_encode(['status' => 'success', 'message' => 'Like adicionado com sucesso.']);
//     }
// }

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_comment'])) {
//     $comment_id = $_POST['id_comment'];
//     $user_id = $_SESSION['user_id'];

//     if (!has_liked($user_id, $comment_id, $conn)) {
//         $sql = "INSERT INTO likes (user_id, id_comment) VALUES (?, ?)";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param("ii", $user_id, $comment_id);
//         $stmt->execute();
//         $stmt->close();

//         // Atualize o contador de likes na tabela comments
//         $sql_update = "UPDATE comments SET likes = likes + 1 WHERE id_comment = ?";
//         $stmt_update = $conn->prepare($sql_update);
//         $stmt_update->bind_param("i", $comment_id);
//         $stmt_update->execute();
//         $stmt_update->close();

//         echo "Like adicionado com sucesso.";
//     } else {
//         echo "Você já deu like neste comentário.";
//     }
// }

// Obtém o ID do comentário
// $comment_id = $_POST['id_comment'];

// // Incrementa o número de curtidas
// $sql = "UPDATE comments SET likes = likes + 1 WHERE id_comment = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $comment_id);

// if ($stmt->execute()) {
//     echo "Comentário curtido com sucesso!";
// } else {
//     echo "Erro: " . $stmt->error;
// }

?>