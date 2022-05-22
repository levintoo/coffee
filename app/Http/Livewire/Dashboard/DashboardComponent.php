<?php

namespace App\Http\Livewire\Dashboard;

use App\Mail\OtpMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.dashboard-component')->layout('layouts.dashboard');
    }
}
