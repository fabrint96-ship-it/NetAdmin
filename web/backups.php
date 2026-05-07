<?php
require_once 'includes/auth.php';

$backupFile = "C:\\backup\\netadmin_backup.sql";
$existeBackup = file_exists($backupFile);
$fechaBackup = $existeBackup ? date("d/m/Y H:i:s", filemtime($backupFile)) : "No existe backup";
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Backups</h1>

    <div class="panel">
        <h2>Estado de copia de seguridad</h2>

        <p><strong>Ruta:</strong> C:\backup\netadmin_backup.sql</p>
        <p><strong>Estado:</strong> <?php echo $existeBackup ? "Backup disponible" : "Sin backup"; ?></p>
        <p><strong>Última copia:</strong> <?php echo $fechaBackup; ?></p>
    </div>

    <div class="panel">
        <h2>Procedimiento de backup</h2>
        <p>Para realizar una copia de seguridad, ejecutar el archivo:</p>
        <code>scripts\backup.bat</code>

        <h2>Procedimiento de restauración</h2>
        <p>Para restaurar la base de datos, ejecutar:</p>
        <code>scripts\restore.bat</code>
    </div>
</div>

<?php include 'includes/footer.php'; ?>