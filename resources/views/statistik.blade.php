<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Investasi</title>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script> 

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="{{ asset('css/statistik.css') }}">

    @livewireStyles
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navbar -->
    @include('components.navbar_investor') 

    <livewire:investment-chart />
    @stack('scripts') 
    @livewireScripts

    <!-- Daftar Proyek & Pendanaan -->
    <section class="chart-section bg-white p-10 shadow-md rounded-lg my-5 mx-5">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-6">Daftar Proyek & Pendanaan</h2>
        <!-- Search Box -->
        <div class="relative w-64">
        <input type="text" id="searchInput" placeholder="Cari proyek..." 
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ request('search') }}">
        </div>

        <div class="flex space-x-4 mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="statusFilter" value="open" class="form-checkbox h-5 w-5 text-green-500">
                <span class="ml-2 text-gray-700">Open</span>
            </label>    
            <label class="inline-flex items-center">
                <input type="checkbox" name="statusFilter" value="closed" class="form-checkbox h-5 w-5 text-green-500">
                <span class="ml-2 text-gray-700">Closed</span>
            </label>
        </div>

        <div class="projects_list space-y-6">
            <!-- statistik.blade.php -->
            @include('partials.projects_list', ['projects' => $projects ?? collect([])])
        </div>
    </section>

    <!-- Riwayat Pendanaan Anda -->
    <section class="chart-section bg-white p-10 shadow-md rounded-lg my-5 mx-5">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-6">Riwayat Pendanaan Anda</h2>
        <div class="investment-list space-y-4">
            @foreach ($investments->sortByDesc('tanggal_investasi')->take(5) as $investment)
                <div class="investment-card bg-white p-4 rounded-lg shadow-sm">
                    <h3 class="font-semibold text-base">{{ $investment->project->judul }}</h3>
                    <p>Jumlah: Rp {{ number_format($investment->jumlah_investasi, 0, ',', '.') }}</p>
                    <p>Tanggal: {{ $investment->tanggal_investasi }}</p>
                    
                </div>
            @endforeach
        </div>
    </section>


    <!-- Footer -->
    @include('components.footer')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js "></script>
    <script>
        function formatRupiahAndSync(input, projectId) {
            let rawValue = input.value.replace(/\D/g, '');
            const hiddenInput = document.getElementById('target_dana_hidden_' + projectId);

            if (hiddenInput) {
                hiddenInput.value = rawValue;
                console.log("Nilai dikirim:", rawValue); // Debug
            } else {
                console.error("Input hidden tidak ditemukan untuk proyek " + projectId);
            }
        }

        $(document).ready(function () {
            function loadProjects() {
                const search = $('#searchInput').val();
                const statuses = [];
                $('input[name="statusFilter"]:checked').each(function () {
                    statuses.push($(this).val());
                });

                $.get("{{ route('pencarian') }}", { search: search, status: statuses }, function (data) {
                    $('.projects_list').html(data); // Ganti konten daftar proyek
                }).fail(function () {
                    $('.projects_list').html('<p class="text-center text-red-500">Gagal memuat data.</p>');
                });
            }

            // Trigger saat pencarian atau filter berubah
            $('#searchInput, input[name="statusFilter"]').on('change keyup', function () {
                loadProjects();
            });

            // Load awal
            $('#searchInput').on('input', function () {
                loadProjects();
            });

            // Jika ada checkbox status filter
            $('input[name="statusFilter"]').on('change', function () {
                loadProjects();
            });
        });
    </script>

</body>
</html>