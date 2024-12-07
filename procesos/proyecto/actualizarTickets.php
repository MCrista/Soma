<?php
  
    $datos = array(
        'idTickets' => $_POST['idTickets'],
        "nombreCliente" => $_POST['nombreClienteu'], 
        "celular" => $_POST['celularu'],
        "direccion" => $_POST['direccionu'], 
        "zona" => $_POST['zonau'],
        "tipoActividad" => $_POST['tipoActividadu'], 
        "fecha" => $_POST['fechau'], 
        "hora" => $_POST['horau'], 
        "tecnico" => $_POST['tecnicou'], 
        "auxiliar" => $_POST['auxiliaru'],
        "descripcion" => $_POST['descripcionu'] 
    );
        
    include "../../clases/Tickets.php";
    $Tickets = new Tickets();

    echo $Tickets->actualizarTickets($datos);