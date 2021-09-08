<?php

    include '../php/conexion.php';

    $dni=$_POST['dni'];
    $nombre=$_POST['name'];
    $apellidoP=$_POST['lastNameP'];
    $apellidoM=$_POST['lastNameM'];
    $email = $_POST['email'];
    $password = $_POST['password'];


   

     //Verificar Correo
     $validarEmail = "SELECT email FROM user WHERE email = '$email'";
     $verificarEmail = mysqli_query($conexion,$validarEmail);
 
     if(mysqli_num_rows($verificarEmail) > 0){
        header("Location: ../login.php?error=El correo ya está registrado");
         exit();
     }

     $Password = md5($password);
     $id_rol = 2;
     
    //conuslta SQL
     
    $sql = "INSERT INTO `user`(`dniUser`, `nombre`, `apellidoP`, `apellidoM`, `email`, `password`, `rol_id`)";
    $sql .= "VALUES ('$dni', '$nombre' ,'$apellidoP' ,'$apellidoM', '$email','$Password',1)";
    
    if (mysqli_query($conexion, $sql)) {
        header("Location:indexAdmin.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

?>