<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Incidencias</h1>

    <form class="form-grid">
        <input type="text" placeholder="Título de la incidencia">
        <textarea placeholder="Descripción"></textarea>

        <select>
            <option>Baja</option>
            <option>Media</option>
            <option>Alta</option>
            <option>Crítica</option>
        </select>

        <select>
            <option>Abierta</option>
            <option>En proceso</option>
            <option>Cerrada</option>
        </select>

        <button type="submit">Registrar incidencia</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Prioridad</th>
                <th>Estado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Caída de servicio DNS</td>
                <td>Alta</td>
                <td>Abierta</td>
                <td>2026-04-28</td>
            </tr>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>