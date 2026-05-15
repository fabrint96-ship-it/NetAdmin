<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

$equipos = $pdo->query("SELECT id, nombre FROM equipos ORDER BY nombre ASC")->fetchAll();

$sql = "SELECT servicios.*, equipos.nombre AS equipo_nombre
        FROM servicios
        LEFT JOIN equipos ON servicios.equipo_id = equipos.id
        ORDER BY servicios.id DESC";

$servicios = $pdo->query($sql)->fetchAll();
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Servicios</h1>

    <form action="add_servicio.php" method="POST" class="form-grid">
        <input type="text" name="nombre" placeholder="Nombre del servicio" required>
        <input type="number" name="puerto" placeholder="Puerto" required>

        <select name="protocolo" required>
            <option value="TCP">TCP</option>
            <option value="UDP">UDP</option>
        </select>

        <select name="equipo_id">
            <option value="">Sin equipo asociado</option>
            <?php foreach ($equipos as $equipo): ?>
                <option value="<?php echo $equipo['id']; ?>">
                    <?php echo limpiar($equipo['nombre']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select name="estado">
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>

        <button type="submit">Añadir servicio</button>
    </form>

    <input type="text" id="buscar" placeholder="Buscar servicio...">

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Servicio</th>
                <th>Puerto</th>
                <th>Protocolo</th>
                <th>Equipo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($servicios as $row): ?>
                <tr class="fila-busqueda">
                    <td><?php echo limpiar($row['id']); ?></td>
                    <td><?php echo limpiar($row['nombre']); ?></td>
                    <td><?php echo limpiar($row['puerto']); ?></td>
                    <td><?php echo limpiar($row['protocolo']); ?></td>
                    <td><?php echo limpiar($row['equipo_nombre'] ?? 'Sin asignar'); ?></td>
                    <td><?php echo limpiar($row['estado']); ?></td>
                    <td>
                        <?php if (puedeEditar()): ?>
                            <a href="edit_servicio.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <?php endif; ?>

                        <?php if (puedeEliminar()): ?>
                            | <a href="delete_servicio.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Eliminar este servicio?');">Eliminar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>