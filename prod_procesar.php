<?php
    include('inc/conexion.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST["nombre"])){
            $nombre_error = "Por favor indique un nombre del producto";
        } else{
            $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
        }
        
        if(empty($_POST["categoria"])){
            $categoria_error = "Por favor indique la categoria para el producto";
        } else{
            $categoria = filter_var($_POST["categoria"], FILTER_SANITIZE_STRING);
        }

        if(empty($_POST["precio"])){
            $precio_error = "Por favor indique el precio para el producto";
        } else{
            $precio = filter_var($_POST["precio"], FILTER_SANITIZE_STRING);
        }
    }

    if (!empty($categoria_error) || !empty($nombre_error) || !empty($precio_error)) {
        $Message = "Debe completar los campos nombre, categoria y precio";
        header("Location:prod_alta.php?error={$Message}");
    } else {
        $altaproducto = "INSERT INTO productos (nombre, descripcion, categoria, precio, destacado) values ('$nombre', '$descripcion', '$categoria', '$precio', '$destacado')";
        $resultado = mysqli_query($conexion, $altaproducto) or die('No se ha podido ejecutar la consulta.');
        
        mysqli_close($conexion);

        if ($resultado) {
            $Message = "Se ha creado el producto ".$nombre."";
            header("Location:prod_alta.php?success={$Message}");
        } else {
            $Message = "Error al insertar el producto";
            header("Location:prod_alta.php?error={$Message}");
        }
    }

    
?>