<?php
  
    $datos = array(
        "comentario" => $_POST['comentario']
    );
        
    include "../../clases/Tickets.php";
    $Tickets = new Tickets();

    echo $Tickets->agregarComentarioTickets($datos);