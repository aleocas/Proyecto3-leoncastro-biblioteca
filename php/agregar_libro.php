<?php 
    require_once('../conexion/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
</head>
<body>
    <form action="agregar_libro2.php" method="POST">
        <p>Título del libro:</p><br>
        <input type="text" name="titulo" id="titulo" required><br>
        <p>Stock:</p><br>
        <input type="text" name="stock" id="stock" required><br>
        <p>Ruta de la imagen:</p><br>
        <input type="text" name="ruta" id="ruta" value="../img/"required><br>
        <p>Id del autor:</p><br>
        <input type="number" name="id_autor" id="id_autor" required><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>