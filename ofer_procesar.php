<?php
    include('inc/conexion.php');

    $oferta=[];

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST["nombre"])){
            $nombre_error = "Por favor indique un nombre del producto";
        } else{
            $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
            $oferta[] = $nombre;
        }

        if(empty($_POST["descripcion"])){
            $descripcion_error = "Por favor indique un nombre del producto";
        } else{
            $descripcion = filter_var($_POST["descripcion"], FILTER_SANITIZE_STRING);
            $oferta[] = $descripcion;
        }

        if(is_numeric($_POST["precio"]) == false || empty($_POST["precio"]))
        {
            $precio_error = "Por favor indique el precio para el producto";
        }
         else
        {
            $precio = filter_var($_POST["precio"], FILTER_SANITIZE_STRING);
            $oferta[] = $precio;
        }

        if(empty($_POST["prod_seleccionados"])){
           
            $prod_seleccionados_error = "Por favor seleccione un producto";
        
        } else{
            $id = filter_var($_POST["id"], FILTER_SANITIZE_STRING);
            $oferta[] = $id;

            $_SESSION['prod_oferta'] = $oferta; 
            
            foreach ($i as $oferta => $id) {
                echo "id: ".$id[$i];
            }
        }
    }
?>