<?php
  
    $datos = array(
        "comentario" => $_POST['comentario'],
        "idTickets" => $_POST['idTickets'],
        "idUsuario" => $_POST['idUsuario']
    );
        
    include "../../clases/Tickets.php";
    $Tickets = new Tickets();

    echo $Tickets->agregarComentarioTickets($datos);