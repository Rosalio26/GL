<?php
$conn = new mysqli("localhost", "root", "", "interless");

$id_user = $_POST['id_user'];
$video = $_FILES['video'];

$target = "videos/" . time() . "_" . basename($video["name"]);
move_uploaded_file($video["tmp_name"], $target);

$sql = "UPDATE streaming SET video_path = ?, status = 'offline', data_fim = NOW() WHERE id_user = ? AND status = 'online'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $target, $id_user);
$stmt->execute();

echo json_encode(["success" => true, "path" => $target]);
