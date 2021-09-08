
<?php
    include 'php/BE_carrito.php';
    session_start();
    error_reporting(0);
   
    
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

        <link rel="stylesheet" href="css/styleCompra.css" />

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
                    <?php
                        $total = $_REQUEST['t'];
                        echo "<h1>Total $total</h1>";
                    ?>
                
                </div>

                <form action="php/BE_compra.php" class="formCompra" method="POST">
                   
                    <div class="info">
                        <div class="title">DATOS DEL PEDIDO</div>
                        <div class="fields">
                            <div class="field">
                                <label for="fecha">Fecha de entraga</label>
                                <input type="date" name = "fecha" placeholder="Fecha de entrega " required>  
                            </div>
                        </div>
                        <div class="field">
                        <label for="pago">Pago</label>
                        <div class="select_mate" data-mate-select="active" >
                            <select name="pago" onclick="return false;" id="">
                                <option value=""  >Seleciona una Opcion </option>
                                <option value="1">PayPal</option>
                                <option value="2" >Transferencia Bancaria</option>
                            </select>
                        </div>
                           
                            
                        </div>
                    </div>
                    <div class="plusP">
                        <button class="plus"><a class="plusA" href="productList.php">Cancelar</a></button>
                        <button class="plus" id="compra">Realizar Compra</button>
                    </div>

                </form>

                
               
           </div> 
           
        </div>

        
       


        <footer>
            <p>Todos los derechos reservados &copy Gabriela Motta & Jesús Carrasco</p>
        </footer>

    </body>
</html>