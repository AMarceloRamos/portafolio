<?php


function conectarDB(): mysqli {
    $host = getenv('DB_HOST') ?: 'dpg-ctq6ofqj1k6c739pn1ng-a';
    $user = getenv('DB_USER') ?: 'dbcontacto_user';
    $password = getenv('DB_PASSWORD') ?: 'NmmS5wypyPKhdSZPkQCnPk4hb6toH1SJ';
    $database = getenv('DB_NAME') ?: 'dbcontacto?user=dbcontacto_user&password';

    $retries = 5; // Número de reintentos
    $db = null;

    while ($retries > 0) {
        try {
            $db = new mysqli($host, $user, $password, $database);

            if ($db->connect_error) {
                throw new Exception($db->connect_error);
            }

            break; // Sal del bucle si la conexión es exitosa
        } catch (Exception $e) {
            $retries--;
            sleep(3); // Espera 3 segundos antes de reintentar
        }
    }

    if (!$db || $db->connect_error) {
        die('Error no se puede conectar: ' . $db->connect_error);
    }

    return $db;
}


