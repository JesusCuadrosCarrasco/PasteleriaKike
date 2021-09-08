<?php

include 'BE_carrito.php';
include 'conexion.php';

$fEntrega=$_POST['fecha'];
$fechaActual = date('Y-m-d');
$pago=$_POST['pago'];
$dni=$_SESSION['dniUser'];
$estado = "proceso";


echo "<h3>$fEntrega</h3>";
echo "<h3>$fechaActual</h3>";
echo "<h3>$pago</h3>";


$sql = "INSERT INTO `pedido`(`fechaPedido`, `fechaEntrega`, `TipoPago`, `idUsuario`,`estado`)";
$sql .= "VALUES ('$fechaActual','$fEntrega' ,'$pago', '$dni','$estado')";

mysqli_query($conexion, $sql);


$consulta=mysqli_query($conexion, "SELECT codPedido FROM pedido where idUsuario='$dni' and fechaPedido='$fechaActual'");


    if(mysqli_num_rows($consulta)>0){
        $row = mysqli_fetch_array($consulta);
        
        $cod = $row[0];
        echo $cod;

        foreach($_SESSION['carrito'] as $indice =>$producto){

            $idP = $producto['idProducto'];
            $precio = $producto['precio'];
            $cantidad = $producto['cantidad'];


            

            $sql = "INSERT INTO `detallpedido`(`idPedido`, `idProducto`, `precio`, `cantidad`)";
            $sql .= "VALUES ('$cod' ,'$idP' ,'$precio', '$cantidad')";
            mysqli_query($conexion, $sql);

        
        }

        header("Location:../index.php");

    }















?>