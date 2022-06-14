<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SidebarNotificationCount extends Component
{
    protected $listeners = [
        '$refresh'
    ];

    public function render()
    {
        $notifications_count = Notification::where('userid',Auth::user()->userid)
            ->where('status' ,'=', '0')
            ->count();
        return view('livewire.dashboard.sidebar-notification-count',['notifications_count' => $notifications_count]);
    }
}
