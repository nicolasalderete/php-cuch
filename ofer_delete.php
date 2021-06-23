<?php
    include('inc/conexion.php');

  if($_SERVER["REQUEST_METHOD"] == "GET"){

        if(empty(trim($_GET["id"]))){
            $mensaje = "Error al eliminar la oferta";
            header("Location:ofer_admin.php?error=$mensaje");
            exit;
        } else {
            $idofer = filter_var($_GET["id"], FILTER_SANITIZE_STRING);
            $sqldelete = "DELETE FROM ofertas where id = '$idofer'";
            if (mysqli_query($conexion, $sqldelete)) {
                mysqli_close($conexion);
                $mensaje = "Oferta eliminado";
                header("Location:ofer_admin.php?success=$mensaje");
            } else {
                $mensaje = "Error al eliminar la oferta";
                header("Location:ofer_admin.php?error=$mensaje");
            }
        }
    }
    
?>