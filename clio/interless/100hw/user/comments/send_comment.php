<?php
// Obtém os dados do formulário
$post_id = $_POST['post_id'];
$user_id = $_POST['user_id'];
$comment_post = $_POST['comment_post'];
$parent_id = isset($_POST['parent_id']) ? $_POST['parent_id'] : null;

// Verifica se o campo de comentário está vazio
if (empty($comment_post)) {
    echo "Erro: O campo de comentário não pode estar vazio.";
    exit();
}

// Verifica se o post_id existe na tabela posts
$sql_check_post = "SELECT id_post FROM posts WHERE id_post = ?";
$stmt_check_post = $conn->prepare($sql_check_post);
$stmt_check_post->bind_param("i", $post_id);
$stmt_check_post->execute();
$stmt_check_post->store_result();

if ($stmt_check_post->num_rows > 0) {
    // Insere o comentário no banco de dados
    $sql = "INSERT INTO comments (post_id, user_id, comment_post, parent_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisi", $post_id, $user_id, $comment_post, $parent_id);

    if ($stmt->execute()) {
        echo "Comentário adicionado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Erro: O post_id não existe na tabela posts.";
}

$stmt_check_post->close();
$conn->close();

?>