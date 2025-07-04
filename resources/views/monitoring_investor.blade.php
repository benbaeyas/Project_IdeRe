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
            <h2 class="text-2xl font-bold">Daftar Proyek</h2>
        </div>

        <!-- Filter Status -->
        <!-- <div class="mb-4 flex gap-2">
            <label class="inline-flex items-center">
            <input type="checkbox" name="statusFilter" value="open" checked class="form-checkbox h-5 w-5 text-green-600">
            <span class="ml-2">Open</span>
            </label>
            <label class="inline-flex items-center">
            <input type="checkbox" name="statusFilter" value="closed" class="form-checkbox h-5 w-5 text-red-600">
            <span class="ml-2">Closed</span>
            </label>
        </div> -->

            @if ($groupedInvestments->isEmpty())
                <p class="empty-state text-center text-gray-500">Anda belum mendanai proyek apapun.</p>
            @else
                @foreach ($groupedInvestments as $projectId => $investmentsGroup)
                    @php
                        $project = $investmentsGroup->first()->project;
                        $totalInvestment = $investmentsGroup->sum('jumlah_investasi');
                        $percentage = $project->target_dana > 0 
                            ? ($totalInvestment / $project->target_dana) * 100 
                            : 0;
                    @endphp

                    <a href="{{ route('monitoring.show', $project->id) }}" class="project-item block bg-white rounded-lg shadow-md p-4 mb-4 transition transform hover:scale-105 duration-300">
                        <div class="flex gap-4 items-start">
                            <!-- Foto Proyek -->
                            <img src="{{ asset('storage/' . $project->foto_proyek) }}"
                                alt="Foto Proyek"
                                class="w-24 h-24 object-cover rounded"
                                onerror="this.onerror=null; this.src='{{ asset('images/default-project.png') }}';">

                            <!-- Info Proyek -->
                            <div class="flex-1">
                                <h3 class="font-bold text-lg">{{ $project->judul }}</h3>
                                <div class="project-meta flex items-center gap-2 mt-2 text-sm text-gray-500">
                                    <span class="badge {{ $project->status === 'open' ? 'bg-green-500' : 'bg-red-500' }} text-white px-2 py-1 rounded">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                    <span>{{ \Carbon\Carbon::parse($project->tanggal_mulai)->format('d M Y') }}</span>
                                    <span>→</span>
                                    <span>{{ \Carbon\Carbon::parse($project->tanggal_berakhir)->format('d M Y') }}</span>
                                </div>
                                <div class="project-description mt-2 text-sm text-gray-700 line-clamp-2">
                                    {{ Str::limit(strip_tags($project->deskripsi), 100) }}
                                </div>

                                <!-- Progress Dana -->
                                <div class="mt-3">
                                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                        <div class="h-full bg-green-500" style="width: {{ min($percentage, 100) }}%"></div>
                                    </div>
                                    <div class="mt-1 text-sm text-gray-600">
                                        <strong>Rp{{ number_format($totalInvestment, 0, ',', '.') }}</strong> dari 
                                        <strong>Rp{{ number_format($project->target_dana, 0, ',', '.') }}</strong>
                                    </div>
                                </div>

                                <!-- Detail Investor -->
                                <div class="mt-2 text-xs text-gray-500">
                                    Anda telah mendanai proyek ini sebanyak 
                                    <strong>{{ $investmentsGroup->count() }}</strong> kali
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </section>
    </div>
  </main>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js">
    $(document).ready(function () {
        function loadProjects() {
            const search = $('#searchInput').val();
            const statuses = [];
            $('input[name="statusFilter"]:checked').each(function () {
                statuses.push($(this).val());
            });

            $.get("{{ route('monitoring_investor') }}", { search: search, status: statuses }, function (data) {
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