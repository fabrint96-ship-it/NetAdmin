<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

$logs = $pdo->query("SELECT * FROM logs ORDER BY id DESC")->fetchAll();
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
            <th>Tabla</th>
            <th>Registro</th>
            <th>IP Cliente</th>
            <th>Fecha</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($logs as $row): ?>
            <tr>
                <td><?php echo limpiar($row['id']); ?></td>
                <td><?php echo limpiar($row['usuario']); ?></td>
                <td><?php echo limpiar($row['accion']); ?></td>
                <td><?php echo limpiar($row['tabla_afectada']); ?></td>
                <td><?php echo limpiar($row['registro_id']); ?></td>
                <td><?php echo limpiar($row['ip_cliente']); ?></td>
                <td><?php echo limpiar($row['fecha']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

<?php include 'includes/footer.php'; ?>