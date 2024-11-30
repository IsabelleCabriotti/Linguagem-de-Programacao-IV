<?php
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/veiculos.php';

    $dados = gerarDadosGraficos();
?>

<main class="container">
    <div class="container mt-5">
        <h2>Dashboard</h2>
        <div id="chart_div" style="width: 100%; height: 500px;"></div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Veiculo', 'Quantidade de Alugueis', {role: 'style'}],
                <?php foreach ($dados as $d): ?>
                    ['<?= ($d['marca'] . ' ' . $d['modelo']) ?>', <?= ($d['total_alugueis']) ?>, '#ff914d'],
                <?php endforeach; ?>
            ]);

            var options = {
                title: 'Alugueis por Veículo',
                hAxis: {title: 'Veículos',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0},
                colors: ['orange'],
                chartArea: {width: '70%', height: '70%'}
            };
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</main>

<?php require_once 'rodape.php'; ?>
