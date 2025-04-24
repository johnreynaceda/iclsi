<?php

namespace App\Livewire\Admin;

use App\Models\GradeLevel;
use App\Models\Shop\Product;
use App\Models\Teacher;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class GradeLevelList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table

            ->query(GradeLevel::query())->headerActions([
                    CreateAction::make('new')->color('success')->icon('heroicon-o-plus')->form([
                        TextInput::make('name')->required(),
                    ])->modalWidth('xl')
                ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('assign')->label('Assign Teacher')->icon('heroicon-o-user-plus')->button()->color('active')->form([
                    Select::make('teacher')->options(
                        Teacher::where('grade_level_id', null)->get()->mapWithKeys(function ($record) {
                            return [$record->id => $record->firstname . ' ' . $record->lastname];
                        })
                    )->required(),
                ])->modalWidth('xl')->action(
                        function ($record, $data) {
                            $teacher = Teacher::where('id', $data['teacher'])->first();
                            $teacher->update([
                                'grade_level_id' => $record->id,
                            ]);

                            $record->update(['is_assigned' => true]);
                        }
                    )->visible(fn($record) => $record->is_assigned == false),
                ViewAction::make('view')->label('View Teacher')->button()->color('active')->form([
                    ViewField::make('teacher')
                        ->view('filament.forms.assigned_teacher')
                ])->modalWidth('xl')->modalHeading('View Assigned Teacher')->visible(fn($record) => $record->is_assigned != false),
                EditAction::make('edit')->color('success')
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.grade-level-list');
    }
}
