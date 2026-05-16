<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {

    die("Acceso denegado");
}

$backups = $pdo->query("
    SELECT *
    FROM backups
    ORDER BY fecha DESC
")->fetchAll();

include 'includes/header.php';
include 'includes/sidebar.php';
?>

<div class="main">

    <h1>Backups PostgreSQL</h1>

    <a href="crear_backup.php" class="btn">
        Crear backup
    </a>

    <br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Archivo</th>
            <th>Fecha</th>
            <th>Usuario</th>
            <th>Descargar</th>
        </tr>

        <?php foreach ($backups as $backup): ?>

        <tr>
            <td><?php echo $backup['id']; ?></td>

            <td>
                <?php echo limpiar($backup['nombre_archivo']); ?>
            </td>

            <td>
                <?php echo $backup['fecha']; ?>
            </td>

            <td>
                <?php echo limpiar($backup['usuario']); ?>
            </td>

            <td>
                <a
                    href="backups/<?php echo $backup['nombre_archivo']; ?>"
                    class="btn"
                    download
                >
                    Descargar
                </a>
            </td>
        </tr>

        <?php endforeach; ?>

    </table>

</div>

<?php include 'includes/footer.php'; ?>