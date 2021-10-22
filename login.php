<?php
  session_start();
?>
<!doctype html>
<html lang="es">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="SENA">
  <title>CRUD con PHP - LOGIN</title>


    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
 
<main class="form-signin">

  <?php
  /*
    include 'conexion.php';
    //verificar que el botón login ha sido presionado
    if(isset($_POST['ingresar'])){
        //capturar las variables del formulario
        $usuario=$_POST['usuario'];
        $password=$_POST['password'];
        //armar el SQL para consultar
        $sql="select * from usuario where usuario='".$usuario."' and password='".$password."'";
        if($resultado=mysqli_query($con,$sql)){
          if(mysqli_num_rows($resultado)>0){  //si hay un resultado significa que hay coincidencia
            $_SESSION["usuario"]=$usuario;
            header("Location: listarfabricante.php"); //redirigir a listarfabricante
            exit();
          }
          else{
            echo "<div class='alert alert-danger' role='alert'>Usuario o password incorrecto</div>";
            session_destroy();
          }
        }
        else{
            echo "<div class='alert alert-danger' role='alert'>Error en SQL: ".mysqli_error($con)."</div>";
        }
    }*/
?>

  <form name="iniciarsesion" method="post">
    <img class="mb-4" src="logo.svg" alt="" width="100">
    <h1 class="h3 mb-3 fw-normal">Iniciar Sesión</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario">
      <label for="usuario">Usuario</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      <label for="password">Password</label>
    </div>

    
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="ingresar">Login</button>
    
  </form>
</main>


    
  </body>
</html>
