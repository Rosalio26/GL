<?php
// session_start();
// if (!isset($_SESSION['username_hw'])) {
//     header("Location: ../includes/login.php");
//     exit();
// }

// include('../../../instance/dbinterless.php');

$user_id = $_SESSION['user_id'];

// Recusar pedido de amizade
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['recusar_id'])) {
    $recusar_id = $_POST['recusar_id'];
    $sql = "UPDATE friend_requests SET status='rejected' WHERE request_id='$recusar_id' AND receiver_id='$user_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Pedido de amizade recusado!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Obter pedidos de amizade recebidos
$sql = "SELECT fr.request_id, u.username_hw FROM friend_requests fr JOIN register_gch u ON fr.sender_id = u.user_hw_id WHERE fr.receiver_id='$user_id' AND fr.status='pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pedidos de Amizade</title>
</head>
<body>
    <h1>Pedidos de Amizade</h1>
    <ul>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row['username_hw'] . " <form method='post' action='?confPages=requestFiles' style='display:inline;'><input type='hidden' name='aceitar_id' value='" . $row['request_id'] . "'><input type='submit' value='Aceitar'></form> <form method='post' action='requests.php' style='display:inline;'><input type='hidden' name='recusar_id' value='" . $row['request_id'] . "'><input type='submit' value='Recusar'></form></li>";
        }
    } else {
        echo "<li>Nenhum pedido de amizade recebido.</li>";
    }
    ?>
    </ul>
</body>
</html>

