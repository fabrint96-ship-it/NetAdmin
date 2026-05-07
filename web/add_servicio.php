<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$nombre = trim($_POST['nombre']);
$puerto = (int) $_POST['puerto'];
$protocolo = trim($_POST['protocolo']);
$equipo_id = !empty($_POST['equipo_id']) ? (int) $_POST['equipo_id'] : null;
$estado = trim($_POST['estado']);

$stmt = $conn->prepare(
    "INSERT INTO servicios (nombre, puerto, protocolo, equipo_id, estado)
     VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param("sisis", $nombre, $puerto, $protocolo, $equipo_id, $estado);
$stmt->execute();

registrarLog($conn, usuarioActual(), "Añadió el servicio: " . $nombre);

header("Location: servicios.php");
exit;