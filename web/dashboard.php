<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/../config/db.php'; // Aquí se carga la conexión $pdo

try {
    // CAMBIO: Usamos $pdo en lugar de $conn
    // En PDO, fetchColumn() es perfecto para obtener un solo número (el COUNT)
    $totalEquipos = $pdo->query("SELECT COUNT(*) FROM equipos")->fetchColumn();
    $totalServicios = $pdo->query("SELECT COUNT(*) FROM servicios")->fetchColumn();
    $totalIncidencias = $pdo->query("SELECT COUNT(*) FROM incidencias")->fetchColumn();
    $totalLogs = $pdo->query("SELECT COUNT(*) FROM logs")->fetchColumn();
} catch (PDOException $e) {
    // Si alguna tabla no existe aún en Neon, ponemos 0 para que no explote la página
    $totalEquipos = 0;
    $totalServicios = 0;
    $totalIncidencias = 0;
    $totalLogs = 0;
    $error_db = "Error en tablas: " . $e->getMessage();
}
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Dashboard</h1>
    <p>Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['user']); ?></strong></p>
    
    <?php if (isset($error_db)): ?>
        <p style="color:red; background:#fee; padding:10px; border-radius:5px;"><?php echo $error_db; ?></p>
    <?php endif; ?>

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