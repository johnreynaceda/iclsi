<?php

namespace App\Livewire\Admin;

use App\Models\GradeLevel;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;


class StudentInfo extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Student::query())->columns([
                    TextColumn::make('id')->label('FULLNAME')->searchable()->formatStateUsing(fn($record) => strtoupper($record->lastname . ', ' . $record->firstname . ' ' . $record->middlename[0] . '.')),
                    TextColumn::make('gradeLevel.name')->label('GRADE LEVEL'),
                    TextColumn::make('gender')->label('GENDER'),
                    TextColumn::make('birthdate')->date()->label('BIRTHDAY'),
                    TextColumn::make('address')->label('ADDRESS'),
                ])
            ->filters([
                SelectFilter::make('grade_level_id')->label('GRADE LEVEL')->options(
                    GradeLevel::all()->pluck('name', 'id')
                )
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
        return view('livewire.admin.student-info');
    }
}
