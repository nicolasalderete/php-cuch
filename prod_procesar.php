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

        if(empty($_POST["precio"])){
            $precio_error = "Por favor indique el precio para el producto";
        } else{
            $precio = filter_var($_POST["precio"], FILTER_SANITIZE_STRING);
        }

        if(!empty($_FILES['imagen']['name'])){
            $imagen = $_FILES['imagen']['name'];
        }

        if(!empty($_POST["destacado"])){
            $destacado = 1;
        } else {
            $destacado = 0;
        }

        if($_POST["accion"] == "alta") {

            if (!empty($categoria_error) || !empty($nombre_error) || !empty($precio_error) || !empty($descripcion_error)) {
                $Message = "Debe completar los campos nombre, categoria, descripcion y precio";
                header("Location:prod_alta.php?error={$Message}");
            } else {
                $dir_subida = 'img/prod/';
                $fichero_subido = $dir_subida . basename($_FILES['imagen']['name']);
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
                    $altaproducto = "INSERT INTO productos (nombre, descripcion, categoriaid, precio, destacado, imagen) values ('$nombre', '$descripcion', '$categoria', '$precio', $destacado, '$imagen')";
                    $resultado = mysqli_query($conexion, $altaproducto) or die('No se ha podido ejecutar la consulta.');
                    
                    mysqli_close($conexion);
            
                    if ($resultado) {
                        $Message = "Se ha creado el producto ".$nombre."";
                        header("Location:prod_admin.php?success={$Message}");
                    } else {
                        $Message = "Error al insertar el producto";
                        header("Location:prod_alta.php?error={$Message}");
                    }
                } else {
                    $Message = "Error al subir el archivo";
                    header("Location:prod_alta.php?success={$Message}");
                }
            }
        } elseif ($_POST["accion"] == "update") {

        } else {
            header("Location:error.html");
        }
    }

    

    
?>