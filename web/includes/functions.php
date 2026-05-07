<?php

function limpiar($dato) {
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}

function usuarioActual() {
    return $_SESSION['user'] ?? 'desconocido';
}

function registrarLog($conn, $usuario, $accion) {
    $stmt = $conn->prepare("INSERT INTO logs (usuario, accion) VALUES (?, ?)");
    $stmt->bind_param("ss", $usuario, $accion);
    $stmt->execute();
}