<?php
require_once 'includes/auth.php';
require_once __DIR__ . '/config/db.php';
require_once 'includes/functions.php';

$totalEquipos = $pdo->query("SELECT COUNT(*) AS total FROM equipos")->fetch()['total'];
$totalServicios = $pdo->query("SELECT COUNT(*) AS total FROM servicios")->fetch()['total'];
$totalIncidencias = $pdo->query("SELECT COUNT(*) AS total FROM incidencias")->fetch()['total'];
$totalLogs = $pdo->query("SELECT COUNT(*) AS total FROM logs")->fetch()['total'];

$equiposEstado = $pdo->query("
    SELECT estado, COUNT(*) AS total
    FROM equipos
    GROUP BY estado
    ORDER BY estado
")->fetchAll();

$serviciosEstado = $pdo->query("
    SELECT estado, COUNT(*) AS total
    FROM servicios
    GROUP BY estado
    ORDER BY estado
")->fetchAll();

$incidenciasPrioridad = $pdo->query("
    SELECT prioridad, COUNT(*) AS total
    FROM incidencias
    GROUP BY prioridad
    ORDER BY prioridad
")->fetchAll();

function prepararDatosGrafica($datos, $campo) {
    $labels = [];
    $values = [];

    foreach ($datos as $fila) {
        $labels[] = $fila[$campo] ?? 'Sin definir';
        $values[] = (int) $fila['total'];
    }

    return [
        'labels' => $labels,
        'values' => $values
    ];
}

$graficaEquipos = prepararDatosGrafica($equiposEstado, 'estado');
$graficaServicios = prepararDatosGrafica($serviciosEstado, 'estado');
$graficaIncidencias = prepararDatosGrafica($incidenciasPrioridad, 'prioridad');
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<div class="main">
    <h1>Dashboard</h1>
    <p>Bienvenido, <strong><?php echo limpiar($_SESSION['user']); ?></strong></p>
    <p>Rol: <strong><?php echo limpiar($_SESSION['rol'] ?? 'sin rol'); ?></strong></p>

    <div class="dashboard-grid">

        <a href="equipos.php" class="dashboard-card equipos-card">
            <div class="card-icon">🖥️</div>
            <div class="card-content">
                <h3>Equipos</h3>
                <p><?php echo $totalEquipos; ?></p>
            </div>
            <div class="card-arrow">›</div>
        </a>

        <a href="servicios.php" class="dashboard-card servicios-card">
            <div class="card-icon">🗄️</div>
            <div class="card-content">
                <h3>Servicios</h3>
                <p><?php echo $totalServicios; ?></p>
            </div>
            <div class="card-arrow">›</div>
        </a>

        <a href="incidencias.php" class="dashboard-card incidencias-card">
            <div class="card-icon">⚠️</div>
            <div class="card-content">
                <h3>Incidencias</h3>
                <p><?php echo $totalIncidencias; ?></p>
            </div>
            <div class="card-arrow">›</div>
        </a>

        <a href="logs.php" class="dashboard-card logs-card">
            <div class="card-icon">📄</div>
            <div class="card-content">
                <h3>Logs</h3>
                <p><?php echo $totalLogs; ?></p>
            </div>
            <div class="card-arrow">›</div>
        </a>

    </div>

    <div class="charts-grid">
        <div class="chart-card">
            <h3>Equipos por estado</h3>
            <div class="chart-box">
                <canvas id="chartEquipos"></canvas>
            </div>
        </div>

        <div class="chart-card">
            <h3>Servicios por estado</h3>
            <div class="chart-box">
                <canvas id="chartServicios"></canvas>
            </div>
        </div>

        <div class="chart-card">
            <h3>Incidencias por prioridad</h3>
            <div class="chart-box">
                <canvas id="chartIncidencias"></canvas>
            </div>
        </div>
    </div>

    <div class="info-panel">
        <h3>Información</h3>
        <p>El dashboard muestra indicadores generales y gráficas de estado del sistema.</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const equiposLabels = <?php echo json_encode($graficaEquipos['labels']); ?>;
const equiposValues = <?php echo json_encode($graficaEquipos['values']); ?>;

const serviciosLabels = <?php echo json_encode($graficaServicios['labels']); ?>;
const serviciosValues = <?php echo json_encode($graficaServicios['values']); ?>;

const incidenciasLabels = <?php echo json_encode($graficaIncidencias['labels']); ?>;
const incidenciasValues = <?php echo json_encode($graficaIncidencias['values']); ?>;

const doughnutOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {},
    plugins: {
        legend: {
            position: 'bottom',
            labels: {
                boxWidth: 12,
                font: {
                    size: 11
                }
            }
        }
    }
};

const barOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: {
            display: false
        }
    },
    scales: {
        y: {
            beginAtZero: true,
            ticks: {
                precision: 0
            }
        }
    }
};

new Chart(document.getElementById('chartEquipos'), {
    type: 'doughnut',
    data: {
        labels: equiposLabels,
        datasets: [{
            data: equiposValues
        }]
    },
    options: doughnutOptions
});

new Chart(document.getElementById('chartServicios'), {
    type: 'doughnut',
    data: {
        labels: serviciosLabels,
        datasets: [{
            data: serviciosValues
        }]
    },
    options: doughnutOptions
});

new Chart(document.getElementById('chartIncidencias'), {
    type: 'bar',
    data: {
        labels: incidenciasLabels,
        datasets: [{
            label: 'Incidencias',
            data: incidenciasValues
        }]
    },
    options: barOptions
});
</script>

<?php include 'includes/footer.php'; ?>