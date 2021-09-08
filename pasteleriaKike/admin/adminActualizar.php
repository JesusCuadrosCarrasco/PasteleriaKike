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

    

    $sql="SELECT * FROM user WHERE dniUser='$varsesion'";
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
                <div class="container">
                    <form id="updateForm"action="BE_update.php" method="POST">
                             
                            <input type="hidden" name="usuario" value="<?php echo $row['dniUser']  ?>">

                            <div class="showData">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']  ?>">
                            </div>  
                            
                            <div class="showData">
                                <label for="nombre">Apellido Paterno</label>
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['apellidoP']  ?>">
                            </div>    

                            <div class="showData">
                                <label for="nombre">Apellido Materno</label>
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['apellidoM']  ?>">
                            </div>    
                            
                            <div class="showData">
                                <label for="rol">ROL</label>
                                <input type="text" class="form-control mb-3" name="rol" placeholder="rol" value="<?php echo $row['rol_id'] ?>">
                            </div> 
                           
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>


                    <table class="table" id="tableExtra" >
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">IdRol</th>
                                <th scope="col">Nombre del Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>Administrador</td>
                            
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>Usuario-Cliente</td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>Veterinario</td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            
           
        </main>

    </div>

</body>

</html>



