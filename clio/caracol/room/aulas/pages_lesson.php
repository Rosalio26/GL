<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria do apreendizado</title>
    <link rel="stylesheet" href="conf_lesson/style/win-materias.css">
    <script defer src="conf_lesson/script/appch.js"></script>
    <script defer src="conf_lesson/script/jquery.js"></script>
</head>
<body id="body_lesson_page">
    <header>        
        <div class="mn-header">
            <?php include('conf_lesson/lib/header-pgl.html') ?>
        </div>
    </header>
    <main id="main_lesson_page">
        <div id="scd-main-les" class="mn-les-pg">
            <div class="left-pag-lesson-col">
                <?php 
                //======================================
                //=========Asides de DESENVOLVIMENTO WEB
                    switch (@$_REQUEST["pageLesson"]) {
                        case "titlehtml":
                            include("dev_web/auladeHtml/html_aside.html");    
                        break;
                        case "titlecss":
                            include("dev_web/auladeCss/css_aside.html");    
                        break;
                        case "titlesvg":
                            include("dev_web/auladeSvg/svg_aside.html");    
                        break;
                        case "titlecanvas":
                            include("dev_web/auladeCanvas/canvas_aside.html");    
                        break;  
                        default:
                        print("");
                    }
                    
                    //======================================
                    //=========Asides de PROGRAMACAO
                    switch (@$_REQUEST["pageProgram"]) {
                        case "titlejavascript":
                            include("programacao/auladeJavascript/javascript_aside.html");    
                        break;
                        case "titlephp":
                            include("programacao/auladePhp/php_aside.html");    
                        break;
                        case "titlejava":
                            include("programacao/auladeJava/java_aside.html");    
                        break;
                        case "titlecsharp":
                            include("programacao/auladeLinguagemCsharp/lgCsharp_aside.html");    
                        break;  
                        case "titlecplus":
                            include("programacao/auladeLinguagemCplus/lgCplus_aside.html");    
                        break;  
                        case "titlepython":
                            include("programacao/auladePython/python_aside.html");    
                        break;  
                        default:
                        print("");
                    }
                    
                    //======================================
                    //=========Asides de ELETRONICA
                    switch (@$_REQUEST["pageEletronic"]) {
                        case "titleAlgoritmo":
                            include("eletronica/auladeAlgoritmo/algoritmo_aside.html");    
                        break;
                        case "titleArduino":
                            include("eletronica/auladeArduino/arduino_aside.html");    
                        break;
                        case "titleAi":
                            include("eletronica/auladeAi/ai_aside.html");    
                        break;
                        case "titleRobotica":
                            include("eletronica/auladeRobotica/robotica_aside.html");    
                        break;
                        case "titleProteus":
                            include("eletronica/auladeProteus/proteus_aside.html");    
                        break;
                        default:
                        print("");
                    }
                    
                    
                    //======================================
                    //=========Asides de Matematica
                    switch (@$_REQUEST["pageDevweb"]) {
                        case "titleComputacao":
                            include("matematica/auladeComputacao/computacao.php");    
                        break;
                        case "titleGeometria":
                            include("matematica/auladeGeometria/geometria.php");    
                        break;
                        case "titleAnalatica":
                            include("matematica/auladeAnalitica/analitica.php");    
                        break;
                        default:
                        print("");
                    }


                  
                    switch (@$_REQUEST["beginLearning"]) {
                        case "introducaoJavaScript":
                            include("programacao/auladeJavascript/javascript_aside.html");    
                        break;
                        case "introducaophp":
                            include("programacao/auladePhp/php_aside.html");    
                        break;
                        case "introducaojava":
                            include("programacao/auladeJava/java_aside.html");    
                        break;
                        case "introducaocsharp":
                            include("programacao/auladeLinguagemCsharp/lgCsharp_aside.html");    
                        break;  
                        case "introducaocplus":
                            include("programacao/auladeLinguagemCplus/lgCplus_aside.html");    
                        break;  
                        case "introducaopython":
                            include("programacao/auladePython/python_aside.html");    
                        break;  
                        case "introducaoc":
                            include("programacao/auladeLinguagemC/lgC_aside.html");
                        break;
                        default:
                        print("");
                    }
                ?>
            </div>
            <div id="camp_right_pages" class="rig-mn-les">
                <?php
                    include('learning_aside_pages.php');
                    include('intro_lesson.php');
                ?>
            </div>
            <div id="camp_right_after" class="rig-mn-after">
                <div class="reserv-mn-after"></div>
            </div>
        </div>
    </main>
    <footer></footer>
</body>
</html>