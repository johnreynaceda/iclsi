<?php

namespace App\Livewire\Teacher;

use App\Models\Parents;
use App\Models\Shop\Product;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class StudentList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;



    public function table(Table $table): Table
    {
        return $table
            ->query(Student::query()->where('grade_level_id', auth()->user()->teacher->grade_level_id))->headerActions([
                    CreateAction::make('new')->label('New Student')->color('success')->icon('heroicon-o-plus')->form([
                        Grid::make(2)->schema([
                            TextInput::make('lastname')->required(),
                            TextInput::make('firstname')->required(),
                            TextInput::make('middlename'),
                            DatePicker::make('birthdate')->required(),
                            Textarea::make('address')->required()->columnSpan(2),
                            TextInput::make('contact')->required(),
                            Select::make('gender')->options([
                                'Male' => 'Male',
                                'Female' => 'Female',
                            ]),
                        ]),
                        Fieldset::make("PARENT'S INFORMATION")->schema([
                            TextInput::make('parent_lastname')->label('Lastname')->required(),
                            TextInput::make('parent_firstname')->label('Firstname')->required(),
                            TextInput::make('parent_middlename')->label('Middlename')->required(),
                            TextInput::make('parent_contact')->label('Contact'),
                        ])
                    ])->action(function ($data) {
                        $student = Student::create([
                            'student_identification' => $this->generateAlphanumericString(),
                            'lastname' => $data['lastname'],
                            'firstname' => $data['firstname'],
                            'middlename' => $data['middlename'],
                            'address' => $data['address'],
                            'birthdate' => Carbon::parse($data['birthdate']),
                            'gender' => $data['gender'],
                            'grade_level_id' => auth()->user()->teacher->grade_level_id,
                        ]);

                        $user = User::create([
                            'name' => $data['parent_firstname'] . ' ' . $data['parent_lastname'],
                            'email' => strtolower($data['parent_firstname'] . '' . $data['parent_lastname']) . '@icls.com',
                            'password' => bcrypt('password'),
                            'user_type' => 'parent',
                        ]);

                        Parents::create([
                            'firstname' => $data['parent_firstname'],
                            'lastname' => $data['parent_lastname'],
                            'middlename' => $data['parent_middlename'],
                            'contact' => $data['parent_contact'],
                            'user_id' => $user->id,
                            'student_id' => $student->id,
                        ]);

                    })
                ])
            ->columns([
                ViewColumn::make('status')->view('filament.tables.qr')->label('QR CODE'),
                TextColumn::make('id')->label('FULLNAME')->searchable()->formatStateUsing(fn($record) => strtoupper($record->lastname . ', ' . $record->firstname . ' ' . $record->middlename[0] . '.')),
                TextColumn::make('gradeLevel.name')->label('GRADE LEVEL'),
                TextColumn::make('gender')->label('GENDER'),
                TextColumn::make('birthdate')->date()->label('BIRTHDAY'),
                TextColumn::make('address')->label('ADDRESS'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                Action::make('print_qr')->label('Print QR')->icon('heroicon-o-qr-code')->button()->form([
                    ViewField::make('rating')
                        ->view('filament.forms.qr')
                ])->modalWidth('xl')->modalSubmitAction(false),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    function generateAlphanumericString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }


    public function render()
    {
        return view('livewire.teacher.student-list');
    }
}
