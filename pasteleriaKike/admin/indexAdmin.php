<?php
    include '../php/conexion.php';

    session_start();
    error_reporting(0);
    
    $varsesion = $_SESSION['dniUser'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8c5b94d33d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
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
                    <a href="admin.php"  class="active"> <i class="fas fa-house-user"></i>
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
            <div class="cards">
                <div class="card-single">
                    <div>
                        
                        <?php         
                            $sql="SELECT COUNT(*) as Total  FROM user where rol_id = 3";
                            $query=mysqli_query($conexion,$sql);
                        
                            while($row=mysqli_fetch_array($query)){
                                
                        ?>
                            <h1><?php  echo $row['Total']?></h1>

                        <?php 
                            }
                        ?>
                        
                        <span>Total de empleados registrados</span>
                    </div>
                    <div>
                        <i class="fas fa-user-md"></i>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <?php         
                            $sql="SELECT COUNT(*) as Total  FROM user where rol_id = 2";
                            $query=mysqli_query($conexion,$sql);
                        
                            while($row=mysqli_fetch_array($query)){
                                
                        ?>
                            <h1><?php  echo $row['Total']?></h1>

                        <?php 
                            }
                        ?>
                        <span>Total de usuarios (clientes) registrados</span>
                    </div>
                    <div>
                        <i class="fas fa-user"></i>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <?php         
                            $sql="SELECT COUNT(*) as Total  FROM user where rol_id = 1";
                            $query=mysqli_query($conexion,$sql);
                        
                            while($row=mysqli_fetch_array($query)){
                                
                        ?>
                            <h1><?php  echo $row['Total']?></h1>

                        <?php 
                            }
                        ?>
                        <span>Total de administradores registrados</span>
                    </div>
                    <div>
                        <i class="fas fa-user-cog"></i>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <?php         
                                $sql="SELECT COUNT(*) as Total  FROM user";
                                $query=mysqli_query($conexion,$sql);
                            
                                while($row=mysqli_fetch_array($query)){
                                    
                            ?>
                                <h1><?php  echo $row['Total']?></h1>

                            <?php 
                                }
                            ?>
                        <span>Total de personas registradas</span>
                    </div>
                    <div>
                        <i class="fas fa-users"></i>
                    </div>
                </div>


            </div>
            <!--Tabla-->
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Administradores Registrados</h3>

                            <form action="buscarAdmin.php" method="GET" class="form_search">
                                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar admin">
                                <input type="submit" value="Buscar" class="btn_search">
                            </form>

                            <a href="registrarUser.php"><button style ="width:150px; cursor:pointer">Registrar</button></a>

                
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                           
                                            <th>Nombre Completo</th>
                                            <th>Correo electrónico</th>
                                            <th colspan="2" >Operaciones </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php
                                                
                                                $sql="SELECT CONCAT(nombre, ' ', apellidoP,' ',apellidoM) full_name,email FROM user WHERE rol_id=1";
                                                $query=mysqli_query($conexion,$sql);
                                                

                                                while($row=mysqli_fetch_array($query)){
                                                    
                                            ?>
                                                <tr>
                                                    <td><?php  echo $row['full_name']?></td>
                                                    <td><?php  echo $row['email']?></td>
                                                     
                                                    <td><a href="adminActualizar.php?id=<?php echo $row['username'] ?>" class="btn btn-info">Editar</a></td>
                                                    <td><a href="BE_eliminar.php?id=<?php echo $row['username'] ?>" class="btn btn-danger">Eliminar</a></td>                                        
                                                </tr>
                                            <?php 
                                                }
                                            ?>
                                    </tbody>

                                
                                
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                
            </div>
        </main>

    </div>

</body>

</html>