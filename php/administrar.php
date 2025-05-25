<?php
    $url = $_SERVER['DOCUMENT_ROOT'] . '/Proyecto3_copia/Proyecto3/';
    require_once($url . 'conexion/header.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administar</title>
</head>
<body>
    <div>
        <div>
            <p>Gestión de libros</p>
            <a href="agregar_libro.php"><button>Agregar Libros</button></a>
            <a href="gestionar_libro.php"><button>Gestionar Libros</button></a>
        </div>
        <div>
            <p>Gestión de prestamos</p>
            <a href="ver_prestamos.php"><button>Ver Prestamos</button></a>
        </div>
        <div>
            <p>Informes</p>
            <a href="generar_informe.php"><button>Generar Informe</button></a>
        </div>
    </div>
</body>
</html>