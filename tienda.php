<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Tutta Frutta</title>
    <!--- Creamos el encabezado de la pagina -->
    <div class="container-fluid bg-light">
        <div class="container text-w">
            <h1 class="display-2 text-bottom_left"><b>Tutta Frutta</b></h1>
            <!--Menu del web app-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="tienda.php">Tienda</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="ventas.php">Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inventario.php">Inventario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="panel.php">Panel</a>
                        </li>
                    </ul>
                </div>
        </div>
    </div>
  </head>
  <body>
      <!--- Creamos un inicio de sesion -->
      <!--- Corroboramos que la tienda este cerrada viendo el estado de la sucursal -->
        <?php
        $conn = mysqli_connect("localhost", "admin", "admin", "tuttafrutta");
        $sql = "SELECT Estado FROM sucursalstatus WHERE IDSucursal = 0";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row['Estado'] == 0) {
            //Creamos el formulario para abrir la tienda
            echo "<div>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>Abrir tienda</h5>
                                        <form action='abrir.php' method='post'>
                                            <div class='form-group'>
                                                <label for='exampleInputEmail1'></label>
                                                <input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Usuario' name='usuario'>
                                            </div>
                                            <div class='form-group'>
                                                <label for='exampleInputPassword1'></label>
                                                <input type='password' class='form-control' id='exampleInputPassword1' placeholder='Contraseña' name='contrasena'>
                                            </div>
                                            <button type='submit' class='btn btn-primary'>Abrir</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>";
        } else if ($row['Estado'] == 1) {
            //Creamos el formulario para cerrar la tienda
            echo "<div>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h5 class='card-title'>Cerrar tienda</h5>
                                        <form action='cerrar.php' method='post'>
                                            <button type='submit' class='btn btn-primary'>Cerrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>";
        }
        ?>

    <!--- Termina el inicio de sesion -->

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  </body>
</html>