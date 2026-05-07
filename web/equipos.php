<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Gestión de equipos</h1>

    <form class="form-grid">
        <input type="text" placeholder="Nombre del equipo">
        <input type="text" placeholder="Dirección IP">
        <input type="text" placeholder="Tipo">
        <input type="text" placeholder="Sistema operativo">
        <input type="text" placeholder="Ubicación">

        <select>
            <option>Activo</option>
            <option>Mantenimiento</option>
            <option>Inactivo</option>
        </select>

        <button type="submit">Añadir equipo</button>
    </form>

    <input type="text" id="buscar" placeholder="Buscar equipo...">

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>IP</th>
                <th>Tipo</th>
                <th>Sistema</th>
                <th>Ubicación</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <tr class="fila-equipo">
                <td>SRV-AD-01</td>
                <td>192.168.1.10</td>
                <td>Servidor</td>
                <td>Windows Server</td>
                <td>CPD</td>
                <td>Activo</td>
                <td>
                    <a href="#">Editar</a> |
                    <a href="#" class="delete-link">Eliminar</a>
                </td>
            </tr>

            <tr class="fila-equipo">
                <td>RTR-CORE-01</td>
                <td>192.168.1.1</td>
                <td>Router</td>
                <td>Cisco IOS</td>
                <td>Rack principal</td>
                <td>Activo</td>
                <td>
                    <a href="#">Editar</a> |
                    <a href="#" class="delete-link">Eliminar</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>