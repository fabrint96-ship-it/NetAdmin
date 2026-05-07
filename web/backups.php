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
        <p><strong>Ruta:</strong> C:\backup\netadmin_backup.sql</p>
        <p><strong>Estado:</strong> <?php echo $existeBackup ? "Backup disponible" : "Sin backup"; ?></p>
        <p><strong>Última copia:</strong> <?php echo $fechaBackup; ?></p>
    </div>

    <div class="panel">
        <h2>Procedimiento</h2>
        <p>Para realizar backup, ejecutar:</p>
        <code>scripts\backup.bat</code>

        <p>Para restaurar, ejecutar:</p>
        <code>scripts\restore.bat</code>
    </div>
</div>

<?php include 'includes/footer.php'; ?>