<?php
  
    $datos = array(
        "nombreCliente" => $_POST['nombreCliente'], 
        "celular" => $_POST['celular'],
        "direccion" => $_POST['direccion'], 
        "zona" => $_POST['zona'],
        "tipoActividad" => $_POST['tipoActividad'], 
        "fecha" => $_POST['fecha'], 
        "hora" => $_POST['hora'], 
        "tecnico" => $_POST['tecnico'], 
        "auxiliar" => $_POST['auxiliar'],
        "ubicacion" => $_POST['ubicacion'] 
    );
        
    include "../../clases/Tickets.php";
    $Tickets = new Tickets();

    echo $Tickets->crearTickets($datos);