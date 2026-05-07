<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';
require_once 'includes/functions.php';

$result = $conn->query("SELECT * FROM logs ORDER BY fecha DESC");
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Logs del sistema</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Acción</th>
                <th>Fecha</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo limpiar($row['id']); ?></td>
                    <td><?php echo limpiar($row['usuario']); ?></td>
                    <td><?php echo limpiar($row['accion']); ?></td>
                    <td><?php echo limpiar($row['fecha']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>