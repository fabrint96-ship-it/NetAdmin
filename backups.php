<?php
require_once 'includes/auth.php';
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Backups</h1>

    <div class="panel">
        <h2>Base de datos externa</h2>
        <p>La base de datos del proyecto está alojada en NeonDB utilizando PostgreSQL.</p>
        <p>Las copias de seguridad se pueden realizar desde el panel de NeonDB o mediante herramientas compatibles con PostgreSQL.</p>
    </div>

    <div class="panel">
        <h2>Arquitectura actual</h2>
        <p><strong>Código:</strong> GitHub</p>
        <p><strong>Aplicación web:</strong> Render</p>
        <p><strong>Base de datos:</strong> NeonDB PostgreSQL</p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>