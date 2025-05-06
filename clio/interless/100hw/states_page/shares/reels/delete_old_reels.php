<?php
$mysqli = new mysqli('localhost', 'usuario', 'senha', 'nome_do_banco');

if ($mysqli->connect_error) {
    die('Erro de conexão: ' . $mysqli->connect_error);
}

// Buscar Reels com mais de 24 horas
$result = $mysqli->query("
    SELECT * FROM reels 
    WHERE created_at < NOW() - INTERVAL 1 DAY
");

while ($row = $result->fetch_assoc()) {
    if (file_exists($row['file_path'])) {
        unlink($row['file_path']); // apagar o arquivo físico
    }
}

// Deletar do banco
$mysqli->query("
    DELETE FROM reels 
    WHERE created_at < NOW() - INTERVAL 1 DAY
");

echo "Reels antigos apagados.";
?>
