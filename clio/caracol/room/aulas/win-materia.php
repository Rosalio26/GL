<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias Preparados || Inicio de Aula</title>
    <!-- <link rel="stylesheet" href="../conf/style/sala-materias.css"> -->
    <!-- <link rel="stylesheet" href="../../style/mainHd.css"> -->
    <link rel="stylesheet" href="./conf_lesson/style/win-materias.css">
    <script defer src="conf_lesson/script/appch.js"></script>
    <script defer src="conf_lesson/script/jquery.js"></script>
</head>
<body class="win-materias">
    <main class="materias-win">
        <div class="left-aside-materias">
            <div class="left-itm-materias">
                <div>
                    <?php
                        switch (@$_REQUEST["pages-material"]) {
                            case "programacao":
                                include("programacao/programacao-aside.html");
                            break;
                            case "eletronica":
                                include("eletronica/eletronica-aside.html");
                            break;
                            case "devweb":
                                include("dev_web/devweb-aside.html");
                            break;
                            case "matematica":
                                include("matematica/matematica-aside.html");
                            break;
                            default:
                                print('<span style="color: tomato;"></span>');
                            break;
                        }
                    ?>
                    <div class="frg-upd">
                        <span>Desenvolvendo nova integridade de ensino e comunicacao unica na transformacao de novas tecnologias. <br>Novas interacoes e metodos em um novo ambiente da <a style="padding: 0px 5px; background: #ffee99; color: blue;" href="../../guicil/homepg.html" class="cil-cla-left-winmat">cil</a>.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-aside-materias">
            <?php
                switch (@$_REQUEST["pages-material"]) {
                    case "programacao":
                        include("programacao/programacao.php");
                    break;  
                    case "eletronica":
                        include("eletronica/eletronica.php");
                    break;
                    case "devweb":
                        include("dev_web/devweb.php");
                    break;
                    case "matematica":
                        include("matematica/matematica.php");
                    break;
                    default:
                        print('<span style="color: tomato; display: block; text-align: center; padding-top: 100px; font-size: 30px;">Erro no Carregamento dos arquivos! Por favor tente reiniciar o seu navegador ou contacte o Administrador.</span>');
                    break;
                }
            ?>
        </div>

        <div id="cursor-lowcol" class="back-cursor-low-col"></div>

        <script>
            var cursorLowCol = document.querySelector('#cursor-lowcol');

            document.addEventListener('mousemove', function(e) {
                var colX = e.clientX;
                var colY = e.clientY;
                cursorLowCol.style.left = colX + "px";
                cursorLowCol.style.top = colY + "px";
            });
        </script>
    </main>
</body>
</html>





