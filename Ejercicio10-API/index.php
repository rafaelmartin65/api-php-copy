<?php
include "db_connection.php";

// $data = json_decode(file_get_contents('php://input'), true);
//var_dump($_SERVER['REQUEST_METHOD']);

//switch ($_SERVER['REQUEST_METHOD']) {
        // Entramos por peticion de registros con GET
//    case "GET":
//        if (isset($_GET["id"])) {
//            $clausula = "SELECT * from alumnos where id = " . $_GET["id"];
//            $stm = $conecta->prepare($clausula);
//            $stm->execute();
//            echo json_encode($stm->fetch(PDO::FETCH_OBJ));
//        } else {
//            $clausula = "SELECT * from alumnos";
//            $stm = $conecta->prepare($clausula);
//            $stm->execute();
//            echo json_encode($stm->fetchAll(PDO::FETCH_OBJ));
//        }
//        break;

        // Entramos por añadir nuevo registro
//    case "POST":
        // Ejmplo de clausula insert
        // insert into alumnos (id,nombre,apellidos,email,telefono,web,imagen) values (50,"Laura","Perez","","922205030","","")
//        if ((isset($_POST["id"])) 
//           && (isset($_POST["nombre"])) 
//           && (isset($_POST["apellidos"])) 
//           && (isset($_POST["email"])) 
//           && (isset($_POST["telefono"])) 
//           && (isset($_POST["web"])) 
//           && (isset($_POST["imagen"]))) {
//            $clausula = "insert into alumnos (id,nombre,apellidos,email,telefono,web,imagen) values (:id,:nombre,:apellidos,:email,:telefono,:web,:imagen)";
//            $stm = $conecta->prepare($clausula);
//            $stm->bindParam(':id' , $_POST["id"]); 
//            $stm->bindParam(':nombre' , $_POST["nombre"]); 
//            $stm->bindParam(':apellidos' , $_POST["apellidos"]); 
//            $stm->bindParam(':email' , $_POST["email"]); 
//            $stm->bindParam(':telefono' , $_POST["telefono"]); 
//            $stm->bindParam(':web' , $_POST["web"]); 
//            $stm->bindParam(':imagen' , $_POST["imagen"]); 
//            echo $stm->execute();
            
//        };
//        break;
//}

//<?php

// Función para manejar la solicitud y generar la respuesta JSON
function handleRequest() {
    global $conecta;

    // Verificar el método de la solicitud
    switch ($_SERVER['REQUEST_METHOD']) {
        case "GET":
            if (isset($_GET["id"])) {
                // Obtener un alumno por su ID
                $id = $_GET["id"];
                $query = "SELECT * FROM alumnos WHERE id = :id";
                $statement = $conecta->prepare($query);
                $statement->bindParam(":id", $id);
                $statement->execute();
                $alumno = $statement->fetch(PDO::FETCH_OBJ);
                echo json_encode($alumno);
            } else {
                // Obtener todos los alumnos
                $query = "SELECT * FROM alumnos";
                $statement = $conecta->prepare($query);
                $statement->execute();
                $alumnos = $statement->fetchAll(PDO::FETCH_OBJ);
                echo json_encode($alumnos);
            }
            break;
        default:
            // Método de solicitud no válido
            http_response_code(405); // Método no permitido
            echo json_encode(array("message" => "Método no permitido"));
            break;
    }
}

// Manejar la solicitud
handleRequest();
