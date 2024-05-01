<?php
if (isset($_FILES['nuevaFoto'])) {
        $file_name = $_FILES['nuevaFoto']['name'];
        $file_size = $_FILES['nuevaFoto']['size'];
        $file_tmp = $_FILES['nuevaFoto']['tmp_name'];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Validación por tipo de fichero
        if ($file_type != "jpg") {
            echo "Tipo de fichero invalido. Solo se aceptan JPG, JPEG, PNG y  GIF";
            exit;
        }

        // Validación por tamaño de fichero
        if ($file_size > 1000000) {
            echo "Fichero demasiado grande, el hosting no acepta ficheros de mas de 1 Mb";
            exit;
        }

        // Movemos el fichero a una carpeta determinada
        $destination_folder = "fotos/";
        if (!file_exists($destination_folder)) {
            mkdir($destination_folder, 0777, true);
        }
        $destination_file = $destination_folder . $_POST['nombre'].".jpg";
        if (move_uploaded_file($file_tmp, $destination_file)) {
            echo "Fichero cargado satisfactoriamente";
        } else {
            echo "Error en la carga del fichero";
        }
    } else {
        echo "No se ha seleccionado imagen";
    }
?>    