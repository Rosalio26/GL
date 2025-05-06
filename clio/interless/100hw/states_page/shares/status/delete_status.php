<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = (int) $_POST['id'];

        $sql = "DELETE FROM status WHERE id = $id";
        $result = mysqli_query($conn_mof, $sql);

        if ($result) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => mysqli_error($conn_mof)]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "ID não enviado."]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Método inválido."]);
}
?>
