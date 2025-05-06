
/*
========================================================================
========================================================================
========================================================================
*/

//Error Register
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.querySelector('input[name="personalname_hw"]');
    const emailInput = document.querySelector('input[name="email_hw"]');
    const passwordInput = document.querySelector('input[name="password_hw"]');
    const usernameInput = document.querySelector('input[name="username_hw"]');
    const phoneInput = document.querySelector('input[name="numberaccess_hw"]');
    const pinInput = document.querySelector('input[name="pinaccess_hw"]');
    // const errorMsg = document.getElementById('error-msg');
    const emailErrorMsg = document.getElementById('email-error');
    const passwordErrorMsg = document.getElementById('password-error');
    const usernameErrorMsg = document.getElementById('username-error');
    const phoneErrorMsg = document.getElementById('phone-error');
    const pinErrorMsg = document.getElementById('pin-error');

    function showError(element, message) {
        element.innerText = message;
        element.style.display = 'block';
    }

    function hideError(element) {
        element.style.display = 'none';
    }

    nameInput.addEventListener('input', function () {
        const name = nameInput.value;
        if (name) {
            usernameInput.value = generateUSernameSuggestion(name);
             document.querySelector('#usernameId').value = usernameInput.value;
        } else {
            usernameInput.value = '';
        }
    });

    emailInput.addEventListener('input', function() {
        const email = emailInput.value;
        if (email === "") {
            hideError(emailErrorMsg);
            emailInput.classList.remove('input-act');
        } else if (!validateEmail(email)) {
            showError(emailErrorMsg, "Email inválido!");
            emailInput.classList.add('input-act');
        } else {
            hideError(emailErrorMsg);
            emailInput.classList.remove('input-act');
        }
    });

    passwordInput.addEventListener('input', function() {
        const password = passwordInput.value;
        if (password === "") {
            hideError(passwordErrorMsg);
            passwordInput.classList.remove('input-act');
        } else if (password.length < 6) {
            showError(passwordErrorMsg, "A senha deve ter no mínimo 6 caracteres!");
            passwordInput.classList.add('input-act');
        } else if (!/[0-9]/.test(password)) {
            showError(passwordErrorMsg, "A senha deve incluir um número");
            passwordInput.classList.add('input-act');
        } else if (!/[\W_]/.test(password)) {
            showError(passwordErrorMsg, "A senha deve incluir símbolos!");
            passwordInput.classList.add('input-act');
        } else {
            hideError(passwordErrorMsg);
            passwordInput.classList.remove('input-act');
        }
    });

    usernameInput.addEventListener('input', function() {
        const username = usernameInput.value;
        if (username === "") {
            hideError(usernameErrorMsg);
            usernameInput.classList.remove('input-act');
        } else if (username.length > 9) {
            showError(usernameErrorMsg, "O nome de usuário deve ter no máximo 9 caracteres!");
            usernameInput.classList.add('input-act');
        } else {
            hideError(usernameErrorMsg);
            usernameInput.classList.remove('input-act');
        }
    });

    phoneInput.addEventListener('input', function() {
        const phone = phoneInput.value;
        if (phone === "") {
            hideError(phoneErrorMsg);
        } else if (/[^0-9]/.test(phone)) {
            showError(phoneErrorMsg, "O número deve conter somente números");
        } else if (phone.length < 9) {
            showError(phoneErrorMsg, "O número deve conter 9 dígitos");
        } else if (!/^\d{0,9}$/.test(phone)) {
            showError(phoneErrorMsg, "O número de telefone deve conter exatamente 9 dígitos!");
        } else {
            hideError(phoneErrorMsg);
        }
    });

    pinInput.addEventListener('input', function() {
        const pin = pinInput.value;
        if (pin === "") {
            hideError(pinErrorMsg);
        } else if (/[^0-9]/.test(pin)) {
            showError(pinErrorMsg, "O pin deve ser númerico!");
        } else if (pin.length < 4) {
            showError(pinErrorMsg, "O pin deve ter somente 4 digitos!");
        } else if (!/^\d{0,4}$/.test(pin)) {
            showError(pinErrorMsg, "O pin deve ser de 4 digitos somente!");
        } else {
            hideError(pinErrorMsg);
        }
    });

     function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function generateUSernameSuggestion(name) {
        let suggestion = name.toLowerCase().replace(/[^a-z]/g, '');
        const randomNumber = Math.floor(Math.random() * 100);
        suggestion = suggestion.substring(0, 4) + randomNumber + suggestion.substring(4);
        suggestion += randomNumber;
        return suggestion.substring(0, 9); // Garante que o nome não ultrapasse 9 caracteres
    }
});


/*
========================================================================
========================================================================
========================================================================
*/
var borderInputs = document.querySelectorAll('.itm-inp-lab');

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
        
        
        borderInputs.forEach(borderInp => {
            borderInp.classList.add('lab')
        });
    }
    
    else {
        document.querySelector('.cnt-itm-form').classList.remove('border-collp');
        document.querySelector('#personalDate').style.display = 'none';
        document.querySelector('#personalId').style.display = 'block';
        borderInputs.forEach(borderInp => {
            borderInp.classList.remove('lab')
        });
    }
}

// if (nextStep() === false) {
//     return false;
// } else {
//     return true;
// }


function backForm() {
    document.querySelector('#personalDate').style.display = 'block';
    document.querySelector('#personalId').style.display = 'none';
}

function validateForm() {
    var personalName = document.querySelector('#personalname').value;
    var email = document.querySelector('#email').value;
    var userName = document.querySelector('#username').value;
    var password = document.querySelector('#password').value;
    var numberAut = document.querySelector('#numberInc').value;

    if (personalName==="" || email==="" || userName==="" || password==="" || numberAut==="") {
        alert("Verifica Os dados e tente novamente");
        // return false;
        borderInputs.forEach(borderInp => {
            borderInp.classList.remove('lab')
        });
    }
    return true;
}

function copyValue(){
    var username1 = document.querySelector('#username').value;
    document.querySelector('#usernameId').value = username1;
}


// // Função para exibir a mensagem de erro
function showError(errorMessage) {
    if (errorMessage) {
        document.getElementById('error-msg').innerText = errorMessage;
        document.getElementById('error-msg').style.display = 'block';
    }
}


