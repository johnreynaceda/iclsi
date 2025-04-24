<div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div wire:ignore x-data="{ chart: null, chartData: @entangle('chartData') }" x-init="chart = new Chart($refs.chartCanvas.getContext('2d'), {
        type: 'bar',
        data: chartData,
        options: {
            responsive: true,
            plugins: {
                legend: { display: true, position: 'top' }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
    
    $watch('chartData', value => {
        chart.data = value;
        chart.update();
    });">
        <canvas x-ref="chartCanvas"></canvas>

    </div>
