<?php

function limpiar($dato) {
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}

function usuarioActual() {
    return $_SESSION['user'] ?? 'desconocido';
}

/**
 * He cambiado $conn por $pdo y adaptado la consulta a PDO
 */
function registrarLog($pdo, $usuario, $accion) {
    try {
        // En PDO usamos ? y pasamos los valores en el execute como un array
        $stmt = $pdo->prepare("INSERT INTO logs (usuario, accion) VALUES (?, ?)");
        $stmt->execute([$usuario, $accion]);
    } catch (PDOException $e) {
        // Si falla el log (por ejemplo, si no existe la tabla 'logs'), 
        // lo ignoramos para que el usuario pueda seguir entrando.
        error_log("Error en logs: " . $e->getMessage());
    }
} 