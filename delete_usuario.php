<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoEsAdmin();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($id <= 0) {
    header("Location: usuarios.php");
    exit;
}

// No permitir eliminarse a sí mismo
$stmt = $pdo->prepare("SELECT username, rol FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $id]);
$usuario = $stmt->fetch();

if (!$usuario) {
    header("Location: usuarios.php");
    exit;
}

if ($usuario['username'] === usuarioActual()) {
    header("Location: usuarios.php?error=no_autoeliminar");
    exit;
}

// No permitir eliminar el último admin
if ($usuario['rol'] === 'admin') {
    $totalAdmins = $pdo->query("SELECT COUNT(*) AS total FROM usuarios WHERE rol = 'admin'")->fetch()['total'];

    if ((int)$totalAdmins <= 1) {
        header("Location: usuarios.php?error=ultimo_admin");
        exit;
    }
}

$stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $id]);

registrarLog($pdo, usuarioActual(), "Eliminó el usuario: " . $usuario['username'], "usuarios", $id);

header("Location: usuarios.php");
exit;