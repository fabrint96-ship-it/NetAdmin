<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoPuedeEditar();

$id = (int) $_POST['id'];
$nombre = trim($_POST['nombre']);
$puerto = (int) $_POST['puerto'];
$protocolo = trim($_POST['protocolo']);
$equipo_id = !empty($_POST['equipo_id']) ? (int) $_POST['equipo_id'] : null;
$estado = trim($_POST['estado']);

$stmt = $pdo->prepare(
    "UPDATE servicios
     SET nombre = :nombre,
         puerto = :puerto,
         protocolo = :protocolo,
         equipo_id = :equipo_id,
         estado = :estado
     WHERE id = :id"
);

$stmt->bindValue(':nombre', $nombre);
$stmt->bindValue(':puerto', $puerto, PDO::PARAM_INT);
$stmt->bindValue(':protocolo', $protocolo);
$stmt->bindValue(':equipo_id', $equipo_id, $equipo_id === null ? PDO::PARAM_NULL : PDO::PARAM_INT);
$stmt->bindValue(':estado', $estado);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

registrarLog($pdo, usuarioActual(), "Actualizó el servicio: " . $nombre);

header("Location: servicios.php");
exit;