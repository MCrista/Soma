<?php
  
    $datos = array(
        "comentario" => $_POST['comentario'],
        "idTickets" => $_POST['idTickets']
    );
        
    include "../../clases/Tickets.php";
    $Tickets = new Tickets();

    echo $Tickets->agregarComentarioTickets($datos);