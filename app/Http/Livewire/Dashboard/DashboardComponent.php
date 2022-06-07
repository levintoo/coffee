<?php

namespace App\Http\Livewire\Dashboard;

use App\Mail\OtpMail;
use App\Models\Transaction;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $todayearning = Transaction::whereDay('created_at','=',Carbon::now()->day)
            ->where('userid','=',Auth::user()->userid)
            ->where('type','=','credit')
            ->get();
        $todaysearning = 0;
        foreach ($todayearning as $todayearning) {
            $todaysearning = $todaysearning + $todayearning->amount;
        }

        $transactions = Transaction::where('userid',Auth::user()->userid)
            ->where('purpose','!=','donation')
            ->orderby('transacted_at','DESC')
            ->limit(5)
            ->get();
        $wallet = Wallet::where('userid',Auth::user()->userid)
            ->first();

        return view('livewire.dashboard.dashboard-component',['transactions' => $transactions, 'wallet' => $wallet->balance,'todaysearning' => $todaysearning])->layout('layouts.dashboard');
    }
}
