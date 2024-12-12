<?php
  
    $datos = array(
        "comentario" => $_POST['comentario'],
        "idTickets" => $_POST['idTicketsu'],
        "idUsuario" => $_POST['idUsuariou']
    );
        
    include "../../clases/Tickets.php";
    $Tickets = new Tickets();

    echo $Tickets->agregarComentarioTickets($datos);