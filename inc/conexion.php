<?php

    $usuario = "root";
    $contrasena = "";
    $servidor = "localhost";
    $basededatos = "dietetica_db";

    $conexion = mysqli_connect($servidor, $usuario, $contrasena) or die ('No se ha podido conectar con el servidor');

    $db = mysqli_select_db($conexion, $basededatos) or die('No se ha podido conectar a la base de datos');

    mysqli_set_charset($conexion, 'utf-8');
?>