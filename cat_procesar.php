<?php
    include('inc/conexion.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST["nombre"])){
            $nombre_error = "Por favor indique un nombre de categoria";
        } else{
            $nombre = $_POST["nombre"];
        }
        
        if(empty($_POST["descripcion"])){
            $descripcion_error = "Por favor cargue una descripcion para la categoria";
        } else{
            $descripcion = $_POST["descripcion"];
        }
    }

    if (!empty($descripcion_error) || !empty($nombre_error)) {
        $Message = "Debe completar los campos categoria y descripcion";
        header("Location:cat_alta.php?error={$Message}");
    } else {
        $altausuario = "INSERT INTO categorias (id, nombre, descripcion) values (NULL, '$nombre', '$descripcion')";
        echo $altausuario;
        $resultado = mysqli_query($conexion, $altausuario) or die('No se ha podido ejecutar la consulta.');
        
        mysqli_close($conexion);

        if ($resultado) {
            $Message = "Se ha creado la categoria ".$nombre."";
            header("Location:cat_alta.php?success={$Message}");
        } else {
            $Message = "Error al insertar la categoria";
            header("Location:cat_alta.php?error={$Message}");
        }
    }

    
?>