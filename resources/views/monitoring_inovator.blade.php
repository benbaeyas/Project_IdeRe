<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>IdeRe - Monitoring</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script> 

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="{{ asset('css/monitoring_inovator.css') }}">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <!-- Navbar -->
    @include('components.navbar_inovator')
    <!-- Main Content -->
    <main class="flex-grow">
        <div class="container max-w-4xl mx-auto px-4 py-10 bg-white p-10 shadow-md rounded-lg my-5 mx-5">
            <section class="list-group">
                <h2 class="text-2xl font-bold mb-6">Daftar Proyek</h2>
                @if($projects->isEmpty())
                    <p class="empty-state text-center text-gray-500">Tidak ada proyek yang tersedia.</p>
                @else
                    @foreach ($projects as $project)
                        @php
                            $percentage = $project->target_dana > 0 
                                ? ($project->dana_terkumpul / $project->target_dana) * 100 
                                : 0;
                        @endphp
                        <a href="{{ route('monitoring.show', $project->id) }}" class="project-item block bg-white rounded-lg shadow-md p-4 mb-4 transition transform hover:scale-105 duration-300">
                            <div class="flex gap-4">
                                <img src="{{ asset('storage/' . $project->foto_proyek) }}"
                                    alt="Foto Proyek"
                                    class="project-photo w-32 h-32 object-cover rounded"
                                    onerror="this.onerror=null; this.src='{{ asset('images/default-project.png') }}';">
                                <div class="project-info flex-1">
                                    <span class="project-title font-bold text-lg">{{ $project->judul }}</span>
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
                                    <div class="funding-progress mt-4">
                                        <div class="progress-bar-container h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="progress-bar h-full bg-green-500 flex items-center justify-end pr-2 text-xs text-white"
                                                 style="width: {{ min($percentage, 100) }}%">
                                                {{ number_format(min($percentage, 100), 1) }}%
                                            </div>
                                        </div>
                                        <div class="funding-details mt-2 text-sm text-gray-600">
                                            <strong>Rp {{ number_format($project->dana_terkumpul, 0, ',', '.') }}</strong> dari 
                                            <strong>Rp {{ number_format($project->target_dana, 0, ',', '.') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </section>
        </div>
    </main>

    <!-- Footer -->
    @include('components.footer')
</body>
</html>