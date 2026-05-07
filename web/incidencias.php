<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$equipos = $conn->query("SELECT id, nombre FROM equipos ORDER BY nombre ASC");

$sql = "SELECT incidencias.*, equipos.nombre AS equipo_nombre
        FROM incidencias
        LEFT JOIN equipos ON incidencias.equipo_id = equipos.id
        ORDER BY incidencias.fecha DESC";

$result = $conn->query($sql);
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Incidencias</h1>

    <form action="add_incidencia.php" method="POST" class="form-grid">
        <input type="text" name="titulo" placeholder="Título" required>
        <textarea name="descripcion" placeholder="Descripción"></textarea>

        <select name="prioridad">
            <option value="Baja">Baja</option>
            <option value="Media">Media</option>
            <option value="Alta">Alta</option>
            <option value="Crítica">Crítica</option>
        </select>

        <select name="estado">
            <option value="Abierta">Abierta</option>
            <option value="En proceso">En proceso</option>
            <option value="Cerrada">Cerrada</option>
        </select>

        <select name="equipo_id">
            <option value="">Sin equipo asociado</option>
            <?php while ($equipo = $equipos->fetch_assoc()): ?>
                <option value="<?php echo $equipo['id']; ?>">
                    <?php echo limpiar($equipo['nombre']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <button type="submit">Registrar incidencia</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Prioridad</th>
                <th>Estado</th>
                <th>Equipo</th>
                <th>Fecha</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo limpiar($row['id']); ?></td>
                    <td><?php echo limpiar($row['titulo']); ?></td>
                    <td><?php echo limpiar($row['prioridad']); ?></td>
                    <td><?php echo limpiar($row['estado']); ?></td>
                    <td><?php echo limpiar($row['equipo_nombre'] ?? 'Sin asignar'); ?></td>
                    <td><?php echo limpiar($row['fecha']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>