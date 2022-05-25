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
      <!--- Verificar si la tienda esta abierta viendo el Estado de la base de datos "sucursalstatus" -->
        <?php
            //Creamos la conexion con la base de datos
            $conn = new mysqli("localhost", "admin", "admin", "tuttafrutta");
            $query = "SELECT * FROM sucursalstatus";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            $estado = $row['Estado'];
            if ($estado == 1) {
            echo "<div>
                <!--- Crear una tabla horizontal con bootstrap para registrar las ventas -->
                <div class='container'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h1 class='display-1 text-center'>Sistema de ventas</h1>
                            <table class='table table-striped table-bordered'>
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
                                        <form action='send.php' method='POST'>
                                            <td><select class='form-control' name='fruta' id='fruta' required>
                                                <option value=''>Seleccione una fruta</option>
                                                <option value='Fresa'>Fresa</option>
                                                <option value='Mango'>Mango</option>
                                            </select></td>
                                            <td><input type='text' name='cantidad' class='form-control' id='cantidad' placeholder='Cantidad' required></td>
                                            <td><input type='text' name='precio' class='form-control' id='precio' placeholder='Precio' required></td>
                                            <td><input type='submit' class='btn btn-primary' value='Enviar'></td>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>";
            } else {
            echo "<div class='alert alert-danger' role='alert'>
            La tienda esta cerrada
            </div>";
            }
        ?>
        <!---Desplegamos los ultimos 15 productos entregados-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-1 text-center">Ultimos productos entregados</h1>
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
                                //Creamos la conexion con la base de datos
                                $conn = new mysqli("localhost", "admin", "admin", "tuttafrutta");
                                $query = "SELECT * FROM ventas ORDER BY id DESC LIMIT 15";
                                $result = mysqli_query($conn, $query);
                                while($row = mysqli_fetch_array($result)) {
                                    echo "<tr>
                                        <td>".$row['Fruta']."</td>
                                        <td>".$row['Precio']."</td>
                                        <td>".$row['Fecha']."</td>
                                    </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  </body>
</html>