<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Investment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; 

class InvestmentChart extends Component
{
    public $year;
    public $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    public $data = [];

    public $project = [];

    public $investment = [];

    public function mount()
    {
        $this->year = date('Y'); // Default tahun ini
        $this->loadData();
        $this->projects = Project::with('category')->get();
        $this->investments = Investment::with('project')->where('user_id', Auth::id())->get();
    }

    public function updatedYear()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $results = DB::table('investments')
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(jumlah_investasi) as total')
            )
            ->whereYear('created_at', $this->year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = array_fill(1, 12, 0); // default 0 untuk semua bulan

        foreach ($results as $row) {
            $months[$row->month] = $row->total;
        }

        $this->data = array_values($months);

        // Kirim event ke frontend agar chart update
        $this->dispatch('updateChart', labels: $this->labels, data: $this->data);
    }

    public function render()
    {
        
        return view('livewire.investment-chart', [
        'projects' => $this->projects,
        'investments' => $this->investments
        ]);
    }
}