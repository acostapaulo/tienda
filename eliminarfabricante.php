<?php
session_start();
//verificar si la variable de sesión existe o no, es decir si estamos logueados
if(!isset($_SESSION["usuario"])){
    //sino hay variable de sesión, dirigirse al login
    session_destroy();
    header("Location: login.php");
    exit();
}
    include 'conexion.php';
    $codigo=$_GET['codigo'];
    $sql="DELETE FROM fabricante WHERE codigo='".$codigo."'";
        if(mysqli_query($con,$sql)){
            echo "Eliminado";
        }
        else{
            echo "Error al eliminar";
        }
        echo "<br><a href='listarfabricante.php'>Ir al listado</a>";
?>