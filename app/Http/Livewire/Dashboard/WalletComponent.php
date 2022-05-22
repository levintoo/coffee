<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WalletComponent extends Component
{
    public function mount()
    {
        //
    }
    public function render()
    {
        $wallet = Wallet::where(Auth::user()->userid)->first();
        return view('livewire.dashboard.wallet-component',['wallet' => $wallet])->layout('layouts.dashboard');
    }
}
