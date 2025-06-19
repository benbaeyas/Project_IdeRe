<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>IdeRe - Monitoring Investor</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script> 

  <!-- CSS Eksternal -->
  <link rel="stylesheet" href="{{ asset('css/monitoring_inovator.css') }}">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

  <!-- Navbar Investor -->
  @include('components.navbar_investor')

  <!-- Main Content -->
  <main class="flex-grow">
    <div class="container max-w-4xl mx-auto px-4 py-10 bg-white p-10 shadow-md rounded-lg my-5 mx-5">
        <section class="list-group">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Daftar Proyek yang Dapat Dimonitor</h2>

            <!-- Search Box -->
            <div class="relative w-64">
            <input type="text" id="searchInput" placeholder="Cari proyek..." 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ request('search') }}">
            </div>
        </div>

        <!-- Filter Status -->
        <div class="mb-4 flex gap-2">
            <label class="inline-flex items-center">
            <input type="checkbox" name="statusFilter" value="open" checked class="form-checkbox h-5 w-5 text-green-600">
            <span class="ml-2">Open</span>
            </label>
            <label class="inline-flex items-center">
            <input type="checkbox" name="statusFilter" value="closed" class="form-checkbox h-5 w-5 text-red-600">
            <span class="ml-2">Closed</span>
            </label>
        </div>

        <!-- Projects List -->
        <div id="projectList">
            @include('partials.projects_list', ['projects' => $projects])
        </div>
        </section>
    </div>
  </main>

      <!-- Riwayat Pendanaan Anda -->
    <section class="chart-section bg-white p-10 shadow-md rounded-lg my-5 mx-5">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-6">Riwayat Pendanaan Anda</h2>
        <div class="investment-list space-y-4">
            @foreach ($investments as $investment)
                <div class="investment-card bg-white p-4 rounded-lg shadow-sm">
                    <h3 class="font-semibold text-base">{{ $investment->project->judul }}</h3>
                    <p>Jumlah: Rp {{ number_format($investment->jumlah_investasi, 0, ',', '.') }}</p>
                    <p>Tanggal: {{ $investment->tanggal_investasi }}</p>
                    
                    @if($investment->project->dana_terkumpul >= $investment->project->target_dana)
                        <form action="{{ route('investment.destroy', $investment) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pendanaan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete mt-3 px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded text-sm transition duration-300">
                                Hapus Pendanaan
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script>
    $(document).ready(function () {
        function loadProjects() {
            const search = $('#searchInput').val();
            const statuses = [];
            $('input[name="statusFilter"]:checked').each(function () {
                statuses.push($(this).val());
            });

            $.get("{{ route('monitoring.index') }}", { search: search, status: statuses }, function (data) {
                $('#projectList').html(data);
            });
        }

        // Trigger saat pencarian atau filter berubah
        $('#searchInput, input[name="statusFilter"]').on('change keyup', function () {
            loadProjects();
        });

        // Load awal
        loadProjects();
    });
    </script>

  <!-- Footer -->
  @include('components.footer')
</body>
</html>