<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$id = (int) $_POST['id'];
$nombre = trim($_POST['nombre']);
$puerto = (int) $_POST['puerto'];
$protocolo = trim($_POST['protocolo']);
$equipo_id = !empty($_POST['equipo_id']) ? (int) $_POST['equipo_id'] : null;
$estado = trim($_POST['estado']);

$stmt = $conn->prepare(
    "UPDATE servicios
     SET nombre = ?, puerto = ?, protocolo = ?, equipo_id = ?, estado = ?
     WHERE id = ?"
);

$stmt->bind_param("sisisi", $nombre, $puerto, $protocolo, $equipo_id, $estado, $id);
$stmt->execute();

registrarLog($conn, usuarioActual(), "Actualizó el servicio: " . $nombre);

header("Location: servicios.php");
exit;