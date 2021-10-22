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
    if(isset($_POST['guardar'])){
        //capturar las variables del formulario
        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        //armar el SQL para insertar datos
        $sql="INSERT INTO fabricante(codigo,nombre) values ('".$codigo."', '".$nombre."')";
        if(mysqli_query($con,$sql)){
            echo "<div class='alert alert-success' role='alert'>Guardado</div>";
        }
        else{
            echo "<div class='alert alert-danger' role='alert'>Error al guardar: ".mysqli_error($con)."</div>";
        }
    }
?>


        <h3>Nuevo Fabricante</h3>

        
        <div class="row">
        <div class="col-sm-4">
        <form name="nuevo" action="" method="post">
        <div class="form-group">    
            <label for='codigo'>Código</label>
            <input type="text" class="form-control" name="codigo" id='codigo'>
        </div>
        <div class="form-group">    
            <label for='nombre'>Nombre </label>
            <input type="text" class="form-control" name="nombre" id='nombre'>
        </div><br>
        <button type="submit" class="btn btn-primary"  name="guardar">Guardar</button>
        </form>
        </div>
        </div>
        
        <br>
        <a href='listarfabricante.php'>Ir al listado</a>
<?php
 include 'pie.php';
?>