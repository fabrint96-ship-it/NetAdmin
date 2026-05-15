<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoPuedeEditar();

$titulo = trim($_POST['titulo']);
$descripcion = trim($_POST['descripcion']);
$prioridad = trim($_POST['prioridad']);
$estado = trim($_POST['estado']);
$equipo_id = !empty($_POST['equipo_id']) ? (int) $_POST['equipo_id'] : null;

$stmt = $pdo->prepare(
    "INSERT INTO incidencias (titulo, descripcion, prioridad, estado, equipo_id)
     VALUES (:titulo, :descripcion, :prioridad, :estado, :equipo_id)"
);

$stmt->bindValue(':titulo', $titulo);
$stmt->bindValue(':descripcion', $descripcion);
$stmt->bindValue(':prioridad', $prioridad);
$stmt->bindValue(':estado', $estado);
$stmt->bindValue(':equipo_id', $equipo_id, $equipo_id === null ? PDO::PARAM_NULL : PDO::PARAM_INT);
$stmt->execute();

$nuevoId = $pdo->lastInsertId();

registrarLog($pdo, usuarioActual(), "Registró la incidencia: " . $titulo, "incidencias", $nuevoId);

header("Location: incidencias.php");
exit;