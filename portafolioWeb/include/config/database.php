<?php


function conectarDB() : Mysqli{

    $db= new mysqli('localhost', 'root', 'admin1234', 'DBContacto');

    if(!$db){
        echo "Error no se puede conectar";
        exit;
    }

    return $db;


}