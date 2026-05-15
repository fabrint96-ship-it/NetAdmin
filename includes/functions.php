<?php

function limpiar($dato) {
    return htmlspecialchars(trim((string)$dato), ENT_QUOTES, 'UTF-8');
}

function usuarioActual() {
    return $_SESSION['user'] ?? 'desconocido';
}

function registrarLog($pdo, $usuario, $accion) {
    $stmt = $pdo->prepare(
        "INSERT INTO logs (usuario, accion) VALUES (:usuario, :accion)"
    );

    $stmt->execute([
        ':usuario' => $usuario,
        ':accion' => $accion
    ]);
}

function rolActual() {
    return $_SESSION['rol'] ?? 'auditor';
}

function esAdmin() {
    return rolActual() === 'admin';
}

function esTecnico() {
    return rolActual() === 'tecnico';
}

function esAuditor() {
    return rolActual() === 'auditor';
}

function puedeEditar() {
    return in_array(rolActual(), ['admin', 'tecnico']);
}

function puedeEliminar() {
    return rolActual() === 'admin';
}

function bloquearSiNoPuedeEditar() {
    if (!puedeEditar()) {
        header("Location: dashboard.php?error=sin_permiso");
        exit;
    }
}

function bloquearSiNoPuedeEliminar() {
    if (!puedeEliminar()) {
        header("Location: dashboard.php?error=sin_permiso");
        exit;
    }
}