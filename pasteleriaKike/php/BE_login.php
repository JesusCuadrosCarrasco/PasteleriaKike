<?php

    include 'conexion.php';
    session_start();

    $email = $_POST['email'];
    $password= $_POST['password'];



    $password = md5($password);
    
    $consulta=mysqli_query($conexion, "SELECT*FROM user where email='$email' and password ='$password'");

    if(mysqli_num_rows($consulta)>0){

        $row = mysqli_fetch_array($consulta); 


        $_SESSION['dniUser'] = $row[0];
        //$_SESSION['nameUser'] = $row[1];
        $_SESSION['rol'] =  $row[6];
        $_SESSION['nameUser'] =$row[1];

        
        // 1 - Admin | 2 - cliente 
        switch($_SESSION['rol']){
            case 1:
                
                header('Location:../admin/indexAdmin.php');
                break;

            case 2:
                header('Location:../index.php');
                break;

            case 3:
            
                header('Location:../empleado/indexEmpleado.php');
                break;

            default;
        }
        
    }else{
        header("Location: ../login.php?error=Error de Autenticación");

    }

?>