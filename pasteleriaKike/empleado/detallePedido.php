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

    $sql="SELECT * FROM detallpedido INNER JOIN pedido ON detallpedido.idPedido = pedido.codPedido INNER JOIN producto ON detallpedido.idProducto = producto.codproducto WHERE detallpedido.idPedido ='$id'";
    $query=mysqli_query($conexion,$sql);

    $row=mysqli_fetch_array($query);
    
    $idP=$row['idPedido'];

    
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
    <link rel="stylesheet" href="css/car.css">

</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><i class="fas fa-cash-register"></i><span>Empl</span></h2>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
            <li>
                    <a href="indexEmpleado.php"  class="active"> <i class="fas fa-shopping-basket"></i>
                    <span>Pedido</span></a>
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
                    <h4>Caja, <span id="user"><?php echo $varsesion;?></span></h4>
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
                                 <label for="dni">DNI</label>
                                 <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['idUsuario']  ?>">
                             </div>  
                             
                             <div class="showData">
                                 <label for="nombre">Fecha de Entrega</label>
                                 <input type="date" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['fechaEntrega']  ?>">
                             </div>    
 
                             
  
                     </form>
                <div class="table-responsive">
                            <table width="100%">
                                    <thead>
                                        <tr>
                                            
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Foto</th>
                                            <th>Total</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <tr>
                                            <?php
                                                $total=0;

                                                $sql="SELECT * FROM detallpedido INNER JOIN pedido ON detallpedido.idPedido = pedido.codPedido INNER JOIN producto ON detallpedido.idProducto = producto.codproducto WHERE detallpedido.idPedido ='$id'";
                                                $query=mysqli_query($conexion,$sql);
                                            
                                                while($row=mysqli_fetch_array($query)){
                                                
                                            
                                            ?>
                                            
                                            <td><?php  echo $row['Nombre']?></td>
                                            <td><?php  echo $row['precio']?></td>
                                            <td><?php  echo $row['cantidad']?></td>
                                            <td><img height="90px" src="data:image/jpg;base64, <?php echo base64_encode($row['Foto']); ?>" ></td>
                                            <td><?php echo $row['precio']*$row['cantidad']?></td>
                                            <?php
                                                $total = $total + $row['precio']*$row['cantidad'];
                                            ?>

                                
                                            
                                                
                                            
                                        </tr>
                                        

                                        <?php 
                                            }
                                        ?>
                                                        
                                    </tbody>
                                </table>
                                <h4 id="Total">Total: S/. <bold><?php echo $total?></bold></h4>
                            </div>
                    <div class="plusP">
                        <button class="plus"><a class="plusA" href="indexEmpleado.php">Atrás</a></button>
                        <button class="plus" id="compra"><a class="plusB" href="BE_actualizarPedido.php?id=<?php echo $id?>">Pedido Terminado</a></button></button>
                    </div>


                    
                </div>
            
           
        </main>

    </div>

</body>

</html>



