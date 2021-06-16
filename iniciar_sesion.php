<!DOCTYPE html>
<html lang="en">
<head>  
    <?php include('inc/head.php'); ?>
    <?php 
        head();
    ?>
    <?php include('inc/conexion.php'); ?>
    <?php include('inc/footer.php'); ?>
    <?php include('inc/conexion.php'); ?> 
</head>
<body>


    <div class="d-xxl-flex bd-highlight">
        <div class="col">
          <nav class="navbar navbar-expand-xxl navbar-light bg-light ">
          <a class="navbar-brand" href="/php-cuch">Dietetica</a>
        </div>
    </div>



<div class="div_contenedor">
        <div class="div_centrado">
                                    <!-- inciar sesion -->
<!-- incio -->
<div class="col">
      <form class="col align-self-center" aria-labelledby="dropdownMenuOffset" action="login.php" method="POST">
      <div class="form-group">
      <br> <br> <br>
          <label for="exampleDropdownFormEmail2">Usuario</label>
          <input type="text" class="form-control" id="usuario" placeholder="Usuario" name="username" >
      </div>
      <div class="form-group">
          <br>
              <label for="exampleDropdownFormPassword2">Clave</label>
              <input type="password" class="form-control" id="password" placeholder="Clave" name="password" >
      </div>        
        <!--BOTON INGRESAR-->
              <br> <br>
          <div class="d-grid gap-2 col-6 mx-auto">
              <button type="submit" class="btn btn-info align-self-center">Ingresar</button>  
          </div>  
<!-- fin -->
        <!--BOTON DE REGISTRO-->
              <br> <br> 
              <a class="btn btn-link" href="registrarse.php" role="button">¿Aún no tienes cuenta? Regístrate</a>
              
      </form>
      </div>
      </div>
      </div>
        <style>
        .div_contenedor{
            height: 100%;
            width: 100%;
            text-align: center;
        }
        .div_contenedor::before{
            content: '';
            display: inline-block;
            vertical-align: middle;
            height: 100%;
        }
        .div_centrado{
            width: 300px;
            height: 700px;
            display: inline-block;
            vertical-align: middle;
        }
        </style>

        <?php 
            footer();
        ?>



    </body>
</html>