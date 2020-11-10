<?php

    $usuario = "root";
    $contrasena = "";
    $servidor = "localhost";
    $basededatos = "dietetica_db";

    $mysqli = mysqli_connect($servidor, $usuario, $contrasena, $basededatos);
    if (mysqli_connect_errno($mysqli)) {
        header("location: error.html");
        exit;
    }
?>