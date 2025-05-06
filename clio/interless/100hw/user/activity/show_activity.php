<?php
include('../instance/dbinterless.php');
if (!isset($_SESSION['user_id'])) {
    die("Acesso não autorizado.");
}

$usuario_id = $_SESSION['user_id'];

// Consulta para buscar atividades únicas e limpar URLs
$sql = "SELECT access_page, MAX(access_date) AS last_access_date 
        FROM activity_log 
        WHERE user_id = ? 
        GROUP BY access_page 
        
        ORDER BY last_access_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Atividades do Usuário</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Link da Página</th>
                <th>Dia da Semana</th>
                <th>Data</th>
                <th>Hora</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        // Processar o URL
        $rawUrl = $row['access_page'];
        $cleanUrl = htmlspecialchars($rawUrl); // Escapar o URL para segurança

        // Separar as partes da data
        $timestamp = strtotime($row['last_access_date']);
        $dia_semana = date("l", $timestamp); // Exemplo: Monday
        $data = date("d/m/Y", $timestamp); // Exemplo: 28/02/2025
        $hora = date("H:i:s", $timestamp); // Exemplo: 15:30:45

        echo "<tr>
                <td><a href='#' onclick='navigateTo(\"" . $cleanUrl . "\")'>" . $cleanUrl . "</a></td>
                <td>" . $dia_semana . "</td>
                <td>" . $data . "</td>
                <td>" . $hora . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhuma atividade encontrada.";
}

$stmt->close();
?>

<script>
    function navigateTo(url) {
        // Atualiza o histórico e "limpa" a URL no navegador
        history.pushState({}, '', ''); // Deixa a barra de endereço vazia
        window.open(url, '_blank'); // Abre o link em uma nova aba
    }
</script>
