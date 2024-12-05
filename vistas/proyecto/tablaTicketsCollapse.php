
<?php 

session_start();
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT tickets.id_tickets AS idTickets,
            CONCAT('TKT-', LPAD(tickets.id_tickets, 5, '0')) AS prefijoTickets,
            tickets.nombre_cliente AS nombreCliente,
            tickets.celular AS celular,
            tickets.direccion AS direccion,
            tickets.zona AS zona,
            tickets.tipo_actividad AS tipoActividad,
            tickets.fecha AS fecha,
            tickets.hora AS hora,
            tickets.tecnico AS tecnico,
            tickets.auxiliar AS auxiliar,
            tickets.descripcion AS descripcion,
            tickets.estado_tickets AS estadoTickets
            FROM t_tickets AS tickets";
    $respuesta = mysqli_query($conexion, $sql);            
?>

<table class="table table-sm dt-responsive nowrap" 
        id="tablaTicketsCollapseDataTable" style="width:100%">
    <thead>
        <th>Id Tickets</th> <!-- se muestra en <td><?php echo $mostrar['prefijoTickets']; ?></td> -->
    </thead>
    <tbody>
        <?php 
            while($mostrar = mysqli_fetch_array($respuesta)) {
        ?>
        <tr> 
            <td>
                <a href="modalCrearTickets.php?id=<?php echo $mostrar['idTickets']; ?>"><!-- destino del enlace -->
                    <?php echo $mostrar['prefijoTickets']; ?> <!-- se muestra en <th>Id Tickets</th> -->
                </a>
            </td>
        </tr> 
        <?php } ?>           
    </tbody>
</table>

<script>
    $(document).ready(function(){
        $('#tablaTicketsCollapseDataTable').DataTable({
            language : {
                url : "../public/datatable/es_escopy.json"
            }
        });
    });
</script>

