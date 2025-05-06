<?php
session_start();

    include('../../../instance/dbinterless.php');

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM messages_chat_hw WHERE to_user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $message_class = ($row['sender_id'] == $user_id) ? 'message-sent' : 'message-received';
    echo "<div class='$message_class'>" . htmlspecialchars($row['message_text']) . "</div>";
}

$stmt->close();
$conn->close();
?>
