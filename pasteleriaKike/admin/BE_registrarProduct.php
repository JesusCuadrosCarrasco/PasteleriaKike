<?php

    include '../php/conexion.php';

  
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $estado=$_POST['estado'];
    $foto = addslashes(file_get_contents($_FILES['file']['tmp_name']));

   
     
    $sql = "INSERT INTO `producto`(`Nombre`, `precio`, `Estado`, `Foto`)";
    $sql .= "VALUES ('$nombre' ,'$precio' ,'$estado','$foto')";
    
    if (mysqli_query($conexion, $sql)) {
        header("Location:indexAdmin.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

?>