<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoPuedeEditar();

$id = (int) $_POST['id'];
$nombre = trim($_POST['nombre']);
$ip = trim($_POST['ip']);
$tipo = trim($_POST['tipo']);
$sistema_operativo = trim($_POST['sistema_operativo']);
$ubicacion = trim($_POST['ubicacion']);
$estado = trim($_POST['estado']);

try {
    $stmt = $pdo->prepare(
        "UPDATE equipos
         SET nombre = :nombre,
             ip = :ip,
             tipo = :tipo,
             sistema_operativo = :sistema_operativo,
             ubicacion = :ubicacion,
             estado = :estado
         WHERE id = :id"
    );

    $stmt->execute([
        ':nombre' => $nombre,
        ':ip' => $ip,
        ':tipo' => $tipo,
        ':sistema_operativo' => $sistema_operativo,
        ':ubicacion' => $ubicacion,
        ':estado' => $estado,
        ':id' => $id
    ]);

    registrarLog($pdo, usuarioActual(), "Actualizó el equipo: " . $nombre);

    header("Location: equipos.php");
    exit;

} catch (PDOException $e) {
    if ($e->getCode() === "23505") {
        header("Location: edit_equipo.php?id=" . $id . "&error=ip_duplicada");
        exit;
    }

    die("Error al actualizar equipo: " . $e->getMessage());
}