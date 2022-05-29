<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NotificationsComponent extends Component
{
    public $modal_title;
    public $modal_message;
    public $modal_id;
    public $modal_data;
    public $notifications;

    public function mount()
    {
        $modal_data = Notification::where('userid', Auth::user()->userid)->inrandomorder()->first();
        $this->modal_data = $modal_data;
        $this->modal_title = $modal_data->title;
        $this->modal_message = $modal_data->message;
    }

    public function render()
    {
        $this->notifications = Notification::where('userid', Auth::user()->userid)->orderby('created_at', 'DESC')->get();
        return view('livewire.dashboard.notifications-component')->layout('layouts.dashboard');
    }

    public function setModalTitle($id)
    {
        $this->modal_id = $id;
        $this->modal_data = Notification::where('userid', Auth::user()->userid)->where('id', $this->modal_id)->first();
    }

}
