<?php
session_start();
require 'conexao.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    die('Não autorizado');
}

$userId = $_SESSION['user_id'];

if (!isset($_FILES['file']) || !isset($_POST['media_type'])) {
    http_response_code(400);
    die('Dados incompletos');
}

$mediaType = $_POST['media_type'];
$allowedTypes = ['video', 'audio', 'photo'];
if (!in_array($mediaType, $allowedTypes)) {
    http_response_code(400);
    die('Tipo inválido');
}

// Define diretório de destino
$ext = ($mediaType === 'video') ? '.webm' : (($mediaType === 'audio') ? '.webm' : '.png');
$dir = "uploads/reels/";
if (!is_dir($dir)) mkdir($dir, 0777, true);
$filename = uniqid('reel_') . $ext;
$targetFile = $dir . $filename;

// Salva o ficheiro no servidor
if (!move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
    http_response_code(500);
    die('Erro ao salvar o ficheiro');
}

// Insere no banco de dados
$stmt = $conn_mof->prepare("INSERT INTO reels (user_id, file_path, media_type) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $userId, $targetFile, $mediaType);
$stmt->execute();

echo 'Upload feito com sucesso';
