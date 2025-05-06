
<?php
  session_start();

  if (empty($_POST) or 
     (empty($_POST["usuario"]) or 
     (empty($_POST["password"]) or
     (empty($_POST["name"]) or
     (empty($_POST["email"]) or
     (empty($_POST["surname"]))))))) {
      print "<script>location.href='cadastro.html';</script>";
  }

  include('config_reg.php');

  $name = $_POST["name"];
  $surname = $_POST["surname"];
  $usuario = $_POST["usuario"];
  $email = $_POST["email"];
  $senha = $_POST["password"];

  $sql = "INSERT INTO usuarios 
            (name, 
            surname, 
            usuario, 
            email, 
            password)

            VALUES (
            '{$name}', 
            '{$surname}', 
            '{$usuario}', 
            '{$email}', 
            '{$senha}')";

  $res = $conn->query($sql) or die($conn->error);
  /*$row = $res->fetch_object();
  $qtd = $res->num_rows;*/

  
  if ($qtd==0) {
    /*$_SESSION["usuario"] = $usuario;
    $_SESSION["nome"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["surname"] = $surname;*/

    print "<script>location.href='../../ownless/home-less.php';</script>";
  } else {
      print "<script>alert('usuario ou senha incorrecto')</script>";
      print "<script>location.href='cadastro.html';</script>";
  }