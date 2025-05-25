<?php 
    require_once('../conexion/header.php');
    require('../conexion/conexion.php');
    if (isset($_POST['idLibro'])){
        $idLibro = $_POST['idLibro'];
    }

    $sth = $dbh->prepare('DELETE FROM Libros WHERE id=?');
    $sth->execute([$idLibro]);
    header('Location: gestionar_libro.php');
?>