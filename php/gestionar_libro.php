<?php 
    require_once('../conexion/header.php');
    require('../conexion/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/estilos.css" rel="stylesheet">
    <title>Gestionar Libros</title>
</head>
<body>
    <div class="contenedor">
        <?php 
            $sth = $dbh->prepare('SELECT id, titulo, copias, stock, foto, id_autor FROM Libros');
            $sth->execute();
            $row = $sth->fetchAll();

            if ($row){
                foreach ($row as $libro) {
                    $id = $libro['id'];
                    $titulo = $libro['titulo'];
                    $copias = $libro['copias'];
                    $stock = $libro['stock'];
                    $foto = $libro['foto'];
                    $id_autor = $libro['id_autor'];
                    ?>
                    <div class="card">
                        <img src="<?php echo $foto ?>" alt="Imagen del libro">
                        <p><?php echo $titulo ?></p>
                                <div class="actions">
                        <form action="borrar_libro.php" method="POST">
                            <input type="hidden" name="idLibro" value="<?php echo $id ?>">
                            <button type="submit" class="btn-delete" name="borrar">🗑️</button>
                        </form>
                        <form action="editar_libro.php" method="POST">
                            <input type="hidden" name="idLibro" value="<?php echo $id ?>">
                            <input type="hidden" name="titulo" value="<?php echo $titulo ?>">
                            <input type="hidden" name="copias" value="<?php echo $copias ?>">
                            <input type="hidden" name="stock" value="<?php echo $stock ?>">
                            <input type="hidden" name="ruta" value="<?php echo $foto ?>">
                            <input type="hidden" name="idAutor" value="<?php echo $id_autor ?>">
                            <button type="submit" class="btn-edit" name="editar">Editar</button>
                        </form>
                    </div>
                </div>
                <?php }
            } else {
                echo '<p>El catálogo está vacío o no está disponible en este momento.</p>';
            }
        ?>
    </div>
</body>
</html>