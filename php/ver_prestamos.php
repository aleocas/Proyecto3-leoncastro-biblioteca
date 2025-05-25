<?php
    require_once('../conexion/header.php');
    require('../conexion/conexion.php');

    $sth = $dbh->prepare('SELECT id AS "Prestamo", id_libro AS "ID Libro", id_usuario AS "ID Usuario", cantidad AS "Copias Reservadas", fecha_inicio, fecha_fin, estado FROM Prestamos');
    $sth->execute();
    $prestamos = $sth->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Préstamos</title>
</head>
<body>
    <h2>Lista de Préstamos</h2>
    <table>
            <tr>
                <th>Préstamo</th>
                <th>ID Libro</th>
                <th>Nombre Usuario</th>
                <th>Copias Reservadas</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($prestamos as $prestamo): 
                $id_usuario = $prestamo['ID Usuario']; 
                $sth=$dbh->prepare('SELECT correoe FROM Usuarios WHERE id = ?');
                $sth->execute([$id_usuario]);
                $correo = $sth->fetchColumn();
                ?>
                <tr>
                    <td><?php echo $prestamo['Prestamo']; ?></td>
                    <td><?php echo $prestamo['ID Libro']; ?></td>
                    <td><?php echo $correo; ?></td>
                    <td><?php echo $prestamo['Copias Reservadas']; ?></td>
                    <td><?php echo $prestamo['fecha_inicio']; ?></td>
                    <td><?php echo $prestamo['fecha_fin']; ?></td>
                    <td><?php echo $prestamo['estado']; ?></td>
                    <td>
                        <?php if($prestamo['estado'] == 'prestado'){?>
                            <form action="manejar_devoluciones.php" method="POST">
                                <input type="hidden" name="idPrestamo" value="<?php echo $prestamo['Prestamo']; ?>">
                                <input type="hidden" name="idLibro" value="<?php echo $prestamo['ID Libro']; ?>">
                                <input type="hidden" name="copias" value="<?php echo $prestamo['Copias Reservadas']; ?>">
                                <input type="submit" value="Devuelto">
                            </form>

                        <form action="modificar_prestamo.php" method="POST">
                            <input type="hidden" name="idPrestamo" value="<?php echo $prestamo['Prestamo']; ?>">
                            <input type="hidden" name="correo" value="<?php echo $correo; ?>">
                            <input type="hidden" name="idLibro" value="<?php echo $prestamo['ID Libro']; ?>">
                            <input type="hidden" name="fechaIni" value="<?php echo $prestamo['fecha_inicio']; ?>">
                            <input type="hidden" name="fechaFin" value="<?php echo $prestamo['fecha_fin']; ?>">
                            <input type="submit" value="Modificar">
                        </form>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>