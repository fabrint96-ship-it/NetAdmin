<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$titulo = trim($_POST['titulo']);
$descripcion = trim($_POST['descripcion']);
$prioridad = trim($_POST['prioridad']);
$estado = trim($_POST['estado']);
$equipo_id = !empty($_POST['equipo_id']) ? (int) $_POST['equipo_id'] : null;

$stmt = $conn->prepare(
    "INSERT INTO incidencias (titulo, descripcion, prioridad, estado, equipo_id)
     VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param("ssssi", $titulo, $descripcion, $prioridad, $estado, $equipo_id);
$stmt->execute();

registrarLog($conn, usuarioActual(), "Registró la incidencia: " . $titulo);

header("Location: incidencias.php");
exit;