<?php
    session_start();
    $idUsuario = $_SESSION['usuario']['id'];

    $datos = array(
        'idUsuario' => $idUsuario,
        'paterno' => $_POST['paternou'], 
        'materno' => $_POST['maternou'], 
        'nombre' => $_POST['nombreu'], 
        'fechaNacimiento' => $_POST['fechanacimientou'],
        'sexo' => $_POST['sexou'], 
        'telefono' => $_POST['telefonou'], 
        'correo' => $_POST['correou'], 
        'usuario' => $_POST['usuariou'], 
        'idRol' => $_POST['idRolu'], 
        'ubicacion' => $_POST['ubicacionu']    
    );
        
    include "../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    echo $Usuarios->actualizarUsuario($datos);