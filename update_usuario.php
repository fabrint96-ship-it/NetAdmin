<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoEsAdmin();

$id = (int) $_POST['id'];
$username = trim($_POST['username']);
$rol = trim($_POST['rol']);
$password = trim($_POST['password']);

try {
    if (!empty($password)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare(
            "UPDATE usuarios
             SET username = :username, password = :password, rol = :rol
             WHERE id = :id"
        );

        $stmt->execute([
            ':username' => $username,
            ':password' => $hash,
            ':rol' => $rol,
            ':id' => $id
        ]);
    } else {
        $stmt = $pdo->prepare(
            "UPDATE usuarios
             SET username = :username, rol = :rol
             WHERE id = :id"
        );

        $stmt->execute([
            ':username' => $username,
            ':rol' => $rol,
            ':id' => $id
        ]);
    }

    registrarLog($pdo, usuarioActual(), "Actualizó el usuario: " . $username, "usuarios", $id);

    header("Location: usuarios.php");
    exit;

} catch (PDOException $e) {
    if ($e->getCode() === "23505") {
        header("Location: edit_usuario.php?id=" . $id . "&error=usuario_duplicado");
        exit;
    }

    die("Error al actualizar usuario: " . $e->getMessage());
}