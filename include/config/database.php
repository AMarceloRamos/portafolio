<?php
function conectarDB(): mysqli {
    $host = getenv('DB_HOST') ?: 'dpg-ctq6ofqj1k6c739pn1ng-a';
    $user = getenv('DB_USER') ?: 'dbcontacto_user';
    $password = getenv('DB_PASSWORD') ?: 'NmmS5wypyPKhdSZPkQCnPk4hb6toH1SJ';
    $database = getenv('DB_NAME') ?: 'dbcontacto';

    $retries = 5; // Número de reintentos
    $db = null;

    while ($retries > 0) {
        try {
            $db = new mysqli($host, $user, $password, $database);

            // Comprueba si hay errores en la conexión
            if ($db->connect_error) {
                throw new Exception('Error de conexión: ' . $db->connect_error);
            }

            break; // Sal del bucle si la conexión es exitosa
        } catch (Exception $e) {
            $retries--;
            error_log('Intento fallido de conexión: ' . $e->getMessage()); // Registro del error en el log
            sleep(3); // Espera 3 segundos antes de reintentar
        }
    }

    // Comprueba al final si la conexión falló después de los reintentos
    if (!$db || $db->connect_error) {
        die('Error no se puede conectar después de varios intentos: ' . ($db ? $db->connect_error : 'No se pudo inicializar mysqli'));
    }

    return $db;
}
