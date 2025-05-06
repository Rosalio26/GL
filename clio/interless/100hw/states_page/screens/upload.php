<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['video'])) {
    $uploadDir = 'uploads/';
    
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $filename = uniqid('stream_') . '.webm';
    $filePath = $uploadDir . $filename;

    if (move_uploaded_file($_FILES['video']['tmp_name'], $filePath)) {
        echo "Vídeo salvo como: $filename";
    } else {
        echo "Erro ao salvar o vídeo.";
    }
} else {
    echo "Nenhum vídeo recebido.";
}
?>
