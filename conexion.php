<?php
$servidor="localhost"; //dirección del servidor 
$usuario="usuario"; //usuario del motor de bd
$password="usuario"; //password del motor de bd
$bd="tienda";  //base de datos

//declaramos una variable de conexión
$con=mysqli_connect($servidor,$usuario,$password,$bd);
//Si hay un error en la conexión, mostramos el error (detalle)
if(mysqli_connect_errno()){
    echo "Error en la conexión: ".mysqli_connect_error();
    exit();
}
?>