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
        $consulta = 'SELECT * FROM productos';
        $resultado = mysqli_query($conexion, $consulta)
            or die('No se ha podido ejecutar la consulta.');

        mysqli_close($conexion);
    ?>
        
    <main class="container mt-5">
        <h1 class="text-center">Alta, baja y modificación de productos</h1>
        <p><a href="prod_alta.php" class="btn btn-secondary"><i class="fas fa-plus-circle"></i> Nueva producto</a></p>
        <?php if (!$resultado): ?>
            <h1 class="text-center">No se encontraron resultados</h1> 
        <?php else: ?>
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
                    <?php 
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<th scope='row'>".$fila['id']."</th>";
                                echo "<td>".$fila['nombre']."</td>";
                                echo "<td>".$fila['descripcion']."</td>";
                                echo "<td>";
                                    echo "<a href='prod_edit.php?id=".$fila['id']."' class='btn'>";
                                        echo "<i class='fas fa-pencil-alt'></i> Editar";
                                    echo "</a> | ";
                                   /* echo "<a href='#' class='btn' data-href='prod_delete.php?id=".$fila['id']."' data-toggle='modal' data-target='#confirm-delete'>";
                                        echo "<i class='fas fa-trash-alt'></i> Eliminar";
                                    echo "</a>";*/
                                    ?>
                                    
                                    <a type="btn" class="btn btn-danger" data-toggle="modal" data-target="#modalborrar<?php echo $fila['id'];?>">
                                    <i class="fas fa-trash-alt">  </i>
                                     Eliminar
                                    </a>
                                    <?php
                                echo "</td>";
                            echo "</tr>";

                            include('modalborrar.php');



                        }
                    ?>
                </tbody>
            </table>
          <!--  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            Atencion
                        </div>
                        <div class="modal-body">
                            Desea eliminar el producto?
                        </div>
                        <p class="debug-url"></p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger btn-ok">Delete</a> 
                          boton de mas...<button type="button" class="btn btn-danger"  data-dismiss="modal" >borrar</button>
                        </div>
                    </div>
                </div>
            </div>-->
        <?php endif; ?>
    </main>



    <?php 
        footer();
    ?>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <script>
        /*$( document ).ready(function() {
            $('#confirm-delete').on('show.bs.modal', function(e) {
                $('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                
                $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
            });
        });*/
        

    <script>
</body>
</html>