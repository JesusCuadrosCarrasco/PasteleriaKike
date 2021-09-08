<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pasteleria Kike: Registro</title>
      
        <link rel="stylesheet" href="css/normalize.css" />
      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kulim+Park:wght@200&family=Kurale&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/styleRegister.css" />

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
                                        <a href='login.php'><i class='fas fa-times-circle'></i>
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

        <div class="containerRegister">
            <div class="form-inner">
                <div class="logo">
                    <img id="imgLogo" src="img/Logo.png" alt="logo"/>
                    <h3>Pastelería KIKE</h3>
                </div>
                <form action="php/BE_register.php" method="POST" class="login">
                    <div class="fields">
                        
                        <div class="field">
                            <label for="dni">Dni</label>
                            <input type="text" name = "dni" placeholder="DNI" required>  
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

                    <div class="sinup-link">
                        Ya eres miembro?
                        <a href="login.php">Logueate aquí</a>
                    </div>

    
                </form>
            </div>
        </div>
    </body>
</html>