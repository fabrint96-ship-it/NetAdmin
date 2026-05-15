<?php

function limpiar($dato) {
    return htmlspecialchars(trim((string)$dato), ENT_QUOTES, 'UTF-8');
}

function usuarioActual() {
    return $_SESSION['user'] ?? 'desconocido';
}

function registrarLog($pdo, $usuario, $accion, $tabla = null, $registroId = null) {
    $ipCliente = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'desconocida';

    if (strpos($ipCliente, ',') !== false) {
        $ipCliente = explode(',', $ipCliente)[0];
    }

    $stmt = $pdo->prepare(
        "INSERT INTO logs (usuario, accion, tabla_afectada, registro_id, ip_cliente)
         VALUES (:usuario, :accion, :tabla_afectada, :registro_id, :ip_cliente)"
    );

    $stmt->execute([
        ':usuario' => $usuario,
        ':accion' => $accion,
        ':tabla_afectada' => $tabla,
        ':registro_id' => $registroId,
        ':ip_cliente' => $ipCliente
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