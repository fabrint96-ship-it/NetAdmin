<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoEsAdmin();

$username = trim($_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$rol = trim($_POST['rol']);

try {
    $stmt = $pdo->prepare(
        "INSERT INTO usuarios (username, password, rol)
         VALUES (:username, :password, :rol)"
    );

    $stmt->execute([
        ':username' => $username,
        ':password' => $password,
        ':rol' => $rol
    ]);

    $nuevoId = $pdo->lastInsertId();

    registrarLog($pdo, usuarioActual(), "Creó el usuario: " . $username, "usuarios", $nuevoId);

    header("Location: usuarios.php");
    exit;

} catch (PDOException $e) {
    if ($e->getCode() === "23505") {
        header("Location: usuarios.php?error=usuario_duplicado");
        exit;
    }

    die("Error al crear usuario: " . $e->getMessage());
}