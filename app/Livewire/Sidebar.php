<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        return view('livewire.sidebar',[
            'events' => Event::get()->take(2),
        ]);
    }
}
