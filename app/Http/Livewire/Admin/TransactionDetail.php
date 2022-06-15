<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class TransactionDetail extends Component
{
    public function mount()
    {
       $this->middleware(['role:admin']);
    }
    public function render()
    {
        return view('livewire.admin.transaction-detail')->layout('layouts.dashboard');
    }
}
