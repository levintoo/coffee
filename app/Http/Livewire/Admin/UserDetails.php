<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserDetails extends Component
{
    public $username;
    public $role;
    public function mount($username)
    {
        $user = User::select('username')->where('username',$username)->first();
        if(empty($user))
        {
            abort(404);
        }
        $this->username = $username;
    }
    public function render()
    {
        $user = User::where('username',$this->username)->first();
        $this->role = $user->getRoleNames();
        return view('livewire.admin.user-details',['user' => $user])->layout('layouts.dashboard');
    }
}
