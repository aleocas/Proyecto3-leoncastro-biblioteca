<?php 
    require_once('../conexion/header.php');
    require('../conexion/conexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <div class="contenedor">
        <?php 
            $sth = $dbh->prepare('SELECT id, titulo, copias, foto FROM Libros');
            $sth->execute();
            $row = $sth->fetchAll();

            if ($row){
                foreach ($row as $libro) {
                    $id = $libro['id'];
                    $titulo = $libro['titulo'];
                    $copias = $libro['copias'];
                    $foto = $libro['foto'];

                    $botonTexto = "Alquilar";
                    $form_action = "prestamos.php"; 

                    if (isset($_SESSION['usuario']['librosReservados']) && in_array($id, $_SESSION['usuario']['librosReservados'])) {
                        $botonTexto = "Devolver";
                        $form_action = "devoluciones.php";
                    }
                    //El boton de alquilar no puede aparecer cuando eres invitado
                    ?>
                    <div class="card">
                        <form action="<?php echo $form_action; ?>" method="POST">
                            <img src="<?php echo $foto ?>" alt="<?php echo $titulo ?>" />
                            <input type="hidden" name="idLibro" value="<?php echo $id ?>" />
                            <p><?php echo $titulo ?></p>

                            <?php if ($botonTexto == "Alquilar" && $copias > 0) { ?>
                                <p><?php echo $copias ?> disponibles</p>
                                <input type="number" name="cantidad" required>
                                <input type="date" name="fechaInicio" required>
                                <input type="date" name="fechaFin" required>
                                <input type="submit" value="<?php echo $botonTexto; ?>">
                            <?php } elseif ($copias == 0) { ?>
                                <p style="color: red;">No hay copias disponibles en este momento</p>
                            <?php } else { ?>
                                <input type="submit" value="<?php echo $botonTexto; ?>">
                            <?php } ?>
                        </form>
                    </div>
                <?php }
            } else {
                echo '<p>El catálogo está vacío o no está disponible en este momento.</p>';
            }
        ?>  
    </div>
</body>
</html>

                <!--Tengo que hacer las comprobaciones de maximo de 3 copias de un libro y maximo 5 tipos de libros diferentes reservados. Cuando el usuario ya haya reservador el maximo
                de libros es decir 5 cuando le de a alquilar en otro libro saldra un mensaje que dira que ya ha alquilado el maximo de libros posible.-->

                <!--Tambien tengo que mirar lo de la sesion, es decir poder rescatar de la base de datos las reservas hechas por el usuario y que despues de cerrar sesion, al volver a
                iniciar la sesion se rescate de la base de datos los prestamos del id de la sesion actual y sga apareciendo devolver en los libros pertinentes.-->