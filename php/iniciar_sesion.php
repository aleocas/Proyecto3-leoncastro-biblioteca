<?php 
    require_once('../conexion/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="iniciar_sesion2.php" method="POST">
        Correo: <input type="text" name="correoe">
        Contraseña: <input type="password" name="contrasena">
        <input type="submit" name="Enviar">
    </form>
</body>
</html>