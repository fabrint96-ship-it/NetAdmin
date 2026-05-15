<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoPuedeEditar();

$id = (int) $_POST['id'];
$titulo = trim($_POST['titulo']);
$descripcion = trim($_POST['descripcion']);
$prioridad = trim($_POST['prioridad']);
$estado = trim($_POST['estado']);
$equipo_id = !empty($_POST['equipo_id']) ? (int) $_POST['equipo_id'] : null;

$stmt = $pdo->prepare(
    "UPDATE incidencias
     SET titulo = :titulo,
         descripcion = :descripcion,
         prioridad = :prioridad,
         estado = :estado,
         equipo_id = :equipo_id
     WHERE id = :id"
);

$stmt->bindValue(':titulo', $titulo);
$stmt->bindValue(':descripcion', $descripcion);
$stmt->bindValue(':prioridad', $prioridad);
$stmt->bindValue(':estado', $estado);
$stmt->bindValue(':equipo_id', $equipo_id, $equipo_id === null ? PDO::PARAM_NULL : PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute();

registrarLog($pdo, usuarioActual(), "Actualizó la incidencia: " . $titulo, "incidencias", $id);

header("Location: incidencias.php");
exit;