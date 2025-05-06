<?php
    session_start();
    include("./dbconn.php");
    
    //Verificar se os dados foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Validar os dados de formulario
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $numberaccess = filter_input(INPUT_POST, 'numberAccess', FILTER_SANITIZE_STRING);

        //Busacando o usuario
        $stmt = $conn->prepare("SELECT id, numberAccess FROM getch WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        //Verificar se o usuario existe
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $stored_numberaccess);
            $stmt->fetch();

            //verificando o numero
            if($numberaccess == $stored_numberaccess) {
                header("Location: ../homeHw.php");
                exit();
                // print "<script>location.href='../homeHw.php'</script>";
                // echo "Login Sucess: " . $user_id;
            } else {
                echo "Error numero";
            }
        } else {
            echo "Usuario nao encotrado";
        }
        $stmt->close();

    }

    $conn->close();
?>