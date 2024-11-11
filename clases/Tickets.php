<?php

    include "Conexion.php";

    class Tickets extends Conexion {
        public function crearTickets($datos){
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_tickets (	nombre_cliente,
                                            celular,
                                            direccion,
                                            zona,
                                            tipo_actividad,
                                            fecha,
                                            hora,
                                            tecnico,
                                            auxiliar,
                                            descripcion)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?,?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("ssssssssss", $datos['nombreCliente'],
                                            $datos['celular'],
                                            $datos['direccion'],
                                            $datos['zona'],
                                            $datos['tipoActividad'],
                                            $datos['fecha'],
                                            $datos['hora'],
                                            $datos['tecnico'],
                                            $datos['auxiliar'],
                                            $datos['descripcion']);
            $respuesta = $query->execute();
            return $respuesta;
            }
            
    }