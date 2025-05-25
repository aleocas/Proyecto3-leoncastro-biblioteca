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
    $sth = $dbh->prepare('UPDATE Libros SET titulo = ?, copias = ?, stock = ?, foto = ?, id_autor = ? WHERE id = ?');
    $sth->execute([$titulo, $copias, $stock, $ruta, $id_autor, $id_libro]);
    if ($sth->rowCount() > 0) {
        echo "<p>Actualizado correctamente</p>";
    } else {
        echo "<p>No se pudo actualizar o no hubo cambios</p>";
    }
    header('Location: gestionar_libro.php');
?>

<!-- Lo que tengo q hacer es quitar todos los botones en Gestión de Libros, y solo poner un boton que sea Gestionar Libros, una vez entremos dentro de gestion_libros.php
se nos cargara la pagina donde habra un boton de agregar librros que nos a agregar_libro.php como tengo ahora y luego se nos cargara u catalogo. El catalogo seran todos los libros 
como lo tengo ahora en borrar_libro, el catalogo contendra la foto, y el titulo del libro, un hidden del id y los botones Borrar y Editar. Cuando pulsemos uno de estos botones 
se nos ira a otra pagina comun donde recogeremos el boton que ha pulsado. Si el boton pulsado es Borrar, pues borraremos el libro ahi mismo. Si el boton pulsado es editar, pasaremos por
hidden todo el resto de valores del libro y con un if controlamos el formulario de edicion metiendo como Value predeterminado los campos del hidden para que el usuario solo
tenga que modificar los comapos que quiere y los otros se queden por defecto. Con esto tenemos borrar y editar en la misma pagina reutilizando codigo. -->