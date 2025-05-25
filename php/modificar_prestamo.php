<?php
    require_once('../conexion/header.php');
    require('../conexion/conexion.php');

    if (isset($_POST['idPrestamo']) && isset($_POST['idLibro']) && isset($_POST['fechaIni'])&& isset($_POST['fechaFin']) && isset($_POST['correo'])){
        $id = trim($_POST['idPrestamo']);
        $id_libro = trim($_POST['idLibro']);
        $correo = trim($_POST['correo']);
        $fecha_inicio = trim($_POST['fechaIni']);
        $fecha_fin = trim($_POST['fechaFin']);
    }

    $sth = $dbh->prepare('SELECT titulo, foto FROM Libros WHERE id = ?');
    $sth->execute([$id_libro]);
    $libro = $sth->fetch(PDO::FETCH_ASSOC);

    if (!$libro) {
        echo '<p>No existe ese libro</p>';
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Prestamo</title>
</head>
<body>
    <form action="modificar_prestamo2.php" method="POST">
        <img src="<?php echo $libro['foto']; ?>" alt="Foto del libro">
        <input type="hidden" name="idPrestamo" value="<?php echo $id; ?>">
        <p>Título del libro: <?php echo $libro['titulo']; ?></p>
        <p>Usuario que hace la reserva: <?php echo $correo; ?></p>
        <p>Fecha Inicio:</p>
        <input type="date" name="fechaIni" value="<?php echo $fecha_inicio; ?>" required><br>
        <p>Fecha Fin:</p>
        <input type="date" name="fechaFin" value="<?php echo $fecha_fin; ?>" required><br>
        <input type="submit" value="Editar campos">
    </form>
</body>
</html>
