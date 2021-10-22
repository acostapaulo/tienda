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
include 'encabezado.php';
echo "<h3>Tabla Fabricante:</h3>";
echo "<a href='nuevofabricante.php'>Nuevo</a><br>";
//consulta sobre la tabla fabricante
if($result=mysqli_query($con,"select * from fabricante")){
    echo "Número de registros: ". mysqli_num_rows($result)."<br>";
    //Mostrar los registros
    echo "<table class='table'>";
    echo "<thead>";
    echo "<tr><td>Código</td><td>Nombre</td><td colspan='2'>Opciones</td></tr>";
    echo "</thead>";
    echo "<tbody>";
    while($datos=mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$datos['codigo']."</td>";
        echo "<td>".$datos['nombre']."</td>";
        echo "<td><a href='modificarfabricante.php?codigo=".$datos['codigo']."'>Modificar</a></td>";
        echo "<td><a href='eliminarfabricante.php?codigo=".$datos['codigo']."'>Eliminar</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    //liberar la memoria de la consulta
    mysqli_free_result($result);
}
mysqli_close($con);
include 'pie.php';
?>