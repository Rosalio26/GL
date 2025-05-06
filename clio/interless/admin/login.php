<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login do Administrador</title>
</head>
<body>
    <form method="POST" action="admin_login.php">
        <input type="text" name="admin_username" placeholder="Nome de Usuário" required>
        <input type="password" name="admin_password" placeholder="Senha" required>
        <button type="submit">Login</button>
    </form>
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo "<div style='color: red;'>".$_SESSION['error']."</div>";
        unset($_SESSION['error']);
    }
    ?>
</body>
</html>
