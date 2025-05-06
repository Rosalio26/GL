<?php
    $servername = "localhost";
    $username = "root";
    $password = "Rosalio2024";
    $dbname = "interless";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$conn_mof = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn_mof->connect_error) {
    die("Conexão falhou: " . $conn_mof->connect_error);
}
?>
