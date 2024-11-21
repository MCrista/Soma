<?php 

    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    $datos = array(
        "password" => password_hash($_POST['passwordReset'], PASSWORD_BCRYPT), // Usar bcrypt para el hash
        "idUsuario" => $_POST['idUsuarioReset']
    );
    echo $Usuarios->resetPassword($datos);

?>