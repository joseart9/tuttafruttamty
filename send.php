<?php

$today = date("Ymd");

require_once 'connect.php';

$fruta = $_REQUEST['fruta'];
$cantidad = $_REQUEST['cantidad'];
$sucursal = $_REQUEST['sucursal'];
$precio = $_REQUEST['precio'];

//Convertir el valor numerico de la fruta a uno legible.
if($fruta == 1){
    $fruta = "Fresa";
}else if($fruta == 2){
    $fruta = "Mango";
}

while($cantidad >= 1) {
  $sql = "INSERT INTO ventas (Fruta, Precio, FechaNorm, Sucursal) VALUES ";
  $sql .= "('" . $fruta . "',";
  $sql .= "'" . $precio . "',";
  $sql .= "'" . $today . "',";
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
header("Location: ventas.php");

 ?>
