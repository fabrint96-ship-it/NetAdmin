<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$stmt = $conn->prepare("SELECT * FROM equipos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$equipo = $result->fetch_assoc();

if (!$equipo) {
    header("Location: equipos.php");
    exit;
}
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Editar equipo</h1>

    <form action="update_equipo.php" method="POST" class="form-grid">
        <input type="hidden" name="id" value="<?php echo limpiar($equipo['id']); ?>">

        <input type="text" name="nombre" value="<?php echo limpiar($equipo['nombre']); ?>" required>
        <input type="text" name="ip" value="<?php echo limpiar($equipo['ip']); ?>" required>
        <input type="text" name="tipo" value="<?php echo limpiar($equipo['tipo']); ?>" required>
        <input type="text" name="sistema_operativo" value="<?php echo limpiar($equipo['sistema_operativo']); ?>">
        <input type="text" name="ubicacion" value="<?php echo limpiar($equipo['ubicacion']); ?>">

        <select name="estado">
            <option value="Activo" <?php if ($equipo['estado'] === 'Activo') echo 'selected'; ?>>Activo</option>
            <option value="Mantenimiento" <?php if ($equipo['estado'] === 'Mantenimiento') echo 'selected'; ?>>Mantenimiento</option>
            <option value="Inactivo" <?php if ($equipo['estado'] === 'Inactivo') echo 'selected'; ?>>Inactivo</option>
        </select>

        <button type="submit">Actualizar equipo</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>