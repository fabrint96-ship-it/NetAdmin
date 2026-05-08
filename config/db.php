<?php
/**
 * connection.php - SOLUCIÓN "D" DE LA DOCUMENTACIÓN DE NEON
 * Especificar el endpoint dentro del campo de la contraseña.
 */

$host     = 'ep-morning-fire-alf10iel-pooler.c-3.eu-central-1.aws.neon.tech';
$db       = 'neondb';
$user     = 'neondb_owner';
$pass_real = 'npg_0caIhWm7gpPT';
$endpoint = 'ep-morning-fire-alf10iel-pooler';

/**
 * Según el apartado D: "provide a string consisting of the endpoint option 
 * and your password, separated by a dollar sign character ($)"
 * Formato: endpoint=id$password
 */
$password_neon = "endpoint=" . $endpoint . "$" . $pass_real;

try {
    // DSN limpio, sin el parámetro options que daba error antes
    $dsn = "pgsql:host=$host;port=5432;dbname=$db;sslmode=require";

    $pdo = new PDO($dsn, $user, $password_neon, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);

    // echo "✅ ¡CONEXIÓN CONSEGUIDA USANDO EL MÉTODO D!";

} catch (PDOException $e) {
    die("Error crítico de conexión: " . $e->getMessage());
} 