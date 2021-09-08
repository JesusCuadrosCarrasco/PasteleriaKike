<?php
    include 'php/conexion.php';

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

        <link rel="stylesheet" href="css/styleContacto.css" />

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
           <div class="containerInfo">
                <div class="infos">
                    <h1>Ubicanos</h1>
                    <div class="info" id="phone">
                        <i class="fas fa-phone-square-alt"></i>
                        <div id="phones">
                            <p>360-66-34</p>
                            <p>975-456-784</p>
                        </div>
                    </div>
                    <div class="info" id="lot">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Jr. El porvenir MZ.b lote 12 Puente piedra</p>
                    </div>
                    <div class="info" id="email">
                        <i class="fas fa-envelope"></i>
                        <p>pasteleriaKike@gmail.com</p>
                    </div>
                </div>          
                <div class="msg">
                    <h3>Por favor, complete nuestro formulario de contacto</h3>
                    <div class="formContainer">
                        <form action="php/BE_loginUsuario.php" method="POST" class="login">
                            <div class="fields">
                                <div class="field">
                                    <label for="name">Nombres</label>
                                    <input type="text" name = "name" placeholder="Nombres" required>  
                                </div>
        
                                <div class="field">
                                    <label for="name">Apellido</label>
                                    <input type="text" name = "Apellido" placeholder="Apellido" required>  
                                </div>
                            </div>
        
                            <div class="fields">
                                <div class="field">
                                    <label for="name">Correo Electronico</label>
                                    <input type="email" name = "email" placeholder="Correo Electronico" required>  
                                </div>
            
                                <div class="field">
                                    <label for="phone">Telefono</label>
                                    <input type="number" name = "phone" placeholder="Telefono" required>  
                                    
                                </div>
                            </div>

                            <div class="fields">
                                <div class="field">
                                    <label for="name">Comentario</label>
                                    <textarea name="msg" id="" cols="20" rows="6" required></textarea>
                                    
                                </div>
                            </div>


        
                            
                           <div class="fields">
                                <div class="field">
                                    <button type="submit">Enviar Mensaje</button>
                                </div>
                           </div>
                        </form>
                    </div>
                </div> 
           </div> 
        </div>






        <footer>
            <p>Todos los derechos reservados &copy Gabriela Motta & Jesús Carrasco</p>
        </footer>

    </body>
</html>