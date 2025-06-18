<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @extends('layout.app')
    <style>
        body {
            font-family: system-ui, sans-serif;
            margin: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
        }

        .project-detail-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .project-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .project-section {
            margin-bottom: 20px;
        }

        .project-section strong {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        .project-image img {
            max-width: 100%;
            width: auto;
            height: auto;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        /* Progress Bar */
        .funding-progress {
            margin-top: 10px;
        }

        .progress-bar-container {
            height: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 6px;
        }

        .progress-bar {
            height: 100%;
            background-color: #00CF95;
            width: 0%;
            transition: width 0.5s ease;
            text-align: right;
            padding-right: 4px;
            color: white;
            font-size: 10px;
        }

        .funding-details {
            font-size: 12px;
            color: #555;
        }

        /* Status Badge */
        .badge {
            display: inline-block;
            padding: 4px 8px;
            font-size: 12px;
            font-weight: bold;
            color: white;
            border-radius: 4px;
        }

        .badge-open {
            background-color: #00CF95;
        }

        .badge-closed {
            background-color: #dc3545;
        }

        /* Tombol Kembali */
        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .project-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    

    @section('content')
        <div class="container">
            <div class="project-detail-card">
                <h2 class="project-title">{{ $project->judul }}</h2>

                <!-- Deskripsi -->
                <div class="project-section">
                    <strong>Deskripsi:</strong>
                    <p>{{ $project->deskripsi }}</p>
                </div>

                <!-- Foto Proyek -->
                @if ($project->foto_proyek)
                    <div class="project-section">
                        <strong>Foto Proyek:</strong>
                        <div class="project-image">
                            <img src="{{ asset('storage/' . $project->foto_proyek) }}" 
                                alt="Foto Proyek" 
                                onerror="this.src='{{ asset('images/default-project.png') }}'; this.onerror=null;">
                        </div>
                    </div>
                @endif

                <!-- Pendanaan -->
                <div class="project-section">
                    <strong>Jumlah Dana</strong>
                    <p><strong>Target:</strong> Rp {{ number_format($project->target_dana, 0, ',', '.') }}</p>
                    <p><strong>Terkumpul:</strong> Rp {{ number_format($project->dana_terkumpul, 0, ',', '.') }}</p>

                    <!-- Progress Bar -->
                    <div class="funding-progress">
                        @php
                            $percentage = $project->target_dana > 0 
                                ? ($project->dana_terkumpul / $project->target_dana) * 100 
                                : 0;
                        @endphp

                        <div class="progress-bar-container">
                            <div class="progress-bar" style="width: {{ min($percentage, 100) }}%">
                                <span>{{ number_format(min($percentage, 100), 1) }}%</span>
                            </div>
                        </div>

                        <div class="funding-details">
                            <strong>Rp {{ number_format($project->dana_terkumpul, 0, ',', '.') }}</strong> dari 
                            <strong>Rp {{ number_format($project->target_dana, 0, ',', '.') }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Tanggal -->
                <div class="project-section">
                    <strong>Tanggal Pelaksanaan</strong>
                    <p><strong>Mulai:</strong> {{ \Carbon\Carbon::parse($project->tanggal_mulai)->format('d M Y') }}</p>
                    <p><strong>Berakhir:</strong> {{ \Carbon\Carbon::parse($project->tanggal_berakhir)->format('d M Y') }}</p>
                </div>

                <!-- Kategori -->
                <div class="project-section">
                    <strong>Kategori</strong>
                    <p>{{ $project->category->nama_kategori ?? 'Tidak ada kategori' }}</p>
                </div>

                <!-- Status Badge -->
                <div class="project-section">
                    <strong>Status</strong>
                    <span class="badge {{ $project->status === 'open' ? 'badge-open' : 'badge-closed' }}">
                        {{ ucfirst($project->status) }}
                    </span>
                </div>

                <!-- Tombol Kembali -->
                <div class="project-section">
                    <a href="{{ route('monitoring.index') }}" class="btn-back">← Kembali ke Daftar Proyek</a>
                </div>
            </div>
        </div>
    @endsection
</body>
</html>