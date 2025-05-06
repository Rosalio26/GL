<?php


// Obter o ID do usuário logado da sessão
if (!isset($_SESSION['user_id'])) {
    die("Acesso não autorizado.");
}
$usuario_id = $_SESSION['user_id'];

// Capturar a página acessada (nome do arquivo)
$pagina_index = basename($_SERVER['PHP_SELF']);
// Capturar a URL completa da página
$pagina_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Criar o registro combinando o nome e a URL
$pagina_completa = $pagina_index . " (URL: " . $pagina_url . ")";

// Registrar a página no banco de dados
$sql = "INSERT INTO activity_log (user_id, access_page) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $usuario_id, $pagina_completa);

if (!$stmt->execute()) {
    echo "Erro ao registrar atividade: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
