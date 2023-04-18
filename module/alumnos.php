<?php
    require_once "./connection/connection.php";

    class Alumnos{

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
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getAll

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
                }//end while
                return $datos;
            }//end if
            return $datos;
        }//end getWhere

        public static function insert($nombre, $apellido, $lugar, $precio) {
            $db = new Connection();
            $query = "INSERT INTO datos (nombre, apellido, lugar, precio)
            VALUES('$nombre', '$apellido', '$lugar', '$precio')";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end insert

        public static function update($id, $nombre, $apellido, $lugar, $precio) {
            $db = new Connection();
            $query = "UPDATE datos SET
            nombre='".$nombre."', nombre='".$nombre."', apellido='".$apellido."', lugar='".$lugar."', precio='".$precio."' 
            WHERE id=$id";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end update

        public static function delete($id) {
            $db = new Connection();
            $query = "DELETE FROM datos WHERE id=$id";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }//end if
            return FALSE;
        }//end delete

    }//end class Cliente