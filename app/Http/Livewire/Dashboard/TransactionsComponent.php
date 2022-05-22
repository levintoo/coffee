<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class TransactionsComponent extends Component
{
    public function render()
    {
        return view('livewire.dashboard.transactions-component')->layout('layouts.dashboard');
    }
}
