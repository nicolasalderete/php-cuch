<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include('inc/head.php'); ?>

    <?php 
        head();
    ?>
    
    <?php include('inc/secure.php'); ?>
    <?php include('inc/menu.php'); ?>
    <?php include('inc/footer.php'); ?>
    <?php include('inc/conexion.php'); ?>   
</head>
<body >
    
    <?php 
        menu();

        if(empty(trim($_GET["id"]))){
            header("Location:error");
            exit;
        } else {
            $idCategoria = filter_var($_GET["id"], FILTER_SANITIZE_STRING);
            
            $consulta = "select * from categorias where id = '$idCategoria'";
            $resultado = mysqli_query($conexion, $consulta)
            or header("Location:error");

            mysqli_close($conexion);

            $fila = mysqli_fetch_assoc($resultado);
        }
    ?>
        
    <main class="container mt-5">
        <h1 class="text-center">Modificar categoría</h1>
        <form action="cat_procesar.php" method="POST">
            <input type="hidden" name="accion" class="form-control" id="exampleFormControlInput1" value="update">
            <input type="hidden" name="catId" class="form-control" id="exampleFormControlInput1" value="<?php echo $fila['id']?>">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre de la categoría</label>
                <input type="text" name="nombre" class="form-control" id="exampleFormControlInput1" value="<?php echo $fila['nombre']?>" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"><?php echo $fila['descripcion']?></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><i class="fas fa-plus-circle"></i> Actualizar</button>
                <a href="cat_admin.php" class="btn btn-secondary"><i class="fas fa-arrow-alt-circle-left"></i> Volver</a>
            </div>
        </form>
    </main>

    <?php 
        footer();
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>