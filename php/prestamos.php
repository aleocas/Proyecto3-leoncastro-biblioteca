<?php
require('../conexion/header.php');
require('../conexion/conexion.php');

if (isset($_POST['idLibro']) && isset($_POST['cantidad']) && isset($_POST['fechaInicio']) && isset($_POST['fechaFin'])) {
    $id_libro = (int) trim($_POST['idLibro']);
    $cantidad = (int) trim($_POST['cantidad']);
    $fechaIni = trim($_POST['fechaInicio']);
    $fechaFin = trim($_POST['fechaFin']);

    if($fechaIni < $fechaFin){
        $id_usuario = (int) $_SESSION['usuario']['id'];
        $sth = $dbh->prepare('UPDATE Libros SET copias = copias - ? WHERE id = ?');
        
        if ($sth->execute([$cantidad, $id_libro])) {
            $sth = $dbh->prepare('INSERT INTO Prestamos (id_libro, id_usuario, cantidad, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, ?, ?)');
            $sth->execute([$id_libro, $id_usuario, $cantidad, $fechaIni, $fechaFin, 'prestado']);
    
            if (!isset($_SESSION['usuario']['librosReservados'])) {
                $_SESSION['usuario']['librosReservados'] = [];
            }
            if (!in_array($id_libro, $_SESSION['usuario']['librosReservados'])) {
                $_SESSION['usuario']['librosReservados'][] = $id_libro;
            }
    
            header("Location: catalogo.php");
        } else {
            echo 'Error al ejecutar la acción.';
        }
    }else{
        echo '<p>Error, la fecha inicial debe ser antes que la fecha fin.</p>';
    }
}
?>