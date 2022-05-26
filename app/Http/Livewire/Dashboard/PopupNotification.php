<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class PopupNotification extends Component
{
    public $notifications_count;
    public function render()
    {
        $notification = Notification::where('userid',Auth::user()->userid)->where('status' ,'=', '0')->orderby('created_at','DESC')->limit(5)->get();
        $this->notifications_count = Notification::where('userid',Auth::user()->userid)->where('status' ,'=', '0')->count();
        return view('livewire.dashboard.popup-notification',['notifications' => $notification]);
    }
    public function markSeenNoty($id)
    {
        $noty = Notification::where(['userid'=>Auth::user()->userid,'id'=>$id])->first();
        $noty->status = '1';
        $noty->save();
    }
}
