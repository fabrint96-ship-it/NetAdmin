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