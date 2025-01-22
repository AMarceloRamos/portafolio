<?php
function conectarDB() {
    $host = "dpg-ctq6ofqj1k6c739pn1ng-a";
    $port = "5432";
    $dbname = "dbcontacto";
    $user = "dbcontacto_user";
    $password = "NmmS5wypyPKhdSZPkQCnPk4hb6toH1SJ";

    $connection_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
    $db = pg_connect($connection_string);

    if (!$db) {
        die("Error al conectar a la base de datos: " . pg_last_error());
    }

    return $db;
}
