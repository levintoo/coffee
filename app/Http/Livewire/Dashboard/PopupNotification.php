<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class PopupNotification extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
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
    public function showNoty($id)
    {
        $this->modal_id = $id;
        $modal_data = Notification::where('userid', Auth::user()->userid)->where('id', $this->modal_id)->first();
        $this->dispatchBrowserEvent('swal:modal',[
            'title' => '<span class="fs-6">'.$modal_data->title.'</span>' ,
            'html' => '<span class="fs-6">'.$modal_data->message.'</span>' ,
            'footer' => '<a href="#" wire:click.prevent="markSeenNoty('.$modal_data->id.')">close</a>',
        ]);
        $noty = Notification::where(['userid'=>Auth::user()->userid,'id'=>$id])->first();
        $noty->status = '1';
        $noty->save();
    }
}
