<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$user_id = $_SESSION['user_id'];
		$title = $_POST['title_post_content'];
		$content = $_POST['content_post'];

		// Inserir na tabela text_posts
		$sql_text = "INSERT INTO post_content (user_id, title_post_content, content_post) VALUES (?, ?, ?)";
		$stmt_text = $conn->prepare($sql_text);
		$stmt_text->bind_param("iss", $user_id, $title, $content);
		$stmt_text->execute();
		$text_post_id = $stmt_text->insert_id;
		$stmt_text->close();

		// Inserir na tabela posts
		insertPost($conn, $user_id, 'text', $text_post_id);

		header("Location: index.php");
		exit();
	}
?>