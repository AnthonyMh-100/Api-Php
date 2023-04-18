<?php
    require_once "./connection/connection.php";

    class Alumnos{

        // funcion para obtener todos los datos de los alumnos
        public static function getAll() {
            $db = new Connection();
            $query = "SELECT *FROM datos";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'lugar' => $row['lugar'],
                        'precio' => $row['precio']
                    ];
                }
                return $datos;
            }
            return $datos;
        }
        // funcion para obtener solo un dato de un alumno

        public static function getWhere($id) {
            $db = new Connection();
            $query = "SELECT *FROM datos WHERE id='$id'";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'lugar' => $row['lugar'],
                        'precio' => $row['precio']
                    ];
                }
                return $datos;
            }
            return $datos;
        }
        // funcion para insertar un nuevo alumno

        public static function insert($nombre, $apellido, $lugar, $precio) {
            $db = new Connection();
            $query = "INSERT INTO datos (nombre, apellido, lugar, precio)
            VALUES('$nombre', '$apellido', '$lugar', '$precio')";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }
         // funcion para actualizar al alumno
        public static function update($id, $nombre, $apellido, $lugar, $precio) {
            $db = new Connection();
            $query = "UPDATE datos SET
            nombre='".$nombre."', nombre='".$nombre."', apellido='".$apellido."', lugar='".$lugar."', precio='".$precio."' 
            WHERE id=$id";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }
            // funcion para eliminar un alumno
        public static function delete($id) {
            $db = new Connection();
            $query = "DELETE FROM datos WHERE id=$id";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

    }