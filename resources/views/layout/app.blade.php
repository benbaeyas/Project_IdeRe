@livewireScripts
<script>
    window.livewire.on('updateChart', () => {
        if (window.chart && window.chart.update) {
            window.chart.data.labels = JSON.parse('@json($this->labels)');
            window.chart.data.datasets[0].data = JSON.parse('@json($this->data)');
            window.chart.update();
        }
    });
</script>
</body>
</html>