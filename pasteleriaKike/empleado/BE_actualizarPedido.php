<?php

    include '../php/conexion.php';

    $id = $_REQUEST["id"];
    
    
    $sql = "UPDATE `pedido` SET `estado`='terminado' WHERE codPedido=$id";
    
    if (mysqli_query($conexion, $sql)) {
        header("Location:indexEmpleado.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

?>