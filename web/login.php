<?php
session_start();
require_once __DIR__ . '/../config/db.php'; // Aquí debe estar tu conexión PDO
require_once 'includes/functions.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // CAMBIO 1: Usamos $pdo y quitamos el error de la línea 12
    $stmt = $pdo->prepare("SELECT username, password FROM usuarios WHERE username = ?");
    
    // CAMBIO 2: Los datos van dentro del execute()
    $stmt->execute([$username]);
    
    // CAMBIO 3: fetch() obtiene la fila directamente
    $row = $stmt->fetch();

    if ($row) {
        if (password_verify($password, $row["password"])) {
            $_SESSION["user"] = $row["username"];
            
            // IMPORTANTE: registrarLog ahora también debe recibir $pdo
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
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
    </form>
</div>
<?php include 'includes/footer.php'; ?> 