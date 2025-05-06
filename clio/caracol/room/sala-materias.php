<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sala Caracolearn</title>
    <link rel="stylesheet" href="./conf/style/sala-materias.css">
    <!-- <link rel="stylesheet" href="room/conf/style/sala-materias.css">
    <link rel="stylesheet" href="style/mainHd.css"> -->
    <!-- <link rel="stylesheet" href="../style/mainHd.css"> -->
    <script defer src="./conf/script/sala.js"></script>
</head>
<body class="body-sala-material">
    <header class="header-main-sala header-sala-material">
        <?php include('./inc-sala-materias/header.php');?>
    </header>
    <main id="sala-win" class="main-sala-material">
        <div id="rigth-main-sala" class="rigth-main-sala">
            <?php include('./inc-sala-materias/body-side.html');?>
        </div>
    </main>
    <footer class="inc-sala-footer">
        <?php include("./inc-sala-materias/inc-footer-sala.html");?>
    </footer>
</body>
</html>