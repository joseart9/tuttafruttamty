<?php
require_once 'connect.php';

$fruta = $_REQUEST['fruta'];
$cantidad = $_REQUEST['cantidad'];
$sucursal = $_REQUEST['sucursal'];
$precio = $_REQUEST['precio'];

while($cantidad >= 1) {
  $sql = "INSERT INTO ventas (Fruta, Precio, Sucursal) VALUES ";
  $sql .= "('" . $fruta . "',";
  $sql .= "'" . $precio . "',";
  $sql .= "'" .$sucursal . "')";
  $cantidad--;

//print $sql;
  if(mysqli_query($link, $sql)){
    print ("Stored");
  } else {
    print("Failed");
  }
}

//regresar a index.php
header("Location: index.php");

 ?>