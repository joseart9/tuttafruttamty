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
<!---Validar el inicio de sesion -->
<?php
    if(isset($_POST['usuario']) && isset($_POST['contrasena'])){
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];
        //Creamos una variable global de fecha para poder acceder a ella desde otro archivo
        //$GLOBALS['fecha'] = $fecha;
        //Creamos una conexion con la base de datos
        $conexion = mysqli_connect("localhost", "admin", "admin", "tuttafrutta");
        $consulta = "SELECT * FROM sucursales WHERE Usuario = '$usuario' AND Pass = '$contrasena'";
        $resultado = mysqli_query($conexion, $consulta);
        if(mysqli_num_rows($resultado) > 0){
            session_start();
            $_SESSION['usuario'] = $usuario;
            //Cambiamos el estado de la sucursal a abierta dentro de la tabla de sucursalStatus
            //!TODO HACERLA MULTISUCURSAL!

            $sql = "UPDATE sucursalstatus SET Estado = 1 WHERE IDSucursal = 0";
            if(mysqli_query($conexion, $sql)){
                echo "Sucursal abierta";
                header("Location: panel.php");
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                    Error al abrir la sucursal
                </div>";
            }
            header("Location: inventario.php");
        }else{
            echo "<div class='alert alert-danger' role='alert'>
                Usuario o contraseña incorrectos
            </div>
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
            </div>";
        }
    }
?>
<!--- Termina el inicio de sesion -->
