<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

bloquearSiNoPuedeEditar();

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$stmt = $pdo->prepare("SELECT * FROM incidencias WHERE id = :id");
$stmt->execute([':id' => $id]);
$incidencia = $stmt->fetch();

if (!$incidencia) {
    header("Location: incidencias.php");
    exit;
}

$equipos = $pdo->query("SELECT id, nombre FROM equipos ORDER BY nombre ASC")->fetchAll();
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Editar incidencia</h1>

    <form action="update_incidencia.php" method="POST" class="form-grid">
        <input type="hidden" name="id" value="<?php echo limpiar($incidencia['id']); ?>">

        <input type="text" name="titulo" value="<?php echo limpiar($incidencia['titulo']); ?>" required>

        <textarea name="descripcion"><?php echo limpiar($incidencia['descripcion']); ?></textarea>

        <select name="prioridad">
            <option value="Baja" <?php if ($incidencia['prioridad'] === 'Baja') echo 'selected'; ?>>Baja</option>
            <option value="Media" <?php if ($incidencia['prioridad'] === 'Media') echo 'selected'; ?>>Media</option>
            <option value="Alta" <?php if ($incidencia['prioridad'] === 'Alta') echo 'selected'; ?>>Alta</option>
            <option value="Crítica" <?php if ($incidencia['prioridad'] === 'Crítica') echo 'selected'; ?>>Crítica</option>
        </select>

        <select name="estado">
            <option value="Abierta" <?php if ($incidencia['estado'] === 'Abierta') echo 'selected'; ?>>Abierta</option>
            <option value="En proceso" <?php if ($incidencia['estado'] === 'En proceso') echo 'selected'; ?>>En proceso</option>
            <option value="Cerrada" <?php if ($incidencia['estado'] === 'Cerrada') echo 'selected'; ?>>Cerrada</option>
        </select>

        <select name="equipo_id">
            <option value="">Sin equipo asociado</option>
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?php echo $equipo['id']; ?>" <?php if ((int)$incidencia['equipo_id'] === (int)$equipo['id']) echo 'selected'; ?>>
                    <?php echo limpiar($equipo['nombre']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Actualizar incidencia</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>