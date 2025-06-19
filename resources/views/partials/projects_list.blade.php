@if($projects->isEmpty())
  <p class="empty-state text-center text-gray-500">Tidak ada proyek tersedia.</p>
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
              <div class="progress-bar h-full bg-green-500" style="width: {{ min($percentage, 100) }}%"></div>
            </div>
            <div class="funding-details mt-2 text-sm text-gray-600">
              <strong>Rp {{ number_format($project->dana_terkumpul, 0, ',', '.') }}</strong> dari 
              <strong>Rp {{ number_format($project->target_dana, 0, ',', '.') }}</strong>
            </div>
          </div>
          <button class="mt-4 inline-block bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded">
            Lihat Detail Monitoring
          </button>
        </div>
      </div>
    </a>
  @endforeach
@endif