<?php
    
    session_start();
    include('../instance/dbinterless.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    // Verificar se o administrador existe no banco de dados
    $sql = "SELECT id, password FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $admin_username);
    $stmt->execute();
    $stmt->bind_result($id, $hashedPassword);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($admin_password, $hashedPassword)) {
        $_SESSION['admin_id'] = $id;
        header("Location: homeHw.php");
    } else {
        $_SESSION['error'] = "Credenciais de administrador inválidas.";
        header("Location: admin_login.php");
        exit();
    }
}
?>
