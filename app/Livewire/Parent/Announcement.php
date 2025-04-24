<?php

namespace App\Livewire\Parent;

use Livewire\Component;

class Announcement extends Component
{
    public function render()
    {
        return view('livewire.parent.announcement',[
            'announs' => \App\Models\Announcement::get(),
        ]);
    }
}
