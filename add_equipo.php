<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoPuedeEditar();

$nombre = trim($_POST['nombre']);
$ip = trim($_POST['ip']);
$tipo = trim($_POST['tipo']);
$sistema_operativo = trim($_POST['sistema_operativo']);
$ubicacion = trim($_POST['ubicacion']);
$estado = trim($_POST['estado']);

try {
    $stmt = $pdo->prepare(
        "INSERT INTO equipos (nombre, ip, tipo, sistema_operativo, ubicacion, estado)
         VALUES (:nombre, :ip, :tipo, :sistema_operativo, :ubicacion, :estado)"
    );

    $stmt->execute([
        ':nombre' => $nombre,
        ':ip' => $ip,
        ':tipo' => $tipo,
        ':sistema_operativo' => $sistema_operativo,
        ':ubicacion' => $ubicacion,
        ':estado' => $estado
    ]);

    $nuevoId = $pdo->lastInsertId();

    registrarLog($pdo, usuarioActual(), "Añadió el equipo: " . $nombre, "equipos", $nuevoId);

    header("Location: equipos.php");
    exit;

} catch (PDOException $e) {
    if ($e->getCode() === "23505") {
        header("Location: equipos.php?error=ip_duplicada");
        exit;
    }

    die("Error al añadir equipo: " . $e->getMessage());
}