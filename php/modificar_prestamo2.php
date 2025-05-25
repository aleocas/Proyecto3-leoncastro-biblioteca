<?php
    require_once('../conexion/header.php');
    require('../conexion/conexion.php');

    if (isset($_POST['idPrestamo']) && isset($_POST['fechaIni'])&& isset($_POST['fechaFin'])){
        $id = trim($_POST['idPrestamo']);
        $fecha_inicio = trim($_POST['fechaIni']);
        $fecha_fin = trim($_POST['fechaFin']);
    }

    $sth = $dbh->prepare('UPDATE Prestamos SET fecha_inicio = ?, fecha_fin = ? WHERE id = ?');
    if(!$sth->execute([$fecha_inicio, $fecha_fin, $id])) {
        echo '<p>No se pudo actualizar el préstamo.</p>';
    } else {
        header('Location: ver_prestamos.php');
        exit();
    }
?>