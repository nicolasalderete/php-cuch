<?php
    include('inc/conexion.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST["nombre"])){
            $nombre_error = "Por favor indique un nombre para el usuario";
        } else{
            $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
        }
        
        if(empty($_POST["apellido"])){
            $apellido_error = "Por favor cargue un apellido para el usuario";
        } else{
            $apellido = filter_var($_POST["apellido"], FILTER_SANITIZE_STRING);
        }
        if(empty($_POST["usuario"])){
            $usuario_error = "Por favor indique un usuario por favor";
        } else{
            $usuario = filter_var($_POST["usuario"], FILTER_SANITIZE_STRING);
        }
        
        if(empty($_POST["clave"])){
            $clave_error = "Por favor cargue una clave para el usuario.";
        } else{
            $clave = filter_var($_POST["clave"], FILTER_SANITIZE_STRING);
        }

        if($_POST["accion"] == "alta") {
            if (!empty($descripcion_error) || !empty($nombre_error) || !empty($usuario_error) || !empty($clave_error)) {
                $Message = "Debe completar los campos obligatorios";
                header("Location:registrarse.php?error={$Message}");
            } else {
        
                $existeusuario = "select count(usuario) as nuevo from usuarios where usuario = '$usuario'";
            
                $resultado = mysqli_query($conexion, $existeusuario);
        
                while ($a = mysqli_fetch_assoc($resultado)) {
                    $existe = $a['nuevo'];
                }
        
                if ($existe) {
                    $Message = "El usuario ya existe, elija otro usuario";
                    header("Location:registrarse.php?error={$Message}");
                    exit;
                }
    
                $clavehash = password_hash($clave, PASSWORD_BCRYPT);
                $altausuario = "INSERT INTO usuarios (nombre, apellido, usuario, clave, rol_id) values ('$nombre', '$apellido', '$usuario', '$clavehash', '2')";
                echo $altausuario;
                $resultado = mysqli_query($conexion, $altausuario) or die('No se ha podido ejecutar la consulta.');
                
                
                if ($resultado) {
                    $Message = "Se ha creado el usuario ".$nombre."";
                    header("Location:iniciar_sesion.php?success={$Message}");
                } else {
                    $Message = "Error al crear el usuario";
                    header("Location:registrarse.php?error={$Message}");
                }
            }
        }
    } else {
        header("Location:error.html");
    }
    
    ?>