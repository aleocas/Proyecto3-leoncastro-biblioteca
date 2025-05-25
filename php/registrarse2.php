<?php 
    require_once('../conexion/header.php');
    require('../conexion/conexion.php');

    $administrador = 'admin098';
    if (isset($_POST['nombre']) && isset($_POST['correoe']) && isset($_POST['contrasena'])) {
    $nombre = trim($_POST['nombre']);
    $correoe = trim($_POST['correoe']);
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    if ($_POST['contrasena']  === $administrador){
      $rol = 'admin';
    }else{
      $rol = 'cliente';
    }
  }
  $sth = $dbh->prepare('INSERT INTO Usuarios (nombre, correoe, contrasena, rol)  VALUES (?,?,?,?)');
  if($sth->execute([$nombre, $correoe, $contrasena, $rol])){
    $sth = $dbh->prepare('SELECT id FROM Usuarios WHERE correoe = ?');
    $sth->execute([$correoe]);
    $row = $sth->fetch();
    if ($row) {
      $id = $row[0];
    } else {
      $mensaje = 'Correo inválido.';
    }
  }else{
    $mensaje = 'No se han encontrado datos';
  }
  
  $_SESSION['usuario'] = [
      'id' => $id,
      'correoe' => $correoe,
      'rol' => $rol
  ];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../index.php">Inicio</a>
</body>
</html>