<?php

    include('./dbconn.php');
    include('./function.php');

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $personalname = filter_input(INPUT_POST, "personalname", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
        $numberaccess = filter_input(INPUT_POST, "numberAccess", FILTER_SANITIZE_INT);

        //Verificar se a sanitizacao e validacao foram bem-sucedidas
        if ($personalname && $email && $username && $password && $numberaccess) {
            //Verificar se o usuario, email e numero ja existem no banco de dados
            $stmt = $conn-> prepare("SELECT id FROM getch WHERE username = ? OR numberAccess = ? OR email = ?");
            $stmt->bind_param("sss", $username, $numberaccess, $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                echo "Nome de Usuario e email ja existem!";
            } else {
                //Has do password
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                //Preparar eclaracao SQL para inserir dados
                $stmt = $conn->prepare("INSERT INTO getch (personalname, email, username, password, numberAccess) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $personalname, $email, $username, $passwordHash, $numberaccess);
                
                if ($stmt->execute()) {
                    header("Location: ../homeHw.php");
                } else {
                    echo "Error";
                }

            }
            //Fechar Declaracao
            $stmt->close();
        } else {
            echo "Dados Invalidos";
        }
    }

    //Fechar a conexao
    $conn->close();
?>