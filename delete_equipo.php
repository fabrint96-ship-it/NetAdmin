<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoPuedeEliminar();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$stmt = $pdo->prepare("DELETE FROM equipos WHERE id = :id");
$stmt->execute([':id' => $id]);

registrarLog($pdo, usuarioActual(), "Eliminó el equipo con ID: " . $id, "equipos", $id);

header("Location: equipos.php");
exit;