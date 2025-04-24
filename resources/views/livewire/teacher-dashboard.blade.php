<div>
    <div class="grid grid-cols-3 gap-5">
        <div class="rounded-xl bg-white p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-xl">Students</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-users text-green-600">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
            <p class="text-5xl mt-1 font-semibold text-gray-700">{{ $students->count() }}</p>
        </div>
        <div class="rounded-xl bg-white p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-xl">Attendance Today</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-grid-2x2-check text-green-600">
                    <path
                        d="M12 3v17a1 1 0 0 1-1 1H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v6a1 1 0 0 1-1 1H3" />
                    <path d="m16 19 2 2 4-4" />
                </svg>
            </div>
            <p class="text-5xl mt-1 font-semibold text-gray-700">{{ $attendances->count() }}</p>
        </div>
        <div class="rounded-xl bg-white p-5">
            <div class="flex justify-between items-center">
                <h1 class="text-xl">Parent</h1>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-square-user-round text-green-600">
                    <path d="M18 21a6 6 0 0 0-12 0" />
                    <circle cx="12" cy="11" r="4" />
                    <rect width="18" height="18" x="3" y="3" rx="2" />
                </svg>
            </div>
            <p class="text-5xl mt-1 font-semibold text-gray-700">{{ $students->count() }}</p>
        </div>
    </div>
    <div class="mt-10 bg-white p-5 rounded-xl">
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

    </div>
</div>
