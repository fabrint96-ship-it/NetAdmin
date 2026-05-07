<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Servicios</h1>

    <form class="form-grid">
        <input type="text" placeholder="Nombre del servicio">
        <input type="number" placeholder="Puerto">
        <select>
            <option>TCP</option>
            <option>UDP</option>
        </select>
        <input type="text" placeholder="Equipo asociado">
        <button type="submit">Añadir servicio</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Servicio</th>
                <th>Puerto</th>
                <th>Protocolo</th>
                <th>Equipo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>HTTP</td>
                <td>80</td>
                <td>TCP</td>
                <td>SRV-WEB-01</td>
            </tr>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>