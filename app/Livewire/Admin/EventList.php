<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use App\Models\Shop\Product;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EventList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Event::query())->headerActions(
                [
                    CreateAction::make('new')->color('success')->icon('heroicon-o-plus')->form([
                        TextInput::make('name')->required(),
                        DatePicker::make('date_of_event')->label('Date')
                    ])->modalWidth('xl')
                ]
            )
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('date_of_event')->date(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
               DeleteAction::make('delete')
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.admin.event-list');
    }
}
