<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class DonationsComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.donations-component')->layout('layouts.dashboard');
    }
}
