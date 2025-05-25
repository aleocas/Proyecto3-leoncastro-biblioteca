<?php
  require_once('../conexion/header.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <form action="registrarse2.php" method="POST">
        <h3>La contraseña para admins es admin098</h3>
        Nombre: <input type="text" name="nombre">
        Correo: <input type="text" name="correoe">
        Contraseña: <input type="password" name="contrasena">
        <input type="submit" name="Enviar">
    </form>
</body>
</html>

<?php
    require('../conexion/footer.php');
?>