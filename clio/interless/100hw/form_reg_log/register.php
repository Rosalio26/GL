
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

    
    <form class="cnt-itm-form" id="cnt-itm-form" method="post" action="inc/function.php?form_page=register" onsubmit="return validateForm()">
        <div id="error_message" class="message error"></div>
        <div class="cnt-title-form-reg-log">
            <h1 class="title-form-reg-log">Registro</h1>
        </div>

        <div id="personalDate" class="cnt-inp-lab">
            <div class="itm-inp-lab">
                <span class="spn-act-res">
                    <img src="../static/style/icon/id-card.png">
                    <input 
                        class="input-forms" 
                        type="text" 
                        id="personalname" 
                        name="personalname_hw" 
                        placeholder="Nome" 
                        required>
                </span>
            </div>

            <div id="email_border_error" class="itm-inp-lab">
                <span class="spn-act-res">
                    <img src="../static/style/icon/mail.png">
                    <input 
                        class="input-forms" 
                        type="email" 
                        id="email" 
                        name="email_hw" 
                        placeholder="Email" 
                        required>
                </span>

                <span id="email-error" class="error-msg" style="display: none;"></span>
            </div>

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

                <span id="username-error" class="error-msg" style="display: none;"></span>
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

                <span id="password-error" class="error-msg" style="display: none;"></span>
            </div>

            <button class="btn btn-step" type="button" onclick="nextStep()">Next -></button>
        </div>

        <div id="personalId" class="cnt-inp-lab" style="display: none;">
            <!-- <div class="notice-dangerous info-imp">
                <h2>AVISO! Importante.</h2>
                <p>Carro usuario no campo de numero, pedimos que nao inorme o seu numero de telefone. <br> Somente escolha qualquer numero de nove digitos, nao a mais ne a menos</p>
            </div> -->

            <div class="itm-inp-lab">
                <span class="spn-act-res">
                    <img src="../static/style/icon/user-1.png">
                    <input 
                        class="input-forms username" 
                        type="text" 
                        id="usernameId" 
                        name="username_hw" 
                        placeholder="Usuario" 
                        readonly>
                </span>
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
                            minlength="9"
                            maxlength="9"
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
                        required 
                        minlength="4" 
                        maxlength="4" 
                        placeholder="Pin">
                </span>

                <span id="pin-error" class="error-msg" style="display: none;"></span>
            </div>

            <div class="cnt-btn-bc-nx">
                <button class="btn btn-step" type="button" onclick="backForm()"><- Voltar</button>
                <input class="btn btn-step" type="submit" value="Enviar ->" id="submitForm">
            </div>
        </div>

        <div class="some-profile-confing">
            
        </div>

        <div class="arm-reg-log">
            Já tenho uma conta. </br> 
            Só preciso fazer 
            <a class="login-inc-form" href="./login.php">login</a> 
            para acessar.
        </div>

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
</body>
</html>