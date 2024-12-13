<?php 

include "../../../clases/Tickets.php";

$idTickets = $_POST['idTickets']; // Recibe el ID del ticket
$estatusTickets = $_POST['estatusTickets']; // Recibe el nuevo estado

$Tickets = new Tickets(); // Instancia la clase Tickets

// Llama a la función cambioEstatusTickets con los parámetros correctos
echo $Tickets->cambioEstatusTickets($idTickets, $estatusTickets);
?>

