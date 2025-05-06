
var resultsNotice = document.querySelector('#resNotice');

function verifyingCharNumber() {
    var inputNumber = document.querySelector('#cnt-number').value;
    var inputNumberElement = document.querySelector('#cnt-number');
    var inputPin = document.querySelector('#cnt-pin');
    var notice = `<p class="erro-aviso">Somente numeros sao permitidos.</p>`;

    if (isNaN(inputNumber)) {
        resultsNotice.innerHTML = notice;
        resultsNotice.style.display = 'block';
        inputNumberElement.classList.add("erro")
        inputPin.style.display = 'none';
    } else {
        resultsNotice.innerText = "";
        resultsNotice.style.display = 'none';
        inputNumberElement.classList.remove("erro");

        if (inputNumber.length === 9) {
            inputPin.style.display = 'block';
        } else {
            inputPin.style.display = 'none';
        }
    }
}

function verifyingCharPin() {
    var inputPin = document.querySelector('#cnt-pin').value;
    var btnSubmit =document.querySelector('.btn-submit');

    if (inputPin.length === 4) {
        btnSubmit.style.display = 'block';
    } else {
        btnSubmit.style.display = 'none';
    }
}