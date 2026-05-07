<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$id = (int) $_POST['id'];
$nombre = trim($_POST['nombre']);
$ip = trim($_POST['ip']);
$tipo = trim($_POST['tipo']);
$sistema_operativo = trim($_POST['sistema_operativo']);
$ubicacion = trim($_POST['ubicacion']);
$estado = trim($_POST['estado']);

$stmt = $conn->prepare(
    "UPDATE equipos
     SET nombre = ?, ip = ?, tipo = ?, sistema_operativo = ?, ubicacion = ?, estado = ?
     WHERE id = ?"
);

$stmt->bind_param("ssssssi", $nombre, $ip, $tipo, $sistema_operativo, $ubicacion, $estado, $id);
$stmt->execute();

registrarLog($conn, usuarioActual(), "Actualizó el equipo: " . $nombre);

header("Location: equipos.php");
exit;