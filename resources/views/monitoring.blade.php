<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IdeRe - Monitoring</title>

    @include('components.navbar_inovator')

    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> 

    <style>
        body {
            font-family: system-ui, sans-serif;
            margin: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 1400px;
            margin: 40px auto;
            padding: 20px;
        }

        .list-group {
          background: white;
          padding: 30px 20px;
          margin-top: -40px;
          border-radius: 10px;
          box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .list-group h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .project-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 20px;
            margin-bottom: 15px;
            border-radius: 8px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease, transform 0.2s ease;
            border-left: 4px solid transparent;
        }

        .project-item:hover {
            background-color: #e9fff7;
            border-left-color: #00CF95;
            transform: translateX(4px);
        }

        .project-photo {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .project-info {
            display: flex;
            flex-direction: column;
            min-width: 0; /* Agar teks bisa truncate */
        }

        .project-title {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 4px;
        }

        .project-meta {
            font-size: 14px;
            color: #666;
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            color: white;
        }

        .badge.open {
            background-color: #00CF95;
        }

        .badge.closed {
            background-color: #dc3545;
        }

        .project-description {
            font-size: 13px;
            color: #555;
            margin-top: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .empty-state {
            color: #777;
            font-style: italic;
        }

        .funding-progress {
            margin-top: 6px;
        }

        .progress-bar-container {
            height: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }

        .progress-bar {
            height: 100%;
            background-color: #00CF95;
            border-radius: 5px;
            text-align: right;
            padding-right: 4px;
            color: white;
            font-size: 10px;
            transition: width 0.5s ease;
        }

        .funding-details {
            font-size: 12px;
            margin-top: 4px;
            color: #555;
        }

        @media (max-width: 768px) {
            .project-photo {
                width: 40px;
                height: 40px;
            }
            .project-title {
                font-size: 14px;
            }
            .project-description {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <section class="list-group">
        <h2>Daftar Proyek</h2>

        @if($projects->isEmpty())
            <p class="empty-state">Tidak ada proyek yang tersedia.</p>
        @else
        @foreach ($projects as $project)
            @php
                $percentage = $project->target_dana > 0 
                    ? ($project->dana_terkumpul / $project->target_dana) * 100 
                    : 0;
            @endphp

            <a href="{{ route('monitoring.show', $project->id) }}" class="project-item">
                <img src="{{ asset('storage/' . $project->foto_proyek) }}"
                    alt="Foto Proyek"
                    class="project-photo"
                    onerror="this.src='{{ asset('images/default-project.png') }}'; this.onerror=null;">

                <div class="project-info">
                    <span class="project-title">{{ $project->judul }}</span>

                    <div class="project-meta">
                        <span class="badge {{ $project->status === 'open' ? 'open' : 'closed' }}">
                            {{ ucfirst($project->status) }}
                        </span>
                        <span>{{ \Carbon\Carbon::parse($project->tanggal_mulai)->format('d M Y') }}</span>
                        <span>→</span>
                        <span>{{ \Carbon\Carbon::parse($project->tanggal_berakhir)->format('d M Y') }}</span>
                    </div>

                    <div class="project-description">
                        {{ Str::limit(strip_tags($project->deskripsi), 100) }}
                    </div>

                    <div class="funding-progress">
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
            </a>
        @endforeach
        @endif
    </section>
</div>

@include('components.footer')

</body>
</html>