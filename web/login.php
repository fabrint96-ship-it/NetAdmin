<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Iniciar sesión</h2>

    <form action="dashboard.php" method="POST">
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Entrar</button>
    </form>

    <p class="small-text">Acceso restringido al personal autorizado.</p>
</div>

<?php include 'includes/footer.php'; ?>