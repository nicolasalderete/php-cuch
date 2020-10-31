<?php
    function menu() {
?>
<!--Menu-->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Dietetica</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fas fa-piggy-bank"></i> Ofertas
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-store"></i> Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-utensils"></i> Alimentos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-street-view"></i> Ubicación</a>
                </li>

                <!--Ver si esta logueado -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administración</a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Productos</a>
                    <a class="dropdown-item" href="#">Categorias</a>
                    <a class="dropdown-item" href="#">Ofertas</a>
                    <a class="dropdown-item" href="#">Productos destacados</a>
                    </div>
                </li>
                <!--Ver si esta logueado -->

            </ul>

            <!--Buscar productos -->
            <form class="form-inline my-2 my-lg-0" action="productos.php" method="GET">
                <input class="form-control mr-sm-2" type="text" placeholder="Buscar producto" name="nombreProducto">
                <button class="btn btn-secondary ary my-2 my-sm-0" type="submit"> Buscar</button>
            </form>
            <!--Buscar productos -->
            
            <!-- Ver si no esta logueado -->
            <div class="nav-item dropleft">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="dropdownMenuOffset" data-offset="10,20"><i class="fas fa-user-lock"></i></a>
                <form class="dropdown-menu p-4" aria-labelledby="dropdownMenuOffset" action="login.php" method="POST">
                    <div class="form-group">
                        <label for="exampleDropdownFormEmail2">Usuario</label>
                        <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="usuario">
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormPassword2">Clave</label>
                        <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="clave">
                    </div>
                    <button type="submit" class="btn btn-primary">Ingresar</button>
                </form>
            </div>
            <!-- Ver si no esta logueado -->

        </div>
    </nav>
</header>
<!--Fin Menu-->

<?php
    }
?>