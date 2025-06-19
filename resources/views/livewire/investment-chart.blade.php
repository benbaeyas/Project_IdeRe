<div class="chart-section bg-white p-10 shadow-md rounded-lg my-5 mx-5">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl md:text-3xl font-bold">Statistik Total Investasi Per Bulan</h2>
    </div>

    <div class="chart-container w-full max-w-4xl mx-auto">
        <canvas id="statistik-investasi" class="w-full h-72 md:h-96"></canvas>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', () => {
        const ctx = document.getElementById('statistik-investasi').getContext('2d');

        let chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($this->labels),
                datasets: [{
                    label: 'Total Investasi (IDR)',
                    data: @json($this->data),
                    backgroundColor: '#00CF95',
                    borderColor: '#00CF95',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Total Investasi (IDR)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Terima event dari Livewire
        Livewire.on('updateChart', ({ labels, data }) => {
            chart.data.labels = labels;
            chart.data.datasets[0].data = data;
            chart.update();
        });
    });
</script>
@endpush