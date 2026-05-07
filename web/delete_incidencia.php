<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$stmt = $conn->prepare("DELETE FROM incidencias WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

registrarLog($conn, usuarioActual(), "Eliminó la incidencia con ID: " . $id);

header("Location: incidencias.php");
exit;