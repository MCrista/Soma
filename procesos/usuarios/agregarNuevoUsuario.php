<?php
$datos = array(
    "paterno" => $_POST['paterno'],
    "materno" => $_POST['materno'],
    "nombre" => $_POST['nombre'],
    "fechanacimiento" => $_POST['fechanacimiento'],
    "sexo" => $_POST['sexo'],
    "telefono" => $_POST['telefono'],
    "correo" => $_POST['correo'],
    "usuario" => $_POST['usuario'],
    "password" => password_hash($_POST['password'], PASSWORD_BCRYPT), // Usar bcrypt para almacenar la contraseña
    "idRol" => $_POST['idRol'],
    "ubicacion" => $_POST['ubicacion']
);

include "../../clases/Usuarios.php";
$Usuarios = new Usuarios();

echo $Usuarios->agregarNuevoUsuario($datos);
?>
