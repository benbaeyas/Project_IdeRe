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