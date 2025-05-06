

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <title>Postar Status</title>
</head>
<body>
    <h2>Postar Novo Status</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label>Selecione o tipo de conteúdo:</label><br>
        <select name="content_type" required>
            <option value="photo">Foto</option>
            <option value="video">Vídeo</option>
            <option value="audio">Áudio</option>
        </select><br><br>

        <label>Escolha o arquivo:</label><br>
        <input type="file" name="file" required><br><br>

        <button type="submit">Postar</button>
    </form>
</body>
</html>

<?php

$content_type = $_POST['content_type'] ?? '';
$file = $_FILES['file'] ?? null;

if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
    die("Erro no upload do arquivo.");
}

$uploadDir = "uploads/$content_type/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$filename = uniqid() . "_" . basename($file['name']);
$filepath = $uploadDir . $filename;

if (move_uploaded_file($file['tmp_name'], $filepath)) {
    // Escapar para segurança
    $content_type = mysqli_real_escape_string($conn_mof, $content_type);
    $filepath = mysqli_real_escape_string($conn_mof, $filepath);
    
    $sql = "INSERT INTO status (user_id, content_type, file_path) VALUES ('$user_id', '$content_type', '$filepath')";
    
    if (mysqli_query($conn_mof, $sql)) {
        echo "Status postado com sucesso!";
        echo "<br><a href='upload_status.php'>Postar outro</a>";
    } else {
        echo "Erro ao salvar status: " . mysqli_error($conn_mof);
    }
} else {
    echo "Adicionar Status";
}
?>