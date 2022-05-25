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
<!---Creamos el proceso para cerrar la tienda--->
<!--- Desplegamos las ventas de la sucursal de ese dia para confirmar que se cerrara la tienda-->
<?php

$conn = mysqli_connect("localhost", "admin", "admin", "tuttafrutta");
$today = date("Ymd");
//Seleccionamos las ventas de la sucursal de ese dia usando la variable today
$sql = "SELECT * FROM ventas WHERE FechaNorm = '$today'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo "<div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='card-body'>
                            <h5 class='card-title'>Ventas de hoy</h5>
                            <table class='table'>
                                <thead class='thead-dark'>
                                    <tr>
                                        <th scope='col'>#</th>
                                        <th scope='col'>Producto</th>
                                        <th scope='col'>Precio</th>
                                    </tr>
                                </thead>
                                <tbody>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <th scope='row'>" . $row['ID'] . "</th>
                <td>" . $row['Fruta'] . "</td>
                <td>" . $row['Precio'] . "</td>
            </tr>";
    }
    echo "</tbody>
            </table>
        </div>
    </div>
</div>
<!--- Creamos un formulario para ingresar la utilidad del dia -->
<div class='col-md-12'>
    <div class='card'>
        <div class='card-body'>
            <h5 class='card-title'>Utilidad Bruta</h5>
            <form action='cerrar_confirmar.php' method='post'>
                <div class='form-group'>
                    <label for='utilidad'></label>
                    <input type='number' class='form-control' id='utilidad' name='utilidad' placeholder='Utilidad'>
                </div>
                <button type='submit' class='btn btn-danger'>Cerrar Tienda</button>
            </form>
        </div>
    </div>
</div>";
} else {
    echo "<div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='card-body'>
                            <h5 class='card-title'>Ventas de hoy</h5>
                            <p class='card-text'>No hay ventas de hoy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
}
?>
