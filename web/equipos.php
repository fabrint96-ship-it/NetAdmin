<? php include 'includes/header.php';?>
<? php include 'includes/sidebar.php';?>

<div class="main">
    <div class="page-header">
        <h1> Gestion de equipos</h1>
        <p> Inventario local de dispositivos de red</p>
    </div>

    <div class="panel">
        <h2> añadir equipos</h2>

        <form class="form-grid">
            <input type="text" placeholder="Nombre del equipo">
            <input type="text" placeholder="Direccion IP">
            <input type="text" placeholder="Tipo de equipo">
            <input type="text" placeholder="Sistema Operativo">
            <input type="text" placeholder="Ubicacion">


            <select>
                <option> Activo</option>
                <option> Mantenimiento</option>
                <option> Inactivo</option>
            </select>

            <button type="submit">Añadir equipos</button>
        </form>
    </div>


    <div class="panel">
        <h2> Lista de equipos</h2>

        <input type="text" id="buscar" placeholder="Buscar equipo...">

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>IP</th>
                    <th>Tipo</th>
                    <th>Sistema Operativo</th>
                    <th>Ubicacion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                <tr class="fila-equipo">
                    <td> SRV-AD-01 </td>
                    <td>192.168.1.10</td>
                    <td>Servidor></td>
                    <td> Windows Server</td>
                    <td>CPD</td>
                    <td><span class="badge activo">Activo</span></td>
                    <td>
                        <a href="#">Editar</a>
                        <a href="#" class="delete-lonk">Eliminar</a>
                    </td>
                </tr>

                <tr class="fila-equipo">
                    <td>RTR-CORE-01</td>
                    <td>192.1687.1.1.</td>
                    <td>Router</td>
                    <td>Cisco IOS</td>
                    <td> Rack principal</td>
                    <td><span class="badge activo">Activo</span></td>
                    <td>
                        <a href="#">Editar</a>
                        <a href="#" class="delete-link">Eliminar</a>
                    </td>
                </tr>

                <tr class=fila-equipo>
                    <td>PC-ADMIN-01</td>
                    <td>192.168.1.50</td>
                    <td>PC</td>
                    <td>Windows 10</td>
                    <td>Oficina tecnica </td>
                    <td><span class="badge mantenimiento">Mantenimiento</span></td>
                    <td>
                        <a href="#">Editar</a>
                        <a href="#" class="delete-link">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php';?>