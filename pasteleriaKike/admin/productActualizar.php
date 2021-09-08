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
                <div class="container">
                    <form id="updateForm"action="BE_editarConsulta.php" method="POST" enctype="multipart/form-data">
                             
                             <input type="hidden" name="idProducto" value="<?php echo $row['codproducto']  ?>">
 
                             <div class="showData">
                                 <label for="Nombre">Nombre del producto</label>
                                 <input type="text" class="form-control mb-3" name="nombre del producto" placeholder="Nombre del producto" value="<?php echo $row['Nombre']  ?>">
                             </div>    
 
                             <div class="showData">
                                 <label for="precio">Precio</label>
                                 <input type="text" class="form-control mb-3" name="precio" placeholder="Precio" value="<?php echo $row['precio']  ?>">
                             </div>   
                             
                         
 
                             <div class="showData">
                                <label for="estado">Estado</label>
                                <div class="select_mate" data-mate-select="active" >
                                    <select name="estado" onclick="return false;" id="">
                                        <option value=""  >Seleciona una Opcion </option>
                                        <option value="1">Activo</option>
                                        <option value="2" >Desactivado</option>
                                    </select>
                                </div>
                                
                             </div>
 
                             <div class="showData">
                                 <label >Foto</label>
                                 <img height="180px" width="180px" src="data:image/jpg;base64, <?php echo base64_encode($row['Foto']); ?>">
                             </div> 
                            
                             <div class="showData">
                                 <label >Cargar nueva radiografía</label>
                                 <input type="file" class="form-control mb-3" style="width"name="newRadiografia" placeholder="Modificar radiografia">
                             </div>
 
                             <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                     </form>

                </div>
            
           
        </main>

    </div>

</body>

</html>



