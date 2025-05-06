
function startLogoutTimer() {
    let timer;
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer; // capturar cliques
    window.ontouchstart = resetTimer; // capturar toques
    window.onclick = resetTimer; // capturar cliques
    window.onkeypress = resetTimer; // capturar teclas pressionadas

    function logout() {
        window.location.href = 'http://localhost/projectos/interless/100hw/form_reg_log/logount.php';
    }

    function resetTimer() {
        clearTimeout(timer);
        timer = setTimeout(logout, 600000); // 10 minutos em milissegundos
    }
}

	startLogoutTimer();