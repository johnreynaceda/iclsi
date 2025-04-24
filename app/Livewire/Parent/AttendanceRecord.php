<?php

namespace App\Livewire\Parent;

use App\Models\Attendance;
use App\Models\Student;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AttendanceRecord extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    
    public $student_id;

    public function mount(){
        $this->student_id = Student::where('id', auth()->user()->parent->student_id)->first()->id;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Attendance::query()->where('student_id', $this->student_id))
            ->columns([
                TextColumn::make('student')->searchable()->formatStateUsing(
                    fn($record) => $record->student->lastname.', '.$record->student->firstname
                )->label('STUDENT NAME'),
                TextColumn::make('time_in')->date('h:i A')->label('TIME-IN')->searchable(),
                TextColumn::make('time_out')->date('h:i A')->label('TIME-OUT')->searchable(),
                TextColumn::make('created_at')->date()->label('DATE')->searchable()
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.parent.attendance-record');
    }
}
