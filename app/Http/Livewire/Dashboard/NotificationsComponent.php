<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationsComponent extends Component
{
    public $notifications;
    public function render()
    {
        $this->notifications = Notification::where('userid',Auth::user()->userid)->orderby('created_at','DESC')->get();
        return view('livewire.dashboard.notifications-component')->layout('layouts.dashboard');
    }
}
