<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

$stmt = $pdo->query("SELECT * FROM equipos ORDER BY id DESC");
$equipos = $stmt->fetchAll();
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Gestión de equipos</h1>

    <?php if (isset($_GET['error']) && $_GET['error'] === 'ip_duplicada'): ?>
        <p class="error">La IP introducida ya existe. Usa otra dirección IP.</p>
    <?php endif; ?>

    <?php if (puedeEditar()): ?>
        <form action="add_equipo.php" method="POST" class="form-grid">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="ip" placeholder="IP" required>
        <input type="text" name="tipo" placeholder="Tipo" required>
        <input type="text" name="sistema_operativo" placeholder="Sistema operativo">
        <input type="text" name="ubicacion" placeholder="Ubicación">

        <select name="estado">
            <option value="Activo">Activo</option>
            <option value="Mantenimiento">Mantenimiento</option>
            <option value="Inactivo">Inactivo</option>
        </select>

        <button type="submit">Añadir equipo</button>
    </form>
    <?php endif; ?>

    <input type="text" id="buscar" placeholder="Buscar equipo...">

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>IP</th>
                <th>Tipo</th>
                <th>Sistema</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($equipos as $row): ?>
                <tr class="fila-busqueda">
                    <td><?php echo limpiar($row['id']); ?></td>
                    <td><?php echo limpiar($row['nombre']); ?></td>
                    <td><?php echo limpiar($row['ip']); ?></td>
                    <td><?php echo limpiar($row['tipo']); ?></td>
                    <td><?php echo limpiar($row['sistema_operativo']); ?></td>
                    <td><?php echo limpiar($row['ubicacion']); ?></td>
                    <td><?php echo limpiar($row['estado']); ?></td>
                    <td>
                        <?php if (puedeEditar()): ?>
                            <a href="edit_equipo.php?id=<?php echo $row['id']; ?>">Editar</a>
                        <?php endif; ?>

                        <?php if (puedeEliminar()): ?>
                            | <a href="delete_equipo.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Eliminar este equipo?');">Eliminar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>