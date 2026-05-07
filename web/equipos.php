<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$result = $conn->query("SELECT * FROM equipos ORDER BY id DESC");
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Gestión de equipos</h1>

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
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr class="fila-equipo">
                    <td><?php echo limpiar($row['id']); ?></td>
                    <td><?php echo limpiar($row['nombre']); ?></td>
                    <td><?php echo limpiar($row['ip']); ?></td>
                    <td><?php echo limpiar($row['tipo']); ?></td>
                    <td><?php echo limpiar($row['sistema_operativo']); ?></td>
                    <td><?php echo limpiar($row['ubicacion']); ?></td>
                    <td><?php echo limpiar($row['estado']); ?></td>
                    <td>
                        <a href="edit_equipo.php?id=<?php echo $row['id']; ?>">Editar</a> |
                        <a href="delete_equipo.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Eliminar este equipo?');">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>