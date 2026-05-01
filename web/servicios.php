<?php include 'includes/header.php';?>
<?php include 'includes/sidebar.php';?>


<div class="main">
    <div class="page-header">
        <h1>Servicios</h1>
        <p>Gestiona los servicios asociados a la red </p>
    </div>

    <div class="panel">
        <h2>Servicios registrados</h2>


        <table>
            <thead>
                <tr>
                    <th> Servicio</th>
                    <th>Puerto</th>
                    <th>Protocolo</th>
                    <th>Equipo</th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>HTTP</td>
                    <td>80</td>
                    <td>TCP</td>
                    <td>SRV-WEB-01</td>
                    <td><span class="badge activo">Activo</span></td>
                </tr>

                <tr>
                    <td>DNS</td>
                    <td>53</td>
                    <td>UDP/TCP</td>
                    <td>SRV-DNS-01</td>
                    <td><span class="badge activo">Activo</span></td>
                </tr>

                <tr>
                    <td>SSH</td>
                    <td>22</td>
                    <td>TCP</td>
                    <td>SRV-AD-01</td>
                    <td><span class="badge mantenimiento">Mantenimiento</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php';?>
                
               



