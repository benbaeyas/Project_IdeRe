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
        <div class="project-list space-y-6">
            @foreach($projects as $project)
                <div class="project-card-horizontal flex items-center bg-white rounded-lg shadow-sm p-4 hover:shadow transition-shadow duration-300">
                    <!-- Thumbnail -->
                    <img src="{{ asset('storage/' . $project->foto_proyek) }}" 
                        alt="Foto Proyek" 
                        class="project-thumbnail w-20 h-20 object-cover rounded shadow-sm"
                        onerror="this.src='{{ asset('images/default-project.png') }}'; this.onerror=null;">

                    <!-- Informasi Proyek -->
                    <div class="project-info ml-4 flex-1">
                        <div class="project-title font-semibold text-lg">{{ $project->judul }}</div>
                        <div class="project-meta text-sm text-gray-600 mb-2">
                            {{ \Carbon\Carbon::parse($project->tanggal_mulai)->format('d M Y') }} → 
                            {{ \Carbon\Carbon::parse($project->tanggal_berakhir)->format('d M Y') }}
                        </div>
                        <div class="project-description text-sm text-gray-700 line-clamp-2 mb-3">
                            {{ $project->deskripsi }}
                        </div>

                        <!-- Progress Dana -->
                        <div class="funding-progress mb-3">
                            @php
                                $percentage = $project->target_dana > 0 
                                    ? ($project->dana_terkumpul / $project->target_dana) * 100 
                                    : 0;
                            @endphp
                            <div class="progress-bar-container h-2 bg-gray-200 rounded-full overflow-hidden">
                                <div class="progress-bar h-full bg-green-500" style="width: {{ min($percentage, 100) }}%"></div>
                            </div>
                            <div class="funding-details text-xs text-gray-600 mt-1">
                                <strong>Rp {{ number_format($project->dana_terkumpul, 0, ',', '.') }}</strong> dari 
                                <strong>Rp {{ number_format($project->target_dana, 0, ',', '.') }}</strong>
                            </div>
                        </div>

                        <!-- Form Investasi -->
                        <form action="{{ route('investasi.store') }}" method="POST" class="mt-3">
                            @csrf
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Pendanaan (Rp):</label>
                            <input type="number" name="jumlah_investasi" required min="1"
                                class="form-input w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-400">
                            <button type="submit" class="btn-danai mt-2 w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded transition duration-300">
                                Danai Sekarang
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    @include('components.footer')

    <script>
        function toggleDetail(id) {
            var el = document.getElementById(id);
            if (el.classList.contains('hidden')) {
                el.classList.remove('hidden');
            } else {
                el.classList.add('hidden');
            }
        }
    </script>

</body>
</html>