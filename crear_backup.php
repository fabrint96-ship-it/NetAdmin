<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

$host = getenv('DB_HOST');
$db = getenv('DB_NAME');
$user = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

$fecha = date('Y-m-d_H-i-s');

$archivo = "backup_" . $fecha . ".sql";

$ruta = __DIR__ . "/backups/" . $archivo;

/*
|--------------------------------------------------------------------------
| pg_dump
|--------------------------------------------------------------------------
*/

$comando = "
PGPASSWORD=\"$password\"
pg_dump
-h $host
-U $user
-d $db
-f \"$ruta\"
";

exec($comando, $output, $resultado);

/*
|--------------------------------------------------------------------------
| Guardar registro
|--------------------------------------------------------------------------
*/

if ($resultado === 0) {

    $stmt = $pdo->prepare("
        INSERT INTO backups
        (nombre_archivo, usuario)
        VALUES (?, ?)
    ");

    $stmt->execute([
        $archivo,
        $_SESSION['user']
    ]);

    registrarLog(
        $pdo,
        $_SESSION['user'],
        "Creó backup PostgreSQL: $archivo"
    );

    header("Location: backups.php");
    exit;

} else {

    die("Error al crear el backup PostgreSQL");

}