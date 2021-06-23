<?php
    include('inc/conexion.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if(empty($_POST["nombre"])){
            $nombre_error = "Por favor indique un nombre a la oferta";
        } else{
            $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
            
        }

        if(empty($_POST["descripcion"])){
            $descripcion_error = "Por favor indique una descripcion a la oferta";
        } else{
            $descripcion = filter_var($_POST["descripcion"], FILTER_SANITIZE_STRING);
        }

        if(is_numeric($_POST["precio"]) == false || empty($_POST["precio"]))
        {
            $precio_error = "Por favor indique el precio para la oferta";
        }
         else
        {
            $precio = filter_var($_POST["precio"], FILTER_SANITIZE_STRING);
        }

        if(empty($_POST["prod_seleccionados"])){
           
            $prod_seleccionados_error = "Por favor seleccione mas de 2 productos";
        
        } 
        else{
           
            foreach($_POST['prod_seleccionados'] as $selected)
            {
              echo $selected."</br>";// Imprime resultados de los productos seleccionados
             // lo comentado es para terminar de llenar la tabla ofertas_productos
             // $alta_productos_en_oferta = "INSERT INTO ofertas_por_productos (ofertaid, productoid) values ('$ofertaid' , '$selected')";
            }
        }
        if(!empty($prod_seleccionados_error) || !empty($nombre_error) || !empty($precio_error) || !empty($descripcion_error)) 
        {                    
            $Message = "Debe completar todos los campos";
            header("Location:ofer_alta.php?error={$Message}");
        }
        else
        {
            $alta_oferta = "INSERT INTO ofertas (nombre , descripcion , precio) values ('$nombre', '$descripcion', '$precio')";
            $resultado = mysqli_query($conexion, $alta_oferta) or die('No se ha podido ejecutar la consulta.');
            
            mysqli_close($conexion);
    
            if ($resultado) 
            {
                $Message = "Se ha creado la oferta ".$nombre."";
                header("Location:ofer_admin.php?success={$Message}");
            }
            else 
            {
                $Message = "Error al crear la oferta";
                header("Location:ofer_alta.php?error={$Message}");
            }
        }
        

    }
?>