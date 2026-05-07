<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$nombre = trim($_POST['nombre']);
$ip = trim($_POST['ip']);
$tipo = trim($_POST['tipo']);
$sistema_operativo = trim($_POST['sistema_operativo']);
$ubicacion = trim($_POST['ubicacion']);
$estado = trim($_POST['estado']);

$stmt = $conn->prepare(
    "INSERT INTO equipos (nombre, ip, tipo, sistema_operativo, ubicacion, estado)
     VALUES (?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param("ssssss", $nombre, $ip, $tipo, $sistema_operativo, $ubicacion, $estado);
$stmt->execute();

registrarLog($conn, usuarioActual(), "Añadió el equipo: " . $nombre);

header("Location: equipos.php");
exit;