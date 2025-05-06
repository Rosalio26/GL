<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Telefone Fixo | Faca uma chamada</title>
    <link rel="stylesheet" href="../static/style/interless_design.css">
    <link rel="stylesheet" href="./style/phone.css">
</head>
<body class="body-phone">
    <form action="conf/calling.php" method="POST">
        <div class="cnt-block-note disc-numb">
                
            <h2 class="text-glf"><span>Galfer Login</span></h2>

            <input 
                id="cnt-number" 
                class="inp-cell-gal cnt-number-info" 
                type="text" 
                name="numberCall" 
                placeholder="Discar o numero" 
                maxlength="9" 
                pattern="\d*"
                oninput="verifyingCharNumber()">

            <input 
                id="cnt-pin" 
                class="inp-cell-gal cnt-pin-info" 
                type="text" 
                name="pinCofirm" 
                placeholder="Digite o pin" 
                maxlength="4"
                oninput="verifyingCharPin()">

            <button type="button" class="btn-submit">Entrar</button>

            <div id="resNotice"></div>

        </div>
    </form>
    <script src="scripts/phone.js"></script>
</body>
</html>