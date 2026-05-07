<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$stmt = $conn->prepare("SELECT * FROM servicios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$servicio = $result->fetch_assoc();

if (!$servicio) {
    header("Location: servicios.php");
    exit;
}

$equipos = $conn->query("SELECT id, nombre FROM equipos ORDER BY nombre ASC");
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Editar servicio</h1>

    <form action="update_servicio.php" method="POST" class="form-grid">
        <input type="hidden" name="id" value="<?php echo limpiar($servicio['id']); ?>">

        <input type="text" name="nombre" value="<?php echo limpiar($servicio['nombre']); ?>" required>
        <input type="number" name="puerto" value="<?php echo limpiar($servicio['puerto']); ?>" required>

        <select name="protocolo" required>
            <option value="TCP" <?php if ($servicio['protocolo'] === 'TCP') echo 'selected'; ?>>TCP</option>
            <option value="UDP" <?php if ($servicio['protocolo'] === 'UDP') echo 'selected'; ?>>UDP</option>
        </select>

        <select name="equipo_id">
            <option value="">Sin equipo asociado</option>
            <?php while ($equipo = $equipos->fetch_assoc()): ?>
                <option value="<?php echo $equipo['id']; ?>" <?php if ((int)$servicio['equipo_id'] === (int)$equipo['id']) echo 'selected'; ?>>
                    <?php echo limpiar($equipo['nombre']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <select name="estado">
            <option value="Activo" <?php if ($servicio['estado'] === 'Activo') echo 'selected'; ?>>Activo</option>
            <option value="Inactivo" <?php if ($servicio['estado'] === 'Inactivo') echo 'selected'; ?>>Inactivo</option>
        </select>

        <button type="submit">Actualizar servicio</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>