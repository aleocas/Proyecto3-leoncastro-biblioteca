<?php
    require_once('../conexion/header.php');
    require('../conexion/conexion.php');

    if (isset($_POST['idPrestamo']) && isset($_POST['idLibro']) && isset($_POST['copias'])){
        $id = $_POST['idPrestamo'];
        $id_libro = $_POST['idLibro'];
        $copias = $_POST['copias'];
    }

    $sth = $dbh->prepare('UPDATE Prestamos SET estado = "devuelto" WHERE id = ?');
    if($sth->execute([$id])){
        $sth = $dbh->prepare('UPDATE Libros SET copias = copias + ? WHERE id = ?');
        if(!$sth->execute([$copias, $id_libro])){
            echo "<p>No se ha podido actualizar las copias de los libros</p>";
        }else{
            header('Location: ver_prestamos.php');
        }
    }else{
        echo "<p>No se ha podido devolver el libro</p>";
    }
?>