<?php 
   include '../php/conexion.php';
   session_start();
    error_reporting(0);
    $id=$_GET['id'];

    $varsesion = $_SESSION['dniUser'];

   /* if(!isset($_SESSION['rol']) || $varsesion == null || $varsesion == ''){
        header('location: ../../login.php');
        session_destroy();
        die();
    }else{
        if($_SESSION['rol'] != 1){
            header('location: ../../login.php');
            session_destroy();
            die();
        }
    }*/

    

    $sql="SELECT * FROM producto WHERE codproducto='$id'";
    $query=mysqli_query($conexion,$sql);

    $row=mysqli_fetch_array($query);
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>

    <script src="https://kit.fontawesome.com/8c5b94d33d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">

</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><i class="fas fa-users-cog"></i><span> Admin</span></h2>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="indexAdmin.php"  class="active"> <i class="fas fa-house-user"></i>
                    <span>Tablero</span></a>
                </li>
                <li>
                    <a href="product.php"><i class="fas fa-shopping-basket"></i>
                    <span>Productos</span></a>
                </li>
                <li>
                    <a href="cliente.php"><i class="fas fa-users"></i>
                    <span>Clientes</span></a>
                </li>


                
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <i class="fas fa-bars"></i>
                </label> 
            </h2>

            
            <div class="user-wrapper">
                
                <div>
                    <h4>Administrador <span id="user"><?php echo $varsesion;?></span></h4>
                        <a href="../login.php"><i class="fas fa-times-circle"></i>
                        <span>Cerrar Sesión</span></a>
                </div>
            </div>
        </header>

        <main>
            <div class="form-inner">
                <form action="BE_registrar.php" method="POST" class="login">
                    <div class="logo">
                        
                        <h3>REGISTRO DE USUARIO</h3>
                    </div>
                    <div class="fields">

                        
                        <div class="field">
                            <label for="dni">Dni</label>
                            <input type="text" maxlength="8" name = "dni" placeholder="DNI" required>  
                        </div>

                        <div class="field">
                            <label for="name">Nombre</label>
                            <input type="text" name = "name" placeholder="Nombres" required>  
                        </div>
                    </div>

                    <div class="fields">
                        <div class="field">
                            <label for="lastNameP">Apellido Paterno</label>
                            <input type="text" name = "lastNameP" placeholder="Apellido Paterno" required>  
                        </div>
    
                        <div class="field">
                            <label for="lastNameM">Apellido Materno</label>
                            <input type="text" name = "lastNameM" placeholder="Apellido Materno" required>  
                        </div>
                    </div>

                    <div class="fields">
                        <div class="field">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" name="email" placeholder="Correo electrónico" required>  
                        </div>

                        <div class="field">
                            <label for="password">Contraseña</label>
                            <input type="password" name = "password" placeholder="Contraseña" required>  
                        </div>
                    </div>
                    
                   <div class="fields">
                        <div class="field">
                            <button type="submit"> Registrar </button>
                        </div>
                   </div>
                </form>


                
                    
                </div>
            
           
        </main>

    </div>

</body>

</html>



