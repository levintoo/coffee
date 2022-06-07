<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TopBarNotificationCount extends Component
{
    public $notifications_count;

    public function mount()
    {
        $this->notifications_count = Notification::where('userid',Auth::user()->userid)
            ->where('status' ,'=', '0')
            ->count();
    }

    public function render()
    {
        return view('livewire.dashboard.top-bar-notification-count');
    }
}
