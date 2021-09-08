<?php  
    session_start();
    session_destroy();
?>




<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pasteleria Kike: Login</title>
      
        <link rel="stylesheet" href="css/normalize.css" />
      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kurale&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kulim+Park:wght@200&family=Kurale&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/styleLogin.css" />

    </head>


    <body>
        <header class="header">
            <div class="container logo-nav-container">
                <img id="imgLogo" src="img/Logo.png" alt="logo">
                <a href="index.php" class="logo">Pastelería KIKE</a>
                <nav class="navigation">
                    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="login.php">Iniciar Sesión</a></li>
                        <li><a href="#">Carrito</a></li>
                        <li><a href="contact.php">Contacto</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="containerLogin">
            <div class="form-inner">
                <div class="logo">
                    <img id="imgLogo" src="img/Logo.png" alt="logo"/>
                    <h3>Pastelería KIKE</h3>
                </div>

                <form action="php/BE_login.php" method="POST" class="login">
                   <?php if (isset($_GET['error'])) { ?> 
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <div class="field">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" name="email" placeholder="email" required>  
                    </div>
    
                    <div class="field">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" placeholder="password" required>  
                    </div>
    
                    <div class="pass-link">
                        <a href="#">Olvidaste tu contraseña?</a>
                    </div>
    
                    <div class="field">
                        <button type="submit">Ingresar</button>
                    </div>
    
                    <div class="sinup-link">
                        No eres miembro?
                        <a href="register.php">Registrate aquí</a>
                    </div>
    
                </form>
            </div>
        </div>
    </body>
</html>