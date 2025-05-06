<?php
    session_start();
    if (!isset($_SESSION['username_hw'])) {
        header("Location: includes/login.php");
        exit();
    }

    include('../../../instance/dbinterless.php');

    $user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender_id = $_SESSION['user_id'];
    $receiver_id = $_POST['receiver_id'];
    $message_text = $_POST['message_text'];

    // Verifica se são amigos aceitos
    $stmt = $conn->prepare("SELECT status FROM friend_equests WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) AND status = 'accepted'");
    $stmt->bind_param("iiii", $sender_id, $receiver_id, $receiver_id, $sender_id);
    $stmt->execute();
    $stmt->bind_result($status);
    $stmt->fetch();

    if ($status === 'accepted') {
        $stmt = $conn->prepare("INSERT INTO messages_chat_hw (from_user_id, to_user_id, message_text) VALUES (?, ?, ?)");
        $stmt->bind_param("iis", $sender_id, $receiver_id, $message_text);

        if ($stmt->execute()) {
            echo "Mensagem enviada com sucesso!";
        } else {
            echo "Erro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Vocês não são amigos.";
    }

    $conn->close();
}
?>
