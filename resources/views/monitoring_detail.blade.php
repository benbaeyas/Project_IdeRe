<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Detail Proyek</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">    

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>    

    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="{{ asset('css/monitoring_inovator_detail.css') }}">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Main Content -->
    <main class="flex-grow">
        <div class="container max-w-4xl mx-auto px-4 py-10">
            <div class="project-detail-card bg-white rounded-xl shadow-md p-8 mb-6">
                <!-- Tombol Kembali -->

                @php
                    $role = Auth::user()->role ?? '';
                @endphp
                <div class="project-section mb-6">
                    @if ($role === 'investor')
                        <a href="{{ route('monitoring_investor') }}" class="btn-back inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition duration-300">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    @elseif ($role === 'inovator')
                        <a href="{{ route('monitoring_inovator') }}" class="btn-back inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition duration-300">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    @else
                        <a href="{{ route('home') }}" class="btn-back inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition duration-300">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    @endif
                </div>

                <!-- Judul -->
                <h2 class="project-title text-3xl font-bold text-gray-900 mb-6">{{ $project->judul }}</h2>

                <!-- Deskripsi -->
                <div class="project-section mb-6">
                    <strong class="block text-base font-semibold text-gray-700 mb-2">Deskripsi:</strong>
                    <p class="text-gray-800 leading-relaxed text-lg">{{ $project->deskripsi }}</p>
                </div>

                <!-- Foto Proyek -->
                @if ($project->foto_proyek)
                    <div class="project-section mb-6">
                        <strong class="block text-base font-semibold text-gray-700 mb-2">Foto Proyek:</strong>
                        <div class="project-image overflow-hidden rounded-lg shadow-sm max-w-md">
                            <img src="{{ asset('storage/' . $project->foto_proyek) }}"
                                 alt="Foto Proyek"
                                 class="w-full h-auto object-cover transform transition duration-300 hover:scale-105"
                                 onerror="this.onerror=null; this.src='{{ asset('images/default-project.png') }}';">
                        </div>
                    </div>
                @endif

                <!-- Pendanaan -->
                <div class="project-section mb-6">
                    <strong class="block text-base font-semibold text-gray-700 mb-2">Jumlah Dana</strong>
                    <p class="text-gray-800 text-lg"><strong class="font-medium">Target:</strong> Rp {{ number_format($project->target_dana, 0, ',', '.') }}</p>
                    <p class="text-gray-800 text-lg"><strong class="font-medium">Terkumpul:</strong> Rp {{ number_format($project->dana_terkumpul, 0, ',', '.') }}</p>

                    <!-- Progress Bar -->
                    @php
                        $percentage = $project->target_dana > 0 
                            ? ($project->dana_terkumpul / $project->target_dana) * 100 
                            : 0;
                    @endphp

                    <div class="funding-progress mt-4">
                        <div class="progress-bar-container h-3 bg-gray-200 rounded-full overflow-hidden">
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

                <!-- Tanggal -->
                <div class="project-section mb-6">
                    <strong class="block text-base font-semibold text-gray-700 mb-2">Tanggal Pelaksanaan</strong>
                    <p class="text-gray-800 text-lg"><strong class="font-medium">Mulai:</strong> {{ \Carbon\Carbon::parse($project->tanggal_mulai)->format('d M Y') }}</p>
                    <p class="text-gray-800 text-lg"><strong class="font-medium">Berakhir:</strong> {{ \Carbon\Carbon::parse($project->tanggal_berakhir)->format('d M Y') }}</p>
                </div>

                <!-- Kategori -->
                <div class="project-section mb-6">
                    <strong class="block text-base font-semibold text-gray-700 mb-2">Kategori</strong>
                    <p class="text-gray-800 text-lg">{{ $project->category->nama_kategori ?? 'Tidak ada kategori' }}</p>
                </div>

                <!-- Status Badge -->
                <div class="project-section">
                    <strong class="block text-base font-semibold text-gray-700 mb-2">Status</strong>
                    <span class="badge {{ $project->status === 'open' ? 'badge-open' : 'badge-closed' }} inline-block px-4 py-2 text-sm font-bold text-white rounded">
                        {{ ucfirst($project->status) }}
                    </span>
                </div>
            </div>
        </div>
    </main>
</body>
</html>