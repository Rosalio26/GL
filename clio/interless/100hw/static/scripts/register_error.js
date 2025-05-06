document.addEventListener('DOMContentLoaded', function() {
    const emailInput = document.querySelector('input[name="email_hw"]');
    const passwordInput = document.querySelector('input[name="password_hw"]');
    const usernameInput = document.querySelector('input[name="username_hw"]');
    const phoneInput = document.querySelector('input[name="phone_hw"]');
    const errorMsg = document.getElementById('error-msg');

    function showError(message) {
        errorMsg.innerText = message;
        errorMsg.style.display = 'block';
    }

    function hideError() {
        errorMsg.style.display = 'none';
    }

    emailInput.addEventListener('input', function() {
        const email = emailInput.value;
        if (!validateEmail(email)) {
            showError("Email inválido!");
        } else {
            hideError();
        }
    });

    passwordInput.addEventListener('input', function() {
        const password = passwordInput.value;
        if (password.length < 6) {
            showError("A senha deve ter no mínimo 6 caracteres!");
        } else if (/[0-9]/.test(password) && !/[\W_]/.test(password)) {
            showError("A senha deve incluir símbolos!");
        } else if (/[0-9]/.test(password) && /[\W_]/.test(password) && !/[a-z]/.test(password)) {
            showError("A senha deve incluir letras minúsculas!");
        } else if (/[0-9]/.test(password) && /[\W_]/.test(password) && /[a-z]/.test(password) && !/[A-Z]/.test(password)) {
            showError("A senha deve incluir letras maiúsculas!");
        } else {
            hideError();
        }
    });

    usernameInput.addEventListener('input', function() {
        const username = usernameInput.value;
        if (username.length > 9) {
            showError("O nome de usuário deve ter no máximo 9 caracteres!");
        } else {
            hideError();
        }
    });

    phoneInput.addEventListener('input', function() {
        const phone = phoneInput.value;
        if (!/^\d{0,10}$/.test(phone)) {
            showError("O número de telefone deve conter exatamente 10 dígitos!");
        } else {
            hideError();
        }
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
});


function nextStep() {
    var personalName = document.querySelector('#personalname').value;
    var email = document.querySelector('#email').value;
    var userName = document.querySelector('#username').value;
    var password = document.querySelector('#password').value;
    var submitForm = document.querySelector('#submitForm');
    submitForm.style.display = 'block';
    
    if (personalName==="" || email==="" || userName==="" || password==="") {
        document.querySelector('#personalDate').style.display = 'block';
        document.querySelector('#personalId').style.display = 'none';
        document.querySelector('.cnt-itm-form').classList.add('border-collp');
        
        var borderInputs = document.querySelectorAll('.itm-inp-lab');

        borderInputs.forEach(borderInp => {
            borderInp.classList.add('border-collp');
        });
    } else {
        document.querySelector('#personalDate').style.display = 'none';
        document.querySelector('#personalId').style.display = 'block';
    }
}