<div class="bg-white/25 shadow-lg shadow-white rounded-lg p-6 mt-6 backdrop-blur-md">
    <h2 class="text-xl font-semibold mb-4 text-white">Daily Progress</h2>
    <div class="relative" wire:ignore>
        <div id="progressChart" class="w-full h-96"></div>
    </div>
    <div wire:ignore>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let progressChart = Highcharts.chart('progressChart', {
                    chart: {
                        type: 'line',
                        backgroundColor: 'transparent',
                        borderWidth: 0,
                    },
                    title: { text: '', style: { color: '#ffffff', fontSize: '18px' } },
                    xAxis: {
                        categories: @json(array_keys($progressChartData)),
                        title: { text: 'Tanggal' },
                        labels: { style: { color: '#ffffff' } }
                    },
                    yAxis: {
                        title: { text: 'Jumlah Tiket' },
                        labels: { style: { color: '#ffffff' } }
                    },
                    series: [{
                        name: 'Jumlah Tiket',
                        data: @json(array_values($progressChartData)),
                        color: '#2ecc71',
                        lineWidth: 6, // Menambah ketebalan garis
                        dashStyle: 'Solid', // Gaya garis
                        marker: {
                            enabled: true, // Menampilkan marker
                            radius: 8, // Membesarkan marker
                            symbol: 'circle', // Bentuk marker
                            fillColor: '#ffffff', // Warna marker agar kontras
                            lineWidth: 3, // Ketebalan garis marker
                            lineColor: '#2ecc71', // Warna garis di sekitar marker
                        },
                        states: {
                            hover: {
                                lineWidth: 8, // Garis lebih tebal saat hover
                                halo: { size: 10, opacity: 0.5 }, // Efek halo lebih jelas
                            }
                        }
                    }],
                    legend: { enabled: false }
                });

                // Event dari Livewire untuk update chart tanpa reload
                window.addEventListener('refreshProgressChart', event => {
                    progressChart.series[0].setData(event.detail.ticketProgressCounts, true);
                });

                // Auto reload setiap 60 detik
                setInterval(() => {
                    Livewire.emit('updateProgressChartData');
                }, 20000);
            });
        </script>
    </div>
</div>
