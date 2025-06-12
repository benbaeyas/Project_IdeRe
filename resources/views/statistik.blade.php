<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Investasi</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @include('components.navbar_investor') 
</head>
<style>
    body {
      font-family: system-ui, sans-serif;
      margin: 0;
      background-color: #f2f2f2;
    }
    .chart-container {
    max-width: 800px;
    margin: 0 auto;
    }

    .chart-section{
      background: white;
      padding: 40px 20px;
      margin-top: 20px;
      margin: 30px 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .chart-section h2 {
      font-size: 2rem;
      text-align: center;
      margin-bottom: 30px;
    }
</style>
<body>

<section class="chart-section">
    <div class="container">
        <h2>Statistik Total Investasi Per Bulan</h2>

        <!-- Grafik -->
        <div class="chart-container">
            <canvas id="statistik-investasi"></canvas>
        </div>
    </div>
</section>

<script>
    const ctx = document.getElementById('statistik-investasi');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Total Investasi',
                data: @json($data),
                backgroundColor: '#00CF95',
                borderColor: '#00CF95',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Investasi (IDR)',
                        font: {
                            size: 16
                        }
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Bulan',
                        font: {
                            size: 16
                        }
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
</script>

@include('components.footer')
</body>
</html>