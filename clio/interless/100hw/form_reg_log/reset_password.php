
<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interless || 100HW || Registro</title>
    <link rel="icon" href="./static/style/icon/resume.png" type="image/x-icon">
    <link rel="stylesheet" href="../static/style/forms.css">
    <link rel="stylesheet" href="../static/style/index.css">
</head>
<body class="body-forms">

    
    <form class="cnt-itm-form" id="cnt-itm-form" method="post" action="inc/function.php?form_page=resetPassword" onsubmit="return validateForm()">
        <div id="error_message" class="message error"></div>
        <div class="cnt-title-form-reg-log">
            <h1 class="title-form-reg-log">Reset password</h1>
        </div>

        <div id="personalDate" class="cnt-inp-lab">

            <div class="itm-inp-lab">
                <span class="spn-act-res">
                    <img src="../static/style/icon/user-1.png">
                    <input 
                        class="input-forms username" 
                        type="text" 
                        id="username" 
                        name="username_hw"
                        placeholder="Usuario" 
                        novalidate
                        minlength="4" 
                        maxlength="9" 
                        oninput="copyValue()">
                </span>

                <span id="username-error" class="error-msg" style="display: none;"></span>
            </div>

            <div class="itm-inp-lab">
                <span class="spn-act-res">
                    <img src="../static/style/icon/telephone.png">
                    <span class="number-phone">
                        <input 
                            class="input-forms" 
                            type="text" 
                            id="numberInc"  
                            name="numberaccess_hw" 
                            type="text"  
                            placeholder="Numero">
                    </span>
                </span>

                <span id="phone-error" class="error-msg" style="display: none;"></span>
            </div>

            <div class="itm-inp-lab">
                <span class="spn-act-res">
                    <img src="../static/style/icon/key.png">
                    <input 
                        class="input-forms" 
                        type="text" 
                        id="pinInc" 
                        name="pinaccess_hw"
                        novalidate
                        minlength="4" 
                        maxlength="4" 
                        placeholder="Pin">
                </span>

                <span id="pin-error" class="error-msg" style="display: none;"></span>
            </div>

            <div class="itm-inp-lab">
                <span class="spn-act-res">
                    <img src="../static/style/icon/password.png">
                    <input 
                        class="input-forms" 
                        type="password" 
                        id="password" 
                        name="new_password_hw"
                        placeholder="Nova Palavra-Passe"
                        novalidate>
                </span>

                <span id="password-error" class="error-msg" style="display: none;"></span>
            </div>
            <input class="btn btn-step" type="submit" value="Enviar ->" id="submitForm">
        </div>
        <div class="arm-reg-log">Ja tenho os meus dados completos fazer <a class="login-inc-form" href="./login.php">Login</a></div>

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
        document.getElementById('resetForm').addEventListener('submit', function(event) {
            let inputs = document.querySelectorAll('.input-forms');
            let valid = true;

            inputs.forEach(function(input) {
                if (!input.value) {
                    input.classList.add('shake');
                    setTimeout(function() {
                        input.classList.remove('shake');
                    }, 1000);
                    valid = false;
                }
            });

            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>