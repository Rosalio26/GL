<?php

   define('HOST', 'localhost');
   define('USER', 'root');
   define('PASS', '');
   define('BASE', 'cadastro');

   $conn = new MYSQLi(HOST, USER, PASS, BASE);




   /*define('HOST','localhost');
   define('USER', 'root');
   define('PASS', '');
   define('BASE', 'cadastro');

   $conn = new mysqli(HOST, USER, PASS, BASE);

   if ($conn->connect_error) {
    die($conn->connect_error);
   }*/