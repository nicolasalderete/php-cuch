<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <script src="https://kit.fontawesome.com/be65c86741.js" crossorigin="anonymous"></script>

    <?php include('inc/head.php'); ?>
    <?php include('inc/menu.php'); ?>
    <?php include('inc/footer.php'); ?>

    <?php 
        head();
    ?>

</head>
<body >
    
    <?php 
        menu();
    ?>
        
    <main class="container mt-5">
        <h1 class="text-center">Alta, baja y modificación de categorías</h1>
        <p><a href="cat_alta.php" class="btn btn-secondary"><i class="fas fa-plus-circle"></i> Nueva categoría</a></p>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col" style="width: 20%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                        <button class="btn">
                            <i class="fas fa-pencil-alt"></i> 
                        </button>
                        |
                        <button class="btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                        <button class="btn">
                            <i class="fas fa-pencil-alt"></i> 
                        </button>
                        |
                        <button class="btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                        <button class="btn">
                            <i class="fas fa-pencil-alt"></i> 
                        </button>
                        |
                        <button class="btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <?php 
        footer();
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>