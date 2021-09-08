<?php
    include 'php/conexion.php';
    

	
    session_start();
    error_reporting(0);
    

    if(!isset($_SESSION['rol'])){
        header('location:login.php');
        session_destroy();
        die();
    }

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
        <link rel="stylesheet" href="css/styleProduct.css" />

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

        

        <main class="main">
        <div class="containerProduct">
            <?php         
                $id = $_REQUEST["id"];
                $sql="SELECT * FROM producto where codproducto=$id";
                $query=mysqli_query($conexion,$sql);
            
                while($row=mysqli_fetch_array($query)){
                    
                    
            ?>
                <div class="productResult">
                    <div class="img">
                        <img class="product__img" src="data:image/jpg;base64, <?php echo base64_encode($row['Foto']); ?>" >
                    </div>
                    <div class="info">
                        <div class="title">
                            <h3><?php  echo $row['Nombre']?></h3>
                        </div>
                        <div class="infoP">
                            <p>Pedidos con 48 Horas de anticipación. </p>
                            <p >S/.<?php  echo $row['precio']?></p>
                        </div>
                        <div class="addInfo">
                          

                            <form action="carrito.php" method="post">
                                <div class="quantity">
                                    <label>Cantidad</label>
                                    <input type="number" name="cantidad" id="cantidad" min="1" required>
                                </div>
                               
                                <input style="display:none;" name="foto" id="foto" value="<?php echo base64_encode($row['Foto']);?>">
                                <input style="display:none;" type="text" name="id" id="id" value="<?php echo $id?>">
                                <input style="display:none;" type="text" name="nombre" id="nombre" value="<?php  echo $row['Nombre']?>">
                                <input style="display:none;" type="text" name="precio" id="precio" value="<?php  echo $row['precio']?>">
                                <input type="submit" id="add_to_cart"name="add_to_cart"value="Agregar a carrito">
                                
                            </form>
                            
                        </div>
                    </div>
                </div>
                  

            <?php 
                }
            ?>
            

        </div>
           

            <div class="cards">
                        <?php         
                            $sql="SELECT * FROM producto LIMIT 3";
                            $query=mysqli_query($conexion,$sql);
                        
                            while($row=mysqli_fetch_array($query)){
								
                                
                        ?>
                             <div class="card">
                             <img class="product__img" src="data:image/jpg;base64, <?php echo base64_encode($row['Foto']); ?>" >
                                <div class="cardText">
                                    <h3><?php  echo $row['Nombre']?></h3>
                                    <p>S/.<?php  echo $row['precio']?></p>
                                    <button class="product__buy"><a style="color:white;" href="product.php?id=<?php echo $row['codproducto']?>">Comprar</a></button>
                                </div>
                            </div>
							
	
                        <?php 
                            }
                        ?>

            </div>

            <div class="plusP">
                <button class="plus"><a class="plusA" href="productList.php">Ver más productos</a></button>
            </div>

       
        </main>

        <footer>
            <p>Todos los derechos reservados &copy Gabriela Motta & Jesús Carrasco</p>
        </footer>


    </body>

</html>