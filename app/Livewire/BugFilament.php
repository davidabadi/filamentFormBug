<?php

namespace App\Livewire;

use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class BugFilament extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('users')
                    ->options([
                        1 => 'Test',
                        2 => 'Test 2',
                        3 => 'Test 3'
                    ])
                    ->multiple()
                    ->disabled(fn(Get $get) => $get('select_all')),
                Toggle::make('select_all')
                    ->live(onBlur: true)
            ])
            ->statePath('data')
            ->model(User::class);
    }

    public function create(): void
    {
    }

    public function render(): View
    {
        return view('livewire.bug');
    }
}