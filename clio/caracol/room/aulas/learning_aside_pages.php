

<?php 

    switch (@$_REQUEST["beginLearning"]) {
        case "introducaoJavaScript":
            include("programacao/auladeJavascript/lib/introducao.html");
        break;
        case "introducaophp":
            include("programacao/auladePhp/lib/introducao.html");
        break;
        case "introducaojava":
            include("programacao/auladeJava/lib/introducao.html");
        break;
        case "introducaocsharp":
            include("programacao/auladeLinguagemCsharp/lib/introducao.html");
        break;
        case "introducaocplus":
            include("programacao/auladeLinguagemCplus/lib/introducao.html");
        break;
        case "introducaopython":
            include("programacao/auladePython/lib/introducao.html");
        break;
        case "introducaoc":
            include("programacao/auladeLinguagemC/lib/introducao.html");
        break;
        default :
            print("");
        break;
    }
?>