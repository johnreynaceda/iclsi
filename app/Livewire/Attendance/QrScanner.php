<?php

namespace App\Livewire\Attendance;

use Livewire\Component;

class QrScanner extends Component
{
    public $qr;
    public function render()
    {
        return view('livewire.attendance.qr-scanner');
    }
}
