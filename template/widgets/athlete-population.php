<p><strong>Total: </strong><?= $totalPopulation ?></p>
<canvas id="sportDistribution"></canvas>
<script>
    const ctx3 = document.getElementById('sportDistribution').getContext('2d');
    new Chart(ctx3, {
        type: 'pie',
        data: {
            labels: <?= $sport ?>,
            datasets: [{
                label: 'Athlete',
                data: <?= $data ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        }
    });
</script>