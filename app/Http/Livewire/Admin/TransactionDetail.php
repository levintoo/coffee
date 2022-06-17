<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TransactionDetail extends Component
{
    public function mount()
    {
        $user = Auth::user();
        $user->hasRole(['admin', 'super-admin']);
    }
    public function render()
    {
        return view('livewire.admin.transaction-detail')->layout('layouts.dashboard');
    }
}
