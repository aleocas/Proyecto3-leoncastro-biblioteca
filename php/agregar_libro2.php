<?php 
    require_once('../conexion/header.php');
    require('../conexion/conexion.php');
    if (isset($_POST['titulo']) && isset($_POST['stock']) && isset($_POST['ruta']) && isset($_POST['stock']) && isset($_POST['id_autor'])) {
        $titulo = trim($_POST['titulo']);
        $cantidad = trim($_POST['stock']);
        $stock = trim($_POST['stock']);
        $ruta = trim($_POST['ruta']);
        $id_autor = trim($_POST['id_autor']);
    }

    $sth = $dbh->prepare('INSERT INTO Libros (titulo, copias, stock, foto, id_autor)  VALUES (?,?,?,?,?)');
    $sth->execute([$titulo, $cantidad, $stock, $ruta, $id_autor]);
    if ($sth){
        ?><p>Insertado correctamente</p><?php
    }else{
        ?><p>No se pudo insertar</p><?php
    }
?>