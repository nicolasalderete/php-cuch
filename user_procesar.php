<?php
    include('inc/conexion.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST["nombre"])){
            $nombre_error = "Por favor indique un nombre de categoria";
        } else{
            $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
        }
        
        if(empty($_POST["apellido"])){
            $apellido_error = "Por favor cargue una descripcion para la categoria";
        } else{
            $apellido = filter_var($_POST["apellido"], FILTER_SANITIZE_STRING);
        }
        if(empty($_POST["usuario"])){
            $usuario_error = "Por favor indique un nombre de categoria";
        } else{
            $usuario = filter_var($_POST["usuario"], FILTER_SANITIZE_STRING);
        }
        
        if(empty($_POST["clave"])){
            $clave_error = "Por favor cargue una descripcion para la categoria";
        } else{
            $clave = filter_var($_POST["clave"], FILTER_SANITIZE_STRING);
        }
    }

    if (!empty($descripcion_error) || !empty($nombre_error) || !empty($usuario_error) || !empty($clave_error)) {
        $Message = "Debe completar los campos obligatorios";
        header("Location:user_alta.php?error={$Message}");
    } else {

        $existeusuario = "select count(usuario) as nuevo from usuarios where usuario = '$usuario'";
    
        $resultado = mysqli_query($conexion, $existeusuario);

        while ($a = mysqli_fetch_assoc($resultado)) {
            $existe = $a['nuevo'];
        }

        if ($existe) {
            $Message = "El usuario ya existe";
            header("Location:user_alta.php?error={$Message}");
            exit;
        }

        $clavehash = password_hash($clave, PASSWORD_BCRYPT);
        echo $clavehash;
        $altausuario = "INSERT INTO usuarios (nombre, apellido, usuario, clave, vigente) values ('$nombre', '$apellido', '$usuario', '$clavehash', 1)";
        echo $altausuario;
        $resultado = mysqli_query($conexion, $altausuario) or die('No se ha podido ejecutar la consulta.');
        
        mysqli_close($conexion);
        
        if ($resultado) {
            $Message = "Se ha creado el usuario ".$nombre."";
            header("Location:user_alta.php?success={$Message}");
        } else {
            $Message = "Error al crear el usuario";
            header("Location:user_alta.php?error={$Message}");
        }
    }
    
    
    ?>