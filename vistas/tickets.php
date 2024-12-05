
<?php

// Incluir el header
include "header.php";

// Conectar con la base de datos
include "../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();

$idTickets = $_GET['id']; // Obtener el ID del ticket desde la URL

// Consulta para obtener los detalles del ticket
$sql = "SELECT * FROM t_tickets WHERE id_tickets = '$idTickets'";
$respuesta = mysqli_query($conexion, $sql);
$idTickets = mysqli_fetch_array($respuesta);

?>


<?php
include "proyecto/detallesTickets.php"; 
include "proyecto/modalActualizarTickets.php"; 
include "footer.php";
?>
