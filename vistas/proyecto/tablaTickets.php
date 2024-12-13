
<?php 

session_start();
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT tickets.id_tickets AS idTickets,
            CONCAT('TKT-', tickets.id_tickets) AS prefijoTickets,
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
            tickets.estado_tickets AS estadoTickets,
             tickets.fecha_creacion AS fechaCreacion
            FROM t_tickets AS tickets
            ORDER BY tickets.id_tickets DESC";
    $respuesta = mysqli_query($conexion, $sql);            
?>

<table class="table table-sm dt-responsive nowrap" 
        id="tablaTicketsDataTable" style="width:100%">
    <thead>
        <th>Id Tickets</th> <!-- se muestra en <td><?php echo $mostrar['prefijoTickets']; ?></td> -->
        <th>Nombre Cliente</th>    
        <th>Celular</th> 
        <th>Direccion</th>
        <th>Zona</th>
        <th>Tipo Actividad</th>
        <th>Fecha</th>  
        <th>Hora</th>
        <th>Tecnico</th>
        <th>Auxiliar</th>
        <th>Estado</th>
        <th>Editar</th>
    </thead>
    <tbody>
        <?php 
            while($mostrar = mysqli_fetch_array($respuesta)) {
        ?>
        <tr> 
            <td>
                <a href="Tickets.php?id=<?php echo $mostrar['idTickets']; ?>"><!-- destino del enlace -->
                    <?php echo $mostrar['prefijoTickets']; ?> <!-- se muestra en <th>Id Tickets</th> -->
                </a>
            </td>
            <td><?php echo $mostrar['nombreCliente']; ?></td>    
            <td><?php echo $mostrar['celular']; ?></td>
            <td><?php echo $mostrar['direccion']; ?></td>
            <td><?php echo $mostrar['zona']; ?></td>
            <td><?php echo $mostrar['tipoActividad']; ?></td>
            <td><?php echo $mostrar['fecha']; ?></td>
            <td><?php echo $mostrar['hora']; ?></td>
            <td><?php echo $mostrar['tecnico']; ?></td>
            <td><?php echo $mostrar['auxiliar']; ?></td>
            <td style="text-align: center;">
                <?php 
                    if ($mostrar['estadoTickets'] == 1) { 
                        echo '<span style="color: gray;">Create</span>';
                    } else if ($mostrar['estadoTickets'] == 2) {                        
                        echo '<span style="color: blue;">Progress</span>';
                    } else if ($mostrar['estadoTickets'] == 3) {                        
                        echo '<span style="color: green;">Done</span>';
                    } else if ($mostrar['estadoTickets'] == 4) {                        
                        echo '<span style="color: red;">Cancel</span>';
                    } else if ($mostrar['estadoTickets'] == 5) {                        
                        echo '<span style="color: orange;">Blocked</span>';
                    }
                ?>
            </td>
            <td>
                <button class="btn btn-info" 
                        data-toggle="modal"     
                        data-target="#modalActualizarTickets"
                        onclick="obtenerDatosTickets(<?php echo $mostrar['idTickets'] ?>)">
                     <span class="fas fa-pen"></span> Editar            
                </button>
            </td>
        </tr> 
        <?php } ?>           
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaTicketsDataTable').DataTable({
            language: {
                url: "../public/datatable/es_es.json"
            },
            order: [[0, 'desc']] // Asegúrate de que el índice de columna corresponda al ID.
        });
    });
</script>
