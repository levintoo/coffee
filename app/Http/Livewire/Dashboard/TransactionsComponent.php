<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $transactions = Transaction::where('userid',Auth::user()->userid)
            ->where('purpose','!=','donation')
            ->orderby('transacted_at','DESC')
            ->paginate(10);

        return view('livewire.dashboard.transactions-component',['transactions' => $transactions])
            ->layout('layouts.dashboard');
    }
}
