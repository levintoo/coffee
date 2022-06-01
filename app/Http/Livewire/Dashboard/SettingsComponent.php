<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class SettingsComponent extends Component
{
    public $name;
    public $username;
    public $email;
    public $phone;
    public $country;
    public $profession;
    public $description;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
        $this->email = Auth::user()->email;
        $this->phone = '0'.Auth::user()->phone;
        $this->country = Auth::user()->country;
        $this->description = Auth::user()->description;
        $this->profession = Auth::user()->profession;
    }

    public function render()
    {
        return view('livewire.dashboard.settings-component')->layout('layouts.dashboard');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,[
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'username' => 'string|max:255|unique:users',
            'phone' => 'numeric|digits_between:9,10',
            'country' => 'string|max:255',
            'description' => 'string|max:2048',
            'profession' => 'string|max:255',
        ]);
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:25|unique:users',
            'username' => 'string|max:25|unique:users',
            'phone' => 'numeric|digits_between:9,10|unique:users',
            'country' => 'string|max:255',
            'description' => 'string|max:2048',
            'profession' => 'string|max:255',
        ]);
        $updated_user = User::where(['userid' => Auth::user()->userid])->first();
//        $updated_user->phone = $this->phone;
//        $updated_user->username = $this->username;
        $updated_user->name = $this->name;
//        $updated_user->country = $this->country;
        $updated_user->description = $this->description;
        $updated_user->profession = $this->profession;
        $updated_user->save();

        $this->dispatchBrowserEvent('swal:modal',[
            'type' => "warning",
            'title'=> "yeey!",
            'text'=> "Profile has been successfully updated",
            'icon'=> "success",
            'button'=> "close",
        ]);
    }
}
