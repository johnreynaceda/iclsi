<?php

namespace App\Livewire\Admin\Teacher;

use App\Models\GradeLevel;
use App\Models\Shop\Product;
use App\Models\Teacher;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TeacherList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            
            ->query(Teacher::query())->headerActions([
                CreateAction::make('new')->color('success')->icon('heroicon-o-plus')->form([
                    TextInput::make('firstname')->required(),
                    TextInput::make('middlename'),
                    TextInput::make('lastname')->required(),
                    TextInput::make('phone_number')->required(),
                    TextInput::make('email')->required(),
                ])->modalWidth('xl')->action(
                    function($data){
                        $user = User::create([
                            'name' => $data['firstname'].' '.$data['lastname'],
                            'email' => $data['email'],
                            'password' => bcrypt('password'),
                            'user_type' => 'teacher', // Teacher Role ID
                        ]);

                        Teacher::create([
                            'firstname' => $data['firstname'],
                            'lastname' => $data['lastname'],
                            'middlename' => $data['middlename'],
                            'contact' => $data['phone_number'],
                            'user_id' => $user->id,
                        ]);
                    }
                )
            ])
            ->columns([
                TextColumn::make('lastname')->label('LASTNAME')->searchable(),
                TextColumn::make('firstname')->label('FIRSTNAME')->searchable(),
                TextColumn::make('middlename')->label('MIDDLENAME')->searchable(),
                TextColumn::make('user.email')->label('EMAIL')->searchable(),
                TextColumn::make('contact')->label('PHONE NUMBER')->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
               EditAction::make('edit')->color('success')
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.teacher.teacher-list');
    }
}
