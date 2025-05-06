<?php
namespace App\Livewire\Admin;

use App\Models\Attendance;
use App\Models\Event;
use App\Models\GradeLevel;
use Livewire\Component;

class Report extends Component
{
    public $filter;

    public $grade_level_id;
    public $date;

    public function render()
    {
        return view('livewire.admin.report', [
            'gradeLevels' => GradeLevel::all(),
            'attendances' => Attendance::when($this->grade_level_id, function ($record) {
                $record->whereHas('student', function ($query) {
                    $query->where('grade_level_id', $this->grade_level_id);
                });
            })->when($this->date, function ($query) {
                $query->whereDate('created_at', $this->date);
            })->get(),
            'activities' => Event::all(),
            'lates' => Attendance::whereTime('time_in', '>', '08:00:00')
                ->get(),
        ]);
    }
}
