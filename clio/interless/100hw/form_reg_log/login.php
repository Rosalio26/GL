
<?php                   
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interless || 100HW || Login</title>
    <link rel="stylesheet" href="../static/style/index.css">
    <link rel="stylesheet" href="../static/style/100hw.css">
    <link rel="stylesheet" href="../static/style/forms.css">
    <style>
    </style>
</head>

<body class="body-forms">
    <div class="cnt-form-reg-hw">
        <form class="cnt-itm-form" id="cnt-itm-form" method="post" action="inc/function.php?form_page=login">

        <div id="error_message" class="message error"></div>

        <div class="cnt-title-form-reg-log">
            <h1 class="title-form-reg-log">Login</h1>
        </div>
            <div id="personalId">
                <div class="cnt-inp-lab">
                    <div class="itm-inp-lab">
                        <span class="spn-act-res">
                            <img src="../static/style/icon/user-1.png">
                            <input 
                                class="input-forms username" 
                                type="text" 
                                id="username" 
                                name="username_hw"
                                placeholder="Usuario" 
                                required 
                                minlength="4" 
                                maxlength="9" 
                                oninput="copyValue()">
                        </span>
                    </div>
                    <div class="itm-inp-lab">
                        <span class="spn-act-res">
                            <img src="../static/style/icon/password.png">
                            <input 
                                class="input-forms" 
                                type="password" 
                                id="password" 
                                name="password_hw"
                                placeholder="Palavra-Passe"
                                required>
                        </span>
                    </div>
                    <input class="btn btn-step" type="submit" value="Enviar" id="submitForm">
                    <p><a class="reset-password" href="reset_password.php">Esquece palavra-passe</a></p>
                </div>
            </div>
            <div class="arm-reg-log">Sou novo e ainda nao tenho uma conta. Gostaria de fazer um <a class="login-inc-form" href="./register.php">Registro</a> para poder entrar na plataforma.</div>
        </form>
        <script src="../static/scripts/form.js"></script>
        <script>
            // Chame a função para exibir o erro quando a página carregar
            window.onload = function() {
                var errorMessage = "<?php echo isset($_SESSION['error']) ? $_SESSION['error'] : ''; ?>";
                var successMessage = "<?php echo isset($_SESSION['success']) ? $_SESSION['success'] : ''; ?>";

                if (errorMessage) {
                    var errorDiv = document.getElementById("error_message");
                    errorDiv.innerHTML = errorMessage;
                    errorDiv.style.display = "block";

                    <?php if (isset($_SESSION['duplicated_data'])): ?>
                        var duplicatedData = <?php echo json_encode($_SESSION['duplicated_data']); ?>;
                        duplicatedData.forEach(function(inputId) {
                            var inputElement = document.getElementById(inputId);
                            if (inputElement) {
                                inputElement.classList.add("error-border");
                            }
                        });
                    <?php unset($_SESSION['duplicated_data']); ?>
                    <?php endif; ?>

                    <?php unset($_SESSION['error']); ?>
                }

                if (successMessage) {
                    var successDiv = document.getElementById("success_message");
                    successDiv.innerHTML = successMessage;
                    successDiv.style.display = "block";
                    <?php unset($_SESSION['success']); ?>
                }
            };
        </script>
    </div>
</body>
</html>