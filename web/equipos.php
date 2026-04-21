<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Equipos - NetAdmin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <h2>NetAdmin</h2>
        <a href="dashboard.php">Inicio</a>
        <a href="equipos.php">Equipos</a>
        <a href="logout.php">Salir</a>
    </div>

    <div class="main">
        <h1>Gestión de equipos</h1>

        <form>
            <input type="text" placeholder="Nombre del equipo">
            <input type="text" placeholder="IP">
            <input type="text" placeholder="Tipo">
            <input type="text" placeholder="Ubicación">
            <button type="submit">Añadir equipo</button>
        </form>

        <input type="text" id="buscar" placeholder="Buscar equipo...">

        <div class="card">PC-01 - 192.168.1.10</div>
        <div class="card">SRV-01 - 192.168.1.20</div>
        <div class="card">RTR-01 - 192.168.1.1</div>
    </div>

    <script src="app.js"></script>
</body>
</html>
