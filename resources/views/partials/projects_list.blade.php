@if ($projects->isNotEmpty())
    @foreach ($projects as $project)
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
                        // Hitung total investasi dengan fallback
                        $totalInvestment = $project->investments?->sum('jumlah_investasi') ?? 0;

                        // Hitung persentase
                        $percentage = $project->target_dana > 0 && $project->target_dana != 0
                            ? ($totalInvestment / $project->target_dana) * 100
                            : 0;
                    @endphp

                    <div class="progress-bar-container h-2 bg-gray-200 rounded-full overflow-hidden">
                        <div class="progress-bar h-full bg-green-500" style="width: {{ min($percentage, 100) }}%"></div>
                    </div>

                    <div class="funding-details text-xs text-gray-600 mt-1">
                        <strong>Rp{{ number_format($totalInvestment, 0, ',', '.') }}</strong> dari 
                        <strong>Rp{{ number_format($project->target_dana ?? 0, 0, ',', '.') }}</strong>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <strong class="font-bold">Ups! Ada kesalahan:</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Investasi -->
                <form action="{{ route('investasi.store') }}" method="POST" class="mt-3">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Pendanaan (Rp):</label>

                    <!-- Input Format Rupiah -->
                    <input type="text" required
                        class="form-input w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-400"
                        oninput="formatRupiahAndSync(this, {{ $project->id }})"
                        placeholder="Contoh: 1.000.000">

                    <!-- Hidden input unik per proyek -->
                    <input type="hidden" id="target_dana_hidden_{{ $project->id }}" name="jumlah_investasi">                            
                    <button type="submit" class="btn-danai mt-2 w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded transition duration-300">
                        Danai Sekarang
                    </button>
                </form>
            </div>
        </div>
    @endforeach
@else
    <p class="text-center text-gray-500 py-4">Tidak ada proyek ditemukan.</p>
@endif