<?php
    include('inc/conexion.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST["nombre"])){
            $nombre_error = "Por favor indique un nombre del producto";
        } else{
            $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
        }

        if(empty($_POST["descripcion"])){
            $descripcion_error = "Por favor indique un nombre del producto";
        } else{
            $descripcion = filter_var($_POST["descripcion"], FILTER_SANITIZE_STRING);
        }
        
        if(empty($_POST["categoria"])){
            $categoria_error = "Por favor indique la categoria para el producto";
        } else{
            $categoria = filter_var($_POST["categoria"], FILTER_VALIDATE_INT);
        }

        /* Esto es lo que estaba, solo le puse una validacion si ingresaba una letra
        en vez de un numero.
        if(empty($_POST["precio"])){
            $precio_error = "Por favor indique el precio para el producto";
        } 
        */

        if(is_numeric($_POST["precio"]) == false || empty($_POST["precio"]))
        {
            $precio_error = "Por favor indique el precio para el producto";
        }
         else
        {
            $precio = filter_var($_POST["precio"], FILTER_SANITIZE_STRING);
        }
    }
?>