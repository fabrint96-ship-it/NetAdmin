<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

$totalEquipos = $pdo->query("SELECT COUNT(*) AS total FROM equipos")->fetch()['total'];
$totalServicios = $pdo->query("SELECT COUNT(*) AS total FROM servicios")->fetch()['total'];
$totalIncidencias = $pdo->query("SELECT COUNT(*) AS total FROM incidencias")->fetch()['total'];
$totalLogs = $pdo->query("SELECT COUNT(*) AS total FROM logs")->fetch()['total'];
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Dashboard</h1>
    <p>Bienvenido, <strong><?php echo limpiar($_SESSION['user']); ?></strong></p>

    <div class="dashboard-grid">

        <a href="equipos.php" class="dashboard-card equipos-card">
            <div class="card-icon">🖥️</div>
            <div class="card-content">
                <h3>Equipos</h3>
                <p><?php echo $totalEquipos; ?></p>
            </div>
            <div class="card-arrow">›</div>
        </a>

        <a href="servicios.php" class="dashboard-card servicios-card">
            <div class="card-icon">🗄️</div>
            <div class="card-content">
                <h3>Servicios</h3>
                <p><?php echo $totalServicios; ?></p>
            </div>
            <div class="card-arrow">›</div>
        </a>

        <a href="incidencias.php" class="dashboard-card incidencias-card">
            <div class="card-icon">⚠️</div>
            <div class="card-content">
                <h3>Incidencias</h3>
                <p><?php echo $totalIncidencias; ?></p>
            </div>
            <div class="card-arrow">›</div>
        </a>

        <a href="logs.php" class="dashboard-card logs-card">
            <div class="card-icon">📄</div>
            <div class="card-content">
                <h3>Logs</h3>
                <p><?php echo $totalLogs; ?></p>
            </div>
            <div class="card-arrow">›</div>
        </a>

    </div>

    <div class="info-panel">
        <h3>Información</h3>
        <p>Desde aquí puedes acceder rápidamente a los módulos principales del sistema.</p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>