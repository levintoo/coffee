<?php

namespace App\Http\Livewire\Dashboard;

use App\Mail\OtpMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DashboardComponent extends Component
{
    public $mail;
    public function render()
    {
        return view('livewire.dashboard.dashboard-component')->layout('layouts.dashboard');
    }
    public function sendMail()
    {
        Mail::to(Auth::user()->email)->send(new OtpMail());
        session::flash('status','sent sucessfully');
    }
}
