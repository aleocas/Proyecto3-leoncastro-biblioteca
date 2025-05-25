<?php 
    require_once('../conexion/header.php');
    require('../conexion/conexion.php');

    if (isset($_POST['titulo']) && isset($_POST['copias']) && isset($_POST['stock']) && isset($_POST['ruta']) 
    && isset($_POST['stock']) && isset($_POST['idAutor']) && isset($_POST['idLibro'])) {
        $titulo = trim($_POST['titulo']);
        $copias = trim($_POST['copias']);
        $stock = trim($_POST['stock']);
        $ruta = trim($_POST['ruta']);
        $id_autor = trim($_POST['idAutor']);
        $id_libro = trim($_POST['idLibro']);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
</head>
<body>
    <form action="editar_libro2.php" method="POST">
        <img src="<?php echo $ruta; ?>">
        <input type="hidden" name="idLibro" value="<?php echo $id_libro; ?>">
        <p>Titulo:</p><br>
        <input type="text" name="titulo" value="<?php echo $titulo; ?>" required><br>
        <p>Copias disponibles:</p><br>
        <input type="text" name="copias" value="<?php echo $copias; ?>" required><br>
        <p>Stock:</p><br>
        <input type="text" name="stock" value="<?php echo $stock; ?>" required><br>
        <p>Ruta de la imagen:</p><br>
        <input type="text" name="ruta" value="<?php echo $ruta; ?>" required><br>
        <p>Id del autor:</p><br>
        <input type="text" name="idAutor" value="<?php echo $id_autor; ?>" required><br>
        <input type="submit" value="Editar campos">
    </form>
</body>
</html>