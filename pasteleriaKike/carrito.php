
<?php
    include 'php/BE_carrito.php';

   

   
?>





<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pasteleria Kike</title>
      
        <link rel="stylesheet" href="css/normalize.css" />
      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kulim+Park:wght@200&family=Kurale&display=swap" rel="stylesheet">

         <!--Design-->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
         <script src="https://kit.fontawesome.com/8c5b94d33d.js" crossorigin="anonymous"></script>
         <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="css/styleCarrito.css" />
        

    </head>


    <body>
        <header class="header">
            <div class="container logo-nav-container">
                <img id="imgLogo" src="img/Logo.png" alt="logo">
                <a href="index.php" class="logo">Pastelería KIKE</a>
                <nav class="navigation">
                    <ul>
                            <?php

                            if(isset($_SESSION['rol'])) {

                                $name = $_SESSION['nameUser'];
                                $rol = $_SESSION['rol'];

                                echo '  <li><a class="active" href="index.php">Inicio</a></li>
                                        <li><a href="contact.php">Contacto</a></li>
                                        <li><a href="carrito.php">Carrito</a></li>';
                                echo "<li id='userInfo' style='text-align=center;'><p>Bienvenido ";
                                echo $name;
                                echo "</p>
                                        <a href='login.php'></i>
                                        <span>Cerrar Sesión</span></a>
                                    </li>";

                            }else{
                                echo '  <li><a class="active" href="index.php">Inicio</a></li>
                                        <li><a href="contact.php">Contacto</a></li>
                                        <li><a href="login.php">Iniciar Sesión</a></li>';
                            }
                            ?>

                    </ul>
                </nav>
            </div>
        </header>

        
        <div class="main">
           <div class="containerCar">
                <div class="title">
                    <h3 style="font-size:50px; color:var(--rojo);">Productos en su carrito</h3>
                </div>
                <div class="carProducts">
                    <table>
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Accion</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                                <?php

                                    $total=0;

                                    foreach($_SESSION['carrito'] as $indice =>$producto){

                                        ?>
                                        <tr>
                                        
                                        <td width="15%"><img style="width:90px;height:80px;" src="data:image/jpg;base64, <?php echo $producto['foto']; ?>" ></td>
                                        <td width="40%"><?php echo $producto['nombreProducto'] ?></td>
                                        <td width="20%"><?php echo $producto['precio'] ?></td>
                                        <td width="10%"><?php echo $producto['cantidad'] ?></td>
                                        <td width="15%"><?php echo $producto['precio']*$producto['cantidad'] ?></td>
                                        <td>
                                            <a href="carrito.php?action=remove&id=<?php echo $producto["idProducto"]?>">
                                                Eliminar
                                            </a>
                                        </td>
                                        </tr>

                                    
                                    
                                    <?php
                                        $total = $total + ($producto['precio']*$producto['cantidad']);

                                    }
                                
                                ?>
                                <tr>
                                    <td colspan="4" align="right" style="font-weight:bold;">Total</td>
                                    <td align="right"><?php echo $total ?></td>
                                    <td></td>
                                </tr>
                            
                        </tbody>

                    
                    
                    </table>
                </div>

                <div class="plusP">
                 <form action="">
                 <button class="plus"><a class="plusA" href="productList.php">Ver más productos</a></button>
                 <button class="plus" id="compra"><a class="plusA" href="compra.php?t=<?php echo $total?>">Realizar pago</a></button>
                 </form>
                </div>
               
           </div> 
           
        </div>

        
       


        <footer>
            <p>Todos los derechos reservados &copy Gabriela Motta & Jesús Carrasco</p>
        </footer>

    </body>
</html>