<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Painel de Administração</title>
</head>
<body>
    <?php
    
    session_start();
    include('../instance/dbinterless.php');

    // Verificar se o administrador está logado
    if (!isset($_SESSION['admin_id'])) {
        header("Location: login.php");
        exit();
    }

    // Obter a lista de contas bloqueadas
    $sql = "SELECT user_hw_id, username_hw FROM register_gch WHERE account_locked = TRUE";
    $result = $conn->query($sql);

    echo "<h2>Contas Bloqueadas</h2>";
    echo "<table>";
    echo "<tr><th>Nome de Usuário</th><th>Ação</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['username_hw']) . "</td>";
        echo "<td><form method='POST' action='unlock_account.php'><input type='hidden' name='user_id' value='" . $row['id'] . "'><button type='submit'>Desbloquear</button></form></td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>
