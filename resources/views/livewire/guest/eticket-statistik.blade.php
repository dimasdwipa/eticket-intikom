<div class="bg-white/25 shadow-lg shadow-white rounded-lg p-6 mt-6 backdrop-blur-md">
    <h2 class="text-xl font-semibold mb-4 text-white">Statistik e-Ticket</h2>
    <div class="relative" wire:ignore>
        <div id="ticketChart" class="w-full h-96"></div>
    </div>
    <div  wire:ignore>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let ticketChart = Highcharts.chart('ticketChart', {
                    chart: { type: 'column', backgroundColor: 'transparent' },
                    title: { text: '', style: { color: '#ffffff', fontSize: '18px' } },
                    xAxis: {
                        categories: ['Open', 'Awaiting Response', 'On Progress','Repairing', 'Resolved','Closed'],
                        title: { text: 'Status Tiket' },
                        labels: { style: { color: '#ffffff' } }
                    },
                    yAxis: {
                        title: { text: 'Jumlah Tiket' },
                        labels: { style: { color: '#ffffff' } }
                    },
                    series: [{
                        name: 'Jumlah Tiket',
                        data: @json(array_values($chartData)), // Data awal dari PHP
                        colorByPoint: true
                    }],
                    colors: ['#ffec40', '#ff8c2a', '#64b9e8', '#c1cfd1', '#1ef7e3', '#33d033'],
                    legend: { enabled: false }
                });

                // Event dari Livewire untuk update chart tanpa reload
                window.addEventListener('refreshChart', event => {
                    ticketChart.series[0].setData(event.detail.chartData, true);
                });

                // Panggil Livewire setiap 10 detik untuk update data
                setInterval(() => {
                    Livewire.emit('updateChartData');
                }, 20000);
            });
        </script>
    </div>

</div>
