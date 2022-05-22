<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class SettingsComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.settings-component')->layout('layouts.dashboard');
    }
}
