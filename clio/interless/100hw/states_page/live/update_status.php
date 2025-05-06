<?php
$id_user = $_POST['id_user'];
$status = $_POST['status'];

if ($status === 'online') {
    $sql = "INSERT INTO streaming (id_user, status, start) VALUES (?, 'online', NOW())";
} else {
    $sql = "UPDATE streaming SET status = 'offline', start = NOW() WHERE id_user = ? AND status = 'online'";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_user);
$stmt->execute();

echo json_encode(["ok" => true]);
