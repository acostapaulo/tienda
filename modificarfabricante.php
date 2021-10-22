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
//verificar que el botón guardar ha sido presionado
if (isset($_POST['guardar'])) {
    //capturar las variables del formulario
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    //armar el SQL para insertar datos
    $sql = "update fabricante set nombre='" . $nombre . "' where codigo='" . $codigo . "'";
    if (mysqli_query($con, $sql)) {
        echo "<div class='alert alert-success' role='alert'>Actualizado</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error al actualizar: ".mysqli_error($con)."</div>";
    }
    echo "<a href='listarfabricante.php'>Ir al listado</a>";
    exit();
}

//Consultar y cargar el fabricante
//obtener el código que nos mandan por url
$codigo = $_GET['codigo'];
$result = mysqli_query($con, "select * from fabricante where codigo='" . $codigo . "'");
$datos = mysqli_fetch_assoc($result);

?>

<h3>Modificar Fabricante</h3>
<form name="nuevo" action="" method="post">
    <div class="form-group">
        <label for="codigo">Código</label>
        <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $datos['codigo'] ?>" readonly><br>
    </div>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datos['nombre'] ?>"><br>
    </div><br>
    <button class="btn btn-primary" type="submit" name="guardar">Actualizar</button>
</form>
<br>
<a href='listarfabricante.php'>Ir al listado</a>
<?php
include 'pie.php';
?>