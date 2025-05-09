<?php

    $servidor = "Localhost";
    $usuario = "lib";
    $senha = "123456";
    $banco = "db_booksonline";

    $cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

?>