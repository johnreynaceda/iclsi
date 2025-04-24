<?php

namespace App\Livewire\Teacher;

use App\Models\Announcement;
use App\Models\Post;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AnnouncementList extends Component implements HasForms
{
    use InteractsWithForms;

    public $openModal = false;
    public $image = [];
    public $title;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                FileUpload::make('image')
                // ...
            ]);
    }

    public function submitAnnouncement(){
        foreach ($this->image as $key => $value) {
            Announcement::create([
                'title' => $this->title,
                'image_path' => $value->store('Announcement', 'public'),
            ]);
        }
        $this->openModal = false;
    }
    
    public function render()
    {
        return view('livewire.teacher.announcement-list',[
            'announcements' => Announcement::all()
        ]);
    }
}
