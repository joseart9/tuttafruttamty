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
      <!--- Creamos una tabla con bootstrap para registrar las ventas -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Registrar Venta</h3>
                        </div>
                        <div class="card-body">
                            <form action="send.php" method="POST">
                                <div class="form-group">
                                    <label for="fruta">Fruta</label>
                                    <input type="text" class="form-control" id="fruta" name="fruta" placeholder="Fruta" required>
                                </div>
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" required>
                                </div>
                                <div class="form-group">
                                    <label for="sucursal">Sucursal</label>
                                    <input type="text" class="form-control" id="sucursal" name="sucursal" placeholder="Sucursal" required>
                                </div>
                                <div class="form-group">
                                    <label for="precio">Precio</label>
                                    <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  </body>
</html>