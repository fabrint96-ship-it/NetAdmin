<?php include 'includes/header.php';?>


<div class="login-page">
    <div class="login-card">
        <h1>NetAdmin</h1>
        <h2>Inicio de Sesion</h2>
        <form action="dashboard.php" method="POST">
            <label>Usuario></label>
            <input type="text" name="username" placeholder="intoduce tu usuario" required>
            <label>Contraseña</label>
            <input type="password" name="password" placeholder="introduce tu contraseña" required>
            <button  type="submit"> Entrar</button>
        </form>

        <p class="small-text">Sistema local de administracion de red</p>
    </div>
</div>

<?php include 'includes/footer.php';?>
