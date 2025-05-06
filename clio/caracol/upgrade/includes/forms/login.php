<?php

    session_start();

    if (empty($_POST) or (empty($_POST["usuario"]) or (empty($_POST["password"])))) {
        print "<script>location.href='login.html';</script>";
    }

    include("config_reg.php");

    $usuario = $_POST["usuario"];
    $senha = $_POST["password"];
    /*$nome = $_POST["name"];
    $email = $_POST["email"];*/

    $sql = "SELECT * FROM usuarios 
            WHERE usuario = '{$usuario}'
            AND password = '{$senha}'";

    $res = $conn->query($sql) or die($conn->error);
    $row = $res->fetch_object();
    $qtd = $res->num_rows;

    if ($qtd>0) {
        $_SESSION["usuario"] = $usuario;
        /*$_SESSION["nome"] = $nome;
        $_SESSION["email"] = $email;*/

        print "<script>location.href='../../ownless/home-less.php';</script>";
    } else {
        print "<script>alert('usuario ou senha incorrecto')</script>";
        print "<script>location.href='login.html';</script>";
    }





    /*session_start();
    include('config_reg.php');

    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE usuario = '{$usuario}' AND password = '{$password}'";

    $res = $conn->query($sql) or die($conn->error);


    $qtd = $res->num_rows;

    if($qtd > 0) {
        $_SESSION["usuario"] = $usuario;
        $_SESSION["password"] = $password;
    } else {
        print "<p>Usuario incorrecto</p>";
    }*/