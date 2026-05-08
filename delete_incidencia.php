<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$stmt = $pdo->prepare("DELETE FROM incidencias WHERE id = :id");
$stmt->execute([':id' => $id]);

registrarLog($pdo, usuarioActual(), "Eliminó la incidencia con ID: " . $id);

header("Location: incidencias.php");
exit;