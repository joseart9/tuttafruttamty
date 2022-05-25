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

<?php
    //<!---Revisamos que el ingreso de utilidad bruta coincida con el calculo de utilidad bruta--->
    //<!---Creamos una variable para guardar el valor de la utilidad bruta--->
    $utilidad = $_REQUEST['utilidad'];
    //<!--- Creamos variable today para obtener la fecha de hoy--->
    $today = date("Ymd");
    //Creamos una conexion con la base de datos
    $conn = mysqli_connect("localhost", "admin", "admin", "tuttafrutta");
    //Consultamos la base de datos para calcular la utilidad bruta
    $sql = "SELECT SUM(Precio) AS utilidad FROM ventas WHERE FechaNorm = '$today'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $utilidad_bruta = $row['utilidad'];
        }
    }
    //<!--- Revisamos que la utilidad ingresada sea igual a la utilidad bruta calculada--->
    if ($utilidad == $utilidad_bruta) {
        //Si es igual, cerramos la tienda
        $sql = "UPDATE sucursalstatus SET Estado = 0 WHERE IDSucursal = 0";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>
                    <h4 class='alert-heading'>¡Turno cerrado exitosamente!</h4>
                    <p>La tienda se ha cerrado, puede cerrar la página.</p>
                </div>";
                //Guardamos el valor de la utilidad en la base de datos "ingresocontrol" y regresamos el id de la sesion
                $sql = "INSERT INTO ingresoscontrol (Monto) VALUES ('$utilidad')";
                if (mysqli_query($conn, $sql)) {
                    $id = mysqli_insert_id($conn);
                    echo "<div class='alert alert-warning' role='alert'>
                            <h4 class='alert-heading'>¡Ingreso de control exitoso!</h4>
                            <p>El control se ha realizado exitosamente, el id de la sesión es: $id.</p>
                            <p>Recuerda anotar este identificador unico en el sobre con el dinero.</p>
                        </div>";
                } else {
                    echo "<div class='alert alert-danger' role='alert'>
                            <h4 class='alert-heading'>¡Error al ingresar el ingreso de control!</h4>
                            <p>No se ha podido ingresar el ingreso de control, intente nuevamente.</p>
                        </div>";
                }
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                    <h4 class='alert-heading'>¡Error al cerrar la tienda!</h4>
                    <p>Hubo un error al cerrar la tienda, intente nuevamente.</p>
                    <hr>
                    <p class='mb-0'>La utilidad bruta fue de $utilidad_bruta</p>
                </div>";
        }
    } else {
        //Si no es igual, mostramos un mensaje de error
        echo "<div class='alert alert-danger' role='alert'>
                <h4 class='alert-heading'>¡Error al cerrar la tienda!</h4>
                <p>La utilidad ingresada no coincide con la utilidad bruta calculada.</p>
                <hr>
                <p class='mb-0'>La utilidad bruta fue de $utilidad_bruta</p>
            </div>";
    }
?>