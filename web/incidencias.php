<?php include 'includes/header.php';?>
<?php include 'includes/sidebar.php';?>

<div class="main">
    <div class="page-header">
        <h1>Incidencias</h1>
        <p>Registro de incidenicias tecnicas de redes</p>
    </div>

    <div class="panel">
        <h2>Nueva Incidencia</h2>

        <form class="form-grid">
            <input type="text" placeholder="Titulo de la incidencias">
            <input type="text" placeholder="Equipo afectado">


            <select>
                <option>Baja</option>
                <option>Media<option>
                <option>Alta</option>
                <option>Critica</option>
            </select>

            <select>
                <option>Abierta</option>
                <option>En proceso</option>
                <option>Cerrada</option>
            </select>

            <textarea placeholder="Descripcion de la incidencias"></textarea>

            <button tyoe="submit">Registrar incidencia</button>
        </form>
    </div>

    <div class="panel">
        <h2>listado de incidencias</h2>

        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Equipo</th>
                    <th>Prioridad</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Servdior sn respuesta</td>
                    <td>SRV-AD-01</td>
                    <td><span class="badge critica">Critica</span></td>
                    <td>Abierta</td>
                    <td>2026-04-28</td>
                </tr>

                <tr>
                    <td>Revision de router principal</td>
                    <td>RTR-CORE-01</td>
                    <td><span class="badge medio">Media</span></td>
                    <td>En proceso</td>
                    <td>2026-04-28</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php';?>
