<?php
require_once('../conexion/header.php');
require('../conexion/conexion.php');

if (isset($_POST['idLibro'])) {
    $id_libro = (int) $_POST['idLibro'];
    $id_usuario = (int) $_SESSION['usuario']['id'];

    $sth = $dbh->prepare('SELECT SUM(cantidad) AS cantidad_total FROM Prestamos WHERE id_libro = ? AND id_usuario = ? AND estado = "prestado"');
    $sth->execute([$id_libro, $id_usuario]);
    $prestamo = $sth->fetch();

    if ($prestamo && $prestamo['cantidad_total'] > 0) {
        $cantidad_prestada = (int) $prestamo['cantidad_total'];

        if (isset($_SESSION['usuario']['librosReservados'])) {
            $clave = array_search($id_libro, $_SESSION['usuario']['librosReservados']);
            if ($clave !== false) {
                unset($_SESSION['usuario']['librosReservados'][$clave]);
            }
        }

        header("Location: catalogo.php");
    }
}
?>
