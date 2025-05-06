<?php
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$user_id = $_SESSION['user_id'];
		$title = $_POST['title_post'];
		$title_photo = $_POST['title_post_photo'];
		$title_video = $_POST['title_post_video'];
		$title_music = $_POST['title_post_music'];
		$content = $_POST['content_post'];
		$media_type = $_POST['media_type'];
		$upload_dir = '';
	
		// Verificação do tipo de arquivo e definição do diretório de upload
		switch ($media_type) {
			case 'video_post':
				$upload_dir = 'user/posts/files_post/uploads/videos/';
				break;
			case 'music_post':
				$upload_dir = 'user/posts/files_post/uploads/music/';
				break;
			case 'photo_post':
				$upload_dir = 'user/posts/files_post/uploads/photos/';
				break;
			case 'text_post':
			default:
				$upload_dir = 'user/posts/files_post/uploads/text/';
				break;
		}
	
		// Criar diretório se não existir
		if (!is_dir($upload_dir)) {
			mkdir($upload_dir, 0777, true);
		}
	
		// Verificação e upload do arquivo
		$media_url = '';
		if ($_FILES['media_file']['error'] == UPLOAD_ERR_OK) {
			$tmp_name = $_FILES['media_file']['tmp_name'];
			$filename = basename($_FILES['media_file']['name']);
			$target_file = $upload_dir . $filename;
	
			// Mover arquivo para o diretório de upload
			if (move_uploaded_file($tmp_name, $target_file)) {
				$media_url = $target_file;
			} else {
				echo "Erro ao mover o arquivo.";
				exit();
			}
		}
	
		$stmt = $conn->prepare("INSERT INTO posts (user_id, title_post, title_post_photo, title_post_video, title_post_music, content_post, media_type, media_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("isssssss", $user_id, $title, $title_photo, $title_video, $title_music, $content, $media_type, $media_url);
	
		if ($stmt->execute()) {
			echo "Post adicionado com sucesso!";
			header("Location: ./profile.php?confProfilePages=new_post");
			exit();
		} else {
			echo "Erro: " . $stmt->error;
		}
	
	}

?>