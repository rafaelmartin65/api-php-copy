<?php
   $servidor = "localhost";
   $usuario = "root";
   $password = "12345678";
   $bbdd = "academia";

   try{
        $conecta = new PDO("mysql:host=$servidor;dbname=$bbdd",$usuario,$password);
    }catch(PDOException $e){
        echo 'Error de conexión:'.$e->getMessage();
        exit;
    }
