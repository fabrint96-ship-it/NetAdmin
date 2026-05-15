<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoEsAdmin();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$stmt = $pdo->prepare("SELECT id, username, rol FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $id]);
$usuario = $stmt->fetch();

if (!$usuario) {
    header("Location: usuarios.php");
    exit;
}
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Editar usuario</h1>

    <form action="update_usuario.php" method="POST" class="form-grid">
        <input type="hidden" name="id" value="<?php echo limpiar($usuario['id']); ?>">

        <input type="text" name="username" value="<?php echo limpiar($usuario['username']); ?>" required>

        <input type="password" name="password" placeholder="Nueva contraseña opcional">

        <select name="rol" required>
            <option value="admin" <?php if ($usuario['rol'] === 'admin') echo 'selected'; ?>>Admin</option>
            <option value="tecnico" <?php if ($usuario['rol'] === 'tecnico') echo 'selected'; ?>>Técnico</option>
            <option value="auditor" <?php if ($usuario['rol'] === 'auditor') echo 'selected'; ?>>Auditor</option>
        </select>

        <button type="submit">Actualizar usuario</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>