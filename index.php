<?php

require_once "./module/alumnos.php";

// Buscando las solicitudes mediante un switch
switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if (isset($_GET['id'])) {
            $alumnos = Alumnos::getWhere($_GET['id']);
            if (!empty($alumnos)) {
                echo json_encode($alumnos);
            } else {
                echo json_encode(array("Advertencia" => "No se Encuentra el Alumno"));
                http_response_code(404);
            }
        } else {
            echo json_encode(Alumnos::getAll());
        }
        
        break;

        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(Alumnos::insert($datos->nombre, $datos->apellido, $datos->lugar, $datos->precio)) {
                    http_response_code(200);
                    echo json_encode(array("Exito" => "Alumno registrado con exito"));

                }//end if
                else {
                    http_response_code(400);
                    echo json_encode(array("Advertencia" => "Error al Registrar al alumno"));

                }//end else
            }//end if
            else {
                http_response_code(405);
            }//end else
            break;

            case 'PUT':
                $datos = json_decode(file_get_contents('php://input'));
                if($datos != NULL) {
                    if(Alumnos::update($datos->id, $datos->nombre, $datos->apellido, $datos->lugar, $datos->precio)) {
                        http_response_code(200);
                        echo json_encode(array("Exito" => "Datos del Alumno Actualizado"));

                    }//end if
                    else {
                        http_response_code(400);
                        echo json_encode(array("Advertencia" => "Ocurrio un problema al Actualizar los Datos"));
                    }//end else
                }//end if
                else {
                    http_response_code(405);
                }//end else
                break;
                
                case 'DELETE':
                    if(isset($_GET['id'])){
                        if(Alumnos::delete($_GET['id'])) {
                            http_response_code(200);
                            echo json_encode(array("Exito" => "El Alumno con id : ".$_GET['id']."a sido Eliminado"));

                        }//end if
                        else {
                            http_response_code(400);
                            echo json_encode(array("Advertencia" => "No se encuentra el Alumno a eliminar"));

                        }//end else
                    }//end if 
                    else {
                        http_response_code(405);
                    }//end else
                    break;
                
                default:
                    http_response_code(405);
                    break;


}
