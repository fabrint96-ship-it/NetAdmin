<div class="sidebar">
    <h2>NetAdmin</h2>

    <a href="dashboard.php">Dashboard</a>
    <a href="equipos.php">Equipos</a>
    <a href="servicios.php">Servicios</a>
    <a href="incidencias.php">Incidencias</a>
    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
        <a href="usuarios.php">Usuarios</a>
    <?php endif; ?>
    <a href="logs.php">Logs</a>
    <a href="backups.php">Backups</a>
    <a href="logout.php">Cerrar sesión</a>
</div>