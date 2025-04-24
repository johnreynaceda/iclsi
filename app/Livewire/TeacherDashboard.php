<?php
namespace App\Livewire;

use App\Models\Attendance;
use App\Models\Student;
use Livewire\Component;

class TeacherDashboard extends Component
{

    public $label;
    public $chartData = [];

    public function mount()
    {
        $this->label = auth()->user()->teacher->gradeLevel->name;
        $attendance = Attendance::whereHas('student', function ($record) {
            $record->where('grade_level_id', auth()->user()->teacher->grade_level_id);
        })->count();
        $drop = Student::where('grade_level_id', auth()->user()->teacher->grade_level_id)->where('status', 'drop')->count();
        $enrollee = Student::all()->count();
        $this->chartData = [
            'labels' => ['Attendance', 'Enrollee'],
            'datasets' => [
                [
                    'label' => $this->label,
                    'backgroundColor' => ['#3490dc', '#f66d9b', '#38c172'],
                    'data' => [$attendance, $enrollee],
                ],
            ],
        ];
    }
    public function render()
    {
        return view('livewire.teacher-dashboard', [
            'students' => Student::where('grade_level_id', auth()->user()->teacher->grade_level_id)->get(),
            'attendances' => Attendance::whereHas('student', function ($record) {
                $record->where('grade_level_id', auth()->user()->teacher->grade_level_id);
            })->whereDate('created_at', now())->get(),

        ]);
    }
}
