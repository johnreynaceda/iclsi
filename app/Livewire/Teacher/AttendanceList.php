<?php

namespace App\Livewire\Teacher;

use App\Models\Attendance;
use App\Models\Parents;
use App\Models\Student;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AttendanceList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public $qr;
    public $is_time_out = false;

    public function table(Table $table): Table
    {
        return $table
            ->query(Attendance::query())
            ->columns([
                TextColumn::make('student')->searchable()->formatStateUsing(
                    fn($record) => $record->student->lastname . ', ' . $record->student->firstname
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
        return view('livewire.teacher.attendance-list', [
            'todays' => Attendance::whereDate('created_at', now())->orderByDesc('created_at')->get()->take(5),
        ]);
    }
    public function updatedQr()
    {

        $data = Student::where('student_identification', $this->qr)->first();

        if ($data) {
            $attendance = Attendance::where('student_id', $data->id)
                ->whereDate('created_at', now())
                ->whereNotNull('time_in')
                ->exists();

            if (!$attendance) {
                if ($this->is_time_out) {
                    Attendance::create([
                        'student_id' => $data->id,
                        'time_out' => now(),
                    ]);
                } else {
                    // Check if time is after 8:00 AM
                    if (now()->gt(now()->setTime(8, 0))) {
                        $contact = Parents::where('student_id', $data->id)->first()->contact;
                        $message = "ICLS SMS\n\nGood day! This is to inform you that your child, {$data->firstname} {$data->lastname}, has arrived late at school. Please be informed.";
                        $this->sendSms($contact, $message);
                    }

                    Attendance::create([
                        'student_id' => $data->id,
                        'time_in' => now(),
                    ]);
                }
            } else {
                $attendance = Attendance::where('student_id', $data->id)
                    ->whereDate('created_at', now())
                    ->first();

                if ($this->is_time_out) {
                    $attendance->update([
                        'time_out' => now(),
                    ]);
                } else {
                    dd('already attendance');
                }
            }
        } else {
            dd('Student not found. Please check the QR code.');
        }

        $this->qr = null;
    }

    public function sendSms($number, $message)
    {
        $ch = curl_init();
        $parameters = [
            'apikey' => '1aaad08e0678a1c60ce55ad2000be5bd', // Your API KEY
            'number' => $number,
            'message' => $message, // Encode message properly
            'sendername' => 'SEGU',
        ];

        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode !== 200) {
            \Log::error('SMS sending failed: ' . $output);
        } else {
            \Log::info('SMS sent successfully: ' . $output);
        }
    }

}
