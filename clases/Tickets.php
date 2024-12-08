<?php

include "Conexion.php";

class Tickets extends Conexion {
    public function crearTickets($datos){
        $conexion = Conexion::conectar();
        $sql = "INSERT INTO t_tickets (nombre_cliente, celular, direccion, zona, tipo_actividad, fecha, hora, tecnico, auxiliar, descripcion,id_usuario)
        VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param("ssssssssssi", 
            $datos['nombreCliente'],
            $datos['celular'],
            $datos['direccion'],
            $datos['zona'],
            $datos['tipoActividad'],
            $datos['fecha'],
            $datos['hora'],
            $datos['tecnico'],
            $datos['auxiliar'],
            $datos['descripcion'],
            $datos['idUsuario']
        );
        $respuesta = $query->execute();
        $idTickets = mysqli_insert_id($conexion);
        $query->close();
        return $respuesta;
        return $idTickets;
    }           


    public function obtenerDatosTickets($idTickets) {
        $conexion = Conexion::conectar();
        $sql = "SELECT id_tickets AS idTickets, 
                nombre_cliente AS nombreCliente, 
                celular, 
                direccion, 
                zona, 
                tipo_actividad AS tipoActividad, 
                fecha, 
                hora, 
                tecnico, 
                auxiliar, 
                descripcion
                FROM t_tickets AS tickets
                WHERE id_tickets = $idTickets";
        $respuesta = mysqli_query($conexion, $sql);
        $ticket = mysqli_fetch_array($respuesta);
        $datos = array(
            'idTickets' => $ticket['idTickets'],
            'nombreCliente' => $ticket['nombreCliente'],
            'celular' => $ticket['celular'],
            'direccion' => $ticket['direccion'],
            'zona' => $ticket['zona'],
            'tipoActividad' => $ticket['tipoActividad'],
            'fecha' => $ticket['fecha'],
            'hora' => $ticket['hora'],
            'tecnico' => $ticket['tecnico'],
            'auxiliar' => $ticket['auxiliar'],
            'descripcion' => $ticket['descripcion']
        );
        return $datos;
    }

    public function actualizarTickets($datos) {
        $conexion = Conexion::conectar();
        $sql = "UPDATE t_tickets SET  
                nombre_cliente =?,
                celular =?, 
                direccion =?, 
                zona =?, 
                tipo_actividad =?,
                fecha =?, 
                hora =?, 
                tecnico =?, 
                auxiliar =?, 
                descripcion =?
                WHERE id_tickets = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('ssssssssssi', $datos['nombre_cliente'],
                                        $datos['celular'],
                                        $datos['direccion'],
                                        $datos['zona'],
                                        $datos['tipo_actividad'],
                                        $datos['fecha'],
                                        $datos['hora'],
                                        $datos['tecnico'],
                                        $datos['auxiliar'],
                                        $datos['descripcion'],
                                        $datos['idTickets']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function agregarComentarioTickets($datos) {
        // Validar que el idTickets sea mayor a 0
        if ($datos['idTickets'] <= 0) {
            return false; // Retorna false si la validación falla
        }
    
        // Si pasa la validación, procede con la inserción
        $conexion = Conexion::conectar();
        $sql = "INSERT INTO t_comentarios (id_usuario,id_tickets, comentario)
                VALUES (?, ?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            "iis",
            $datos['idUsuario'],
            $datos['idTickets'],
            $datos['comentario']
        );
        $respuesta = $query->execute();
        $query->close();
    
        return $respuesta;
    }

}  