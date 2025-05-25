<?php 
    require_once('../conexion/header.php');
    require('../conexion/conexion.php');
    
    if (isset($_POST['correoe']) && isset($_POST['contrasena'])) {
        $correoe = trim($_POST['correoe']);
        $contrasena = trim($_POST['contrasena']);
    }

    $sth = $dbh->prepare('SELECT * FROM Usuarios WHERE correoe = ?');
    $sth->execute([$correoe]);
    $row = $sth->fetch();
    if ($row) {
        $id = $row[0];
        $nombre = $row[1];
        $correoe = $row[2];
        $rol = $row[4];
        $verificacion = password_verify($contrasena,$row[3]);
        if($verificacion){
            $_SESSION['usuario'] = [
                'id' => $id,
                'correoe' => $correoe,
                'rol' => $rol
            ];
        }else{
            $mensaje = 'La contraseña no coincide.';
        }
    } else {
        $mensaje = 'Correo inválido.';
    }
    header('Location: ../index.php');
?>