<?php 
session_start();
$rutas = 'http://localhost/Proyecto3_copia/Proyecto3/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Inicio</title>
</head>
<body>
<header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="<?php echo $rutas ;?>index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="<?php echo $rutas;?>img/libro.png" id="logo" style="width: 60px; heigth: 60px;">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" style="margin-left: 30px">
          <li><a href="" class="nav-link px-2 text-secondary">Inicio</a></li>
          <li><a href="<?php echo $rutas;?>php/catalogo.php" class="nav-link px-2 text-white">Catálogo</a></li>
          <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 'admin'){?>
            <li><a href="<?php echo $rutas;?>php/administrar.php" class="nav-link px-2 text-white">Administrar</a></li><?php
          }?>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" aria-label="Search" placeholder="Buscar...">
        </form>

        <div class="text-end">
          <?php if(!isset($_SESSION['usuario'])){?>
          <a href="<?php echo $rutas;?>php/iniciar_sesion.php"><button type="button" class="btn btn-outline-light me-2">Iniciar Sesión</button></a>
          <a href="<?php echo $rutas;?>php/registrarse.php"><button type="button" class="btn btn-primary">Registrarse</button></a><?php
          }else{?>
            <a href="<?php echo $rutas;?>php/cerrar_sesion.php"><button type="button" class="btn btn-primary">Cerrar sesión</button></a><?php
          }
          ?>
        </div>
      </div>
    </div>
  </header>
</body>
</html>