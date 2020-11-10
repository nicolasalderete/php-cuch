<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('inc/head.php'); ?>

    <?php 
        head();
    ?>
    <?php include('inc/menu.php'); ?>
    <?php include('inc/footer.php'); ?>
    <?php include('inc/conexion.php'); ?>
</head>
<body >
    
    <?php 
        menu();

        $productoSearch = "";
        $categoriaSearch = "";

        if (isset($_GET["producto"])) {
            $productoSearch = $_GET["producto"];
        }

        if (isset($_GET["categoria"])) {
            $categoriaSearch = $_GET["categoria"];
        }
        
        $resultado = mysqli_query($mysqli, "SELECT * FROM productos");

    ?>
        
    <main class="mt-5">

        <!-- filtro de busqueda -->
        <div class="container">
            <div >
                <form action="productos.php" method="GET">
                    <div class="form-row align-items-center">
                        <div class="col-sm-3 my-1">
                            <input type="text" class="form-control" id="inlineFormInputName" placeholder="Nombre del producto" name="producto">
                        </div>
                        <div class="col-sm-3 my-1">
                            <select class="form-control" name="categoria" id="inlineFormInputName">
                                <option disabled selected>Seleccione una categoria</option>
                                <option value="Alimentos">Alimentos</option>
                                <option value="Productos">Productos</option>
                            </select>
                        </div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                        <div class="col-sm-3 my-1">
                            <?php if ($productoSearch): ?>
                                <span class="badge badge-primary">
                                    <a href="#" class="badge badge-primary"><?php echo $productoSearch; ?> x</a>
                                </span>
                            <?php endif; ?>
                            <?php if ($categoriaSearch): ?>
                                <span class="badge badge-primary">
                                    <a href="#" class="badge badge-primary"><?php echo $categoriaSearch; ?> x</a>
                                </span>
                            <?php endif; ?> 
                        </div>
                    </div>
                </form>
                <p></p>
            </div>

        </div>

        <?php if ($resultado): ?>
            <h1 class="text-center">No se encontraron resultados</h1> 
        <?php else: ?>
            <div class="container mt-5">
                <div class="row row-cols-1 row-cols-md-3">
                    <?php 
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<div class='col mb-4'>";
                                echo "<div class='card'>";
                                    echo "<img src=img/".$fila[0]." class='card-img-top' alt='...'>";
                                    echo "<div class='card-body'>";
                                        echo "<h5 class='card-title'>".$fila[0]."/h5>";
                                        echo "<p class='card-text'>".$fila[0]."</p>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        }
                    ?>
                </div>
            </div>
        <?php endif; ?>  
    </main>

    <?php 
        footer();
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>