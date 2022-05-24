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
                <a class="navbar-brand" href="tienda.html">Tienda</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="ventas">Ventas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inventario.html">Inventario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="panel.html">Panel</a>
                        </li>
                    </ul>
                </div>
        </div>
    </div>
  </head>
  <body>
      <!--- Crear una tabla horizontal con bootstrap para registrar las ventas -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-1 text-center">Sistema de ventas</h1>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Fruta</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                        <!---Usuario ingresa productos dentro de la tabla-->
                            <tr>
                                <form action="send.php" method="POST">
                                    <td><select class="form-control" name="fruta" id="fruta" required>
                                        <option value="">Seleccione una fruta</option>
                                        <option value="Fresa">Fresa</option>
                                        <option value="Mango">Mango</option>
                                    </select></td>
                                    <td><input type="text" name="cantidad" class="form-control" id="cantidad" placeholder="Cantidad" required></td>
                                    <td><input type="text" name="precio" class="form-control" id="precio" placeholder="Precio" required></td>
                                    <td><input type="submit" class="btn btn-primary" value="Enviar"></td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                    <!---Desplegamos los ultimos 10 productos entregados-->
                    <h3 class="display-6 text-center pd-10">Ultimas entregas</h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Fruta</th>
                                <th>Precio</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                //Conectamos a la base de datos
                                require_once 'connect.php';
                                //Seleccionamos los ultimos 10 productos entregados
                                $sql = "SELECT * FROM ventas ORDER BY id DESC LIMIT 10";
                                $result = mysqli_query($link, $sql);
                                //Creamos una tabla con los datos de la base de datos
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                    echo "<td>" . $row['Fruta'] . "</td>";
                                    echo "<td>" . $row['Precio'] . "</td>";
                                    echo "<td>" . $row['Fecha'] . "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  </body>
</html>