<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$id = (int) $_POST['id'];
$titulo = trim($_POST['titulo']);
$descripcion = trim($_POST['descripcion']);
$prioridad = trim($_POST['prioridad']);
$estado = trim($_POST['estado']);
$equipo_id = !empty($_POST['equipo_id']) ? (int) $_POST['equipo_id'] : null;

$stmt = $conn->prepare(
    "UPDATE incidencias
     SET titulo = ?, descripcion = ?, prioridad = ?, estado = ?, equipo_id = ?
     WHERE id = ?"
);

$stmt->bind_param("ssssii", $titulo, $descripcion, $prioridad, $estado, $equipo_id, $id);
$stmt->execute();

registrarLog($conn, usuarioActual(), "Actualizó la incidencia: " . $titulo);

header("Location: incidencias.php");
exit;