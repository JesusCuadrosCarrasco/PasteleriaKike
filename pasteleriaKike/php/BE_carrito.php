
<?php

include 'conexion.php';

session_start();
error_reporting(0);

if(isset($_GET['action'])){
    if($_GET['action'] == "remove"){
        foreach($_SESSION['carrito'] as $indice =>$producto){
            if($producto["idProducto"] == $_GET["id"]){
                unset($_SESSION["carrito"][$indice]);
            }

        }

    }

}



if(isset($_POST["add_to_cart"])){


    if (isset($_SESSION['carrito'])) {
        $item_array_id=array_column($_SESSION['carrito'],"idProducto");
        if (!in_array($_GET['id'],$item_array_id)) {
            $count = count($_SESSION["carrito"]);
            $producto = array(
                'foto'=>$_POST['foto'],
                'idProducto'=>$_POST['id'],
                'nombreProducto'=>$_POST['nombre'],
                'precio'=>$_POST['precio'],
                'cantidad'=>$_POST['cantidad']

            );
            $_SESSION['carrito'][$count]=$producto;
        }
    }else{
        $producto = array(
            'foto'=>$_POST['foto'],
            'idProducto'=>$_POST['id'],
            'nombreProducto'=>$_POST['nombre'],
            'precio'=>$_POST['precio'],
            'cantidad'=>$_POST['cantidad']

        );
        $_SESSION['carrito'][0]=$producto;
    }


    }
  
   



?>