<?php 

$idTickets = $_POST['idTickets'];
include "../../clases/Tickets.php";
$Tickets = new Tickets();
echo json_encode($Tickets->obtenerDatosTickets($idTickets));


