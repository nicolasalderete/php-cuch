<?php

    $usuario = "root";
    $contrasena = "";
    $servidor = "localhost";
    $basededatos = "dietetica_db";

    $conexion = mysqli_connect($servidor, $usuario, $contrasena) or header("location: error.html");

    $db = mysqli_select_db($conexion, $basededatos) or header("location: error.html");

    mysqli_set_charset($conexion, 'utf-8');
?>