<?php
namespace App\Livewire;

use App\Models\GradeLevel;
use Livewire\Component;

class AdminDashboard extends Component
{
    public $chartData;

    public function mount()
    {
        $grades = GradeLevel::with(['students'])->get();

        $labels = $grades->pluck('name'); // Assuming 'name' is the grade level name
        $enrolled = $grades->map(fn($grade) => $grade->students->count());

        $attendance = $grades->map(fn($grade) => $grade->students->map(fn($student) => $student->attendances->count())->sum());

        $drop = $grades->map(fn($grade) => $grade->students->map(fn($student) => $student->where('status', 'drop')->count())->sum());

        $this->chartData = [
            'labels' => $labels,
            'datasets' => [
                ['label' => 'Enrolled', 'data' => $enrolled, 'backgroundColor' => 'rgba(75, 192, 192, 0.6)', 'borderColor' => 'rgba(75, 192, 192, 1)'],
                ['label' => 'Attendance', 'data' => $attendance, 'backgroundColor' => 'rgba(54, 162, 235, 0.6)', 'borderColor' => 'rgba(54, 162, 235, 1)'],
            ],
        ];
    }

    public function render()
    {
        return view('livewire.admin-dashboard');
    }
}
