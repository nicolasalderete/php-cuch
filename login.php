<?php
    include('inc/conexion.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }
        
        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }
    }

    if (!empty($password_err) || !empty($username_err)) {
        $Message = "Debe completar los campos usuario y/o clave";
        header("Location:index.php?error={$Message}");
    } else {
        $resultado = mysqli_query($conexion, "SELECT nombre as nombre,  apellido as apellidp FROM usuarios WHERE usuario = '" .$username. "' AND password='" .$password. "'");
        $fila = mysqli_fetch_assoc($resultado);
        if ($fila) {
            session_start();
            $_SESSION["usuario"] = $fila['_msg']. " " .$fila['_msg'];
            $_SESSION["loggedIn"] = true;
            $Message = "Login exitoso";
            header("Location:index.php?success={$Message}");
        } else {
            $Message = "Usuario y/o clave inválidos";
            header("Location:index.php?error={$Message}");
        }

        mysql_free_result($resultado);
    }

    
?>