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
        $query->bind_param('ssssssssssi', $datos['nombreCliente'],
            $datos['celular'],
            $datos['direccion'],
            $datos['zona'],
            $datos['tipoActividad'],
            $datos['fecha'],
            $datos['hora'],
            $datos['tecnico'],
            $datos['auxiliar'],
            $datos['descripcion'],
            $datos['idTickets']
        );
        
        // Ejecuta la consulta
        $respuesta = $query->execute();
        
        if (!$respuesta) {
            // Registra cualquier error si la ejecución falla
            error_log("Error al ejecutar SQL: " . $query->error);
            return "Error al ejecutar la consulta SQL: " . $query->error;
        }
    
        $query->close();
        return $respuesta; // Retorna true si la actualización fue exitosa
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

    public function cambioEstatusTickets($idTickets, $estatusTickets) {
        $conexion = Conexion::conectar();
    
        // Validar cambios de estado permitidos
        $sqlValidar = "SELECT estado_tickets FROM t_tickets WHERE id_tickets = ?";
        $queryValidar = $conexion->prepare($sqlValidar);
        $queryValidar->bind_param('i', $idTickets);
        $queryValidar->execute();
        $queryValidar->bind_result($estadoActual);
        $queryValidar->fetch();
        $queryValidar->close();
    
        // Definir transiciones permitidas
        $transiciones = [
            1 => [2, 4],  // Creado puede ir a En Progreso (2) o Cancelado (4)
            2 => [3, 4, 5], // En Progreso puede ir a Finalizado (3), Cancelado (4) o Bloqueado (5)
            5 => [2, 4], // Bloqueado puede ir a En Progreso (2) o Cancelado (4)
        ];
    
        // Verificar si la transición es válida
        if (!isset($transiciones[$estadoActual]) || !in_array($estatusTickets, $transiciones[$estadoActual])) {
            return 0; // Transición no permitida
        }
    
        // Si el estado es Finalizado (3), se actualizará la resolución a 2
        if ($estatusTickets == 3) {
            $sql = "UPDATE t_tickets SET estado_tickets = ?, resolucion = 2 WHERE id_tickets = ?";
        } else {
            // Si no es Finalizado, solo actualizamos el estado
            $sql = "UPDATE t_tickets SET estado_tickets = ? WHERE id_tickets = ?";
        }
    
        $query = $conexion->prepare($sql);
        $query->bind_param('ii', $estatusTickets, $idTickets);
        $respuesta = $query->execute();
        $query->close();
    
        return $respuesta ? 1 : 0;
    }
    
}  