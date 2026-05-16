<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoEsAdmin();

$databaseUrl = getenv("DATABASE_URL");

if (!$databaseUrl) {
    die("Error: DATABASE_URL no está configurada en Render.");
}

$backupDir = __DIR__ . "/backups";

if (!is_dir($backupDir)) {
    mkdir($backupDir, 0775, true);
}

$fecha = date("Y-m-d_H-i-s");
$archivo = "backup_" . $fecha . ".sql";
$ruta = $backupDir . "/" . $archivo;

$comando = "pg_dump " . escapeshellarg($databaseUrl) . " -f " . escapeshellarg($ruta) . " 2>&1";

$output = [];
$resultado = 0;

exec($comando, $output, $resultado);

if ($resultado === 0 && file_exists($ruta)) {
    $stmt = $pdo->prepare("
        INSERT INTO backups (nombre_archivo, usuario)
        VALUES (:nombre_archivo, :usuario)
    ");

    $stmt->execute([
        ':nombre_archivo' => $archivo,
        ':usuario' => usuarioActual()
    ]);

    registrarLog($pdo, usuarioActual(), "Creó backup PostgreSQL: " . $archivo, "backups", null);

    header("Location: backups.php");
    exit;
}

echo "<h2>Error al crear el backup PostgreSQL</h2>";
echo "<pre>";
echo "Código resultado: " . $resultado . "\n\n";
echo implode("\n", $output);
echo "</pre>";