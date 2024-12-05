<?php

    include "Conexion.php";

    class Tickets extends Conexion {
        public function crearTickets($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_tickets (nombre_cliente, celular, direccion, zona, tipo_actividad, fecha, hora, tecnico, auxiliar, descripcion)
            VALUES (?,?,?,?,?,?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("ssssssssss", 
                $datos['nombreCliente'],
                $datos['celular'],
                $datos['direccion'],
                $datos['zona'],
                $datos['tipoActividad'],
                $datos['fecha'],
                $datos['hora'],
                $datos['tecnico'],
                $datos['auxiliar'],
                $datos['descripcion']
            );
            $respuesta = $query->execute();
            $idTickets = mysqli_insert_id($conexion);
            $query->close();
            return $respuesta;
            }
            
    }
/* creo que no se necesita ya que el id se puede obtener desde la URL con el codigo $idTicket = $_GET['id']; // Obtener el ID del ticket desde la URL
    public function obtenerIdTickets($idTickets) {
        $conexion = Conexion::conectar();
        $sql = "SELECT tickets.id_tickets AS idTickets
                FROM t_tickets AS tickets 
                WHERE id_tickets = '$idTickets'";
        $respuesta = mysqli_query($conexion, $sql);
        $idTickets = mysqli_fetch_array($respuesta);
        return $idTickets;
    }
*/

    public function obtenerDatosTickets($idTickets) {
        $conexion = Conexion::conectar();
        $sql = "SELECT id_tickets AS idTickets, nombre_cliente AS nombreCliente, celular, direccion, zona, tipo_actividad AS tipoActividad, fecha, hora, tecnico, auxiliar, descripcion
                FROM t_tickets 
                WHERE id_tickets = $idTickets";
        $respuesta = mysqli_query($conexion, $sql);
        $tickets = mysqli_fetch_array($respuesta);
        $datos = array(
                'idTickets' => $tickets['idTickets'],
                'nombreCliente' => $tickets['nombreCliente'],
                'celular' => $tickets['celular'],
                'direccion' => $tickets['direccion'],
                'zona' => $tickets['zona'],
                'tipoActividad' => $tickets['tipoActividad'],
                'fecha' => $tickets['fecha'],
                'hora' => $tickets['hora'],
                'tecnico' => $tickets['tecnico'],
                'auxiliar' => $tickets['auxiliar'],
                'descripcion' => $tickets['descripcion']
        );
        return $datos;
    }