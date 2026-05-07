<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php';

$totalEquipos = $conn->query("SELECT COUNT(*) AS total FROM equipos")->fetch_assoc()['total'];
$totalServicios = $conn->query("SELECT COUNT(*) AS total FROM servicios")->fetch_assoc()['total'];
$totalIncidencias = $conn->query("SELECT COUNT(*) AS total FROM incidencias")->fetch_assoc()['total'];
$totalLogs = $conn->query("SELECT COUNT(*) AS total FROM logs")->fetch_assoc()['total'];
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Dashboard</h1>
    <p>Bienvenido, <?php echo htmlspecialchars($_SESSION['user']); ?></p>

    <div class="cards">
        <div class="card"><h3>Equipos</h3><p><?php echo $totalEquipos; ?></p></div>
        <div class="card"><h3>Servicios</h3><p><?php echo $totalServicios; ?></p></div>
        <div class="card"><h3>Incidencias</h3><p><?php echo $totalIncidencias; ?></p></div>
        <div class="card"><h3>Logs</h3><p><?php echo $totalLogs; ?></p></div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>