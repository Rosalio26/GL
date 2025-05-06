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
            // Verifica se o usuário já compartilhou o comentário
            $sql_check_share = "SELECT * FROM shares WHERE user_id = ? AND comment_id = ?";
            $stmt_check_share = $conn->prepare($sql_check_share);
            $stmt_check_share->bind_param("ii", $user_id, $comment_id);
            $stmt_check_share->execute();
            $result_check_share = $stmt_check_share->get_result();

            if ($result_check_share->num_rows == 0) {
                // Adiciona o compartilhamento
                $sql = "INSERT INTO shares (user_id, comment_id) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ii", $user_id, $comment_id);
                $stmt->execute();
                $stmt->close();

                // Atualiza o contador de compartilhamentos na tabela comments
                $sql_update = "UPDATE comments SET shares = shares + 1 WHERE id_comment = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("i", $comment_id);
                $stmt_update->execute();
                $stmt_update->close();

                echo "Compartilhamento adicionado com sucesso!";
            } else {
                echo "Você já compartilhou este comentário.";
            }

            $stmt_check_share->close();
        } else {
            echo "Comentário não encontrado.";
        }

        $stmt_check_comment->close();
    }
?>