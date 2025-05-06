

<?php 
 //Campo de programcao  indice introdutoria
 switch (@$_REQUEST["pageProgram"]) {
    case "titlejavascript":
        include("programacao/auladeJavascript/lib/introducao.html");
    break;
    case "titlephp":
        include("programacao/auladePhp/lib/introducao.html");
    break;
    case "titlejava":
    include("programacao/auladeJava/lib/introducao.html");
    break;
    case "titlecsharp":
        include("programacao/auladeLinguagemCsharp/lib/introducao.html");
    break;
    case "titlecplus":
        include("programacao/auladeLinguagemCplus/lib/introducao.html");
    break;
    case "titlepython":
        include("programacao/auladePython/lib/introducao.html");
    break;
    default :
        print("");
    break;
}

?>