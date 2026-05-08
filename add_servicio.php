<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$nombre = trim($_POST['nombre']);
$puerto = (int) $_POST['puerto'];
$protocolo = trim($_POST['protocolo']);
$equipo_id = !empty($_POST['equipo_id']) ? (int) $_POST['equipo_id'] : null;
$estado = trim($_POST['estado']);

$stmt = $pdo->prepare(
    "INSERT INTO servicios (nombre, puerto, protocolo, equipo_id, estado)
     VALUES (:nombre, :puerto, :protocolo, :equipo_id, :estado)"
);

$stmt->bindValue(':nombre', $nombre);
$stmt->bindValue(':puerto', $puerto, PDO::PARAM_INT);
$stmt->bindValue(':protocolo', $protocolo);
$stmt->bindValue(':equipo_id', $equipo_id, $equipo_id === null ? PDO::PARAM_NULL : PDO::PARAM_INT);
$stmt->bindValue(':estado', $estado);
$stmt->execute();

registrarLog($pdo, usuarioActual(), "Añadió el servicio: " . $nombre);

header("Location: servicios.php");
exit;