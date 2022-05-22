<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class NotificationsComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.notifications-component')->layout('layouts.dashboard');
    }
}
