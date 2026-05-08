<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $stmt = $pdo->prepare(
        "SELECT username, password FROM usuarios WHERE username = :username"
    );

    $stmt->execute([
        ':username' => $username
    ]);

    $row = $stmt->fetch();

    if ($row) {
        if (password_verify($password, $row["password"])) {
            $_SESSION["user"] = $row["username"];

            registrarLog($pdo, $row["username"], "Inicio de sesión");

            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado";
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Iniciar sesión</h2>

    <?php if ($error): ?>
        <p class="error"><?php echo limpiar($error); ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>