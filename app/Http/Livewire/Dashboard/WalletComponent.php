<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
use App\Models\Wallet;
use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WalletComponent extends Component
{
    public function mount()
    {
        //
    }
    public function render()
    {
        $todayearning = Transaction::whereDay('created_at','=',Carbon::now()->day)->where('userid','=',Auth::user()->userid)->where('type','=','credit')->get();
    $todaysearning = 0;
    foreach ($todayearning as $todayearning) {
        $todaysearning = $todaysearning + $todayearning->amount;
    }

    $todaywithdrawal = Transaction::whereDay('created_at','=',Carbon::now()->day)->where('userid','=',Auth::user()->userid)->where('type','=','debit')->get();
    $todayswithdrawal = 0;
    foreach ($todaywithdrawal as $todaywithdrawal) {
        $todayswithdrawal = $todayswithdrawal + $todaywithdrawal->amount;
    }

    $withdrawals = Transaction::where('userid','=',Auth::user()->userid)->where('type','=','debit')->get();
    $withdrawal = 0;
    foreach ($withdrawals as $withdrawals) {
        $withdrawal = $withdrawal + $withdrawals->amount;
    }

    $yesterdayearning = Transaction::where('userid','=',Auth::user()->userid)->whereDate('created_at','=',Carbon::yesterday())->where('type','=','credit')->get();
    $yesterdaysearning = 0;
    foreach ($yesterdayearning as $yesterdayearning) {
        $yesterdaysearning = $yesterdaysearning + $yesterdayearning->amount;
    }
         if($todaysearning<$yesterdaysearning){
             $thanyesterdayamount = $yesterdaysearning - $todaysearning;
             if ($todaysearning<1){
                 $thanyesterdaypercent = 0;
             }else{
                 $thanyesterdaypercent = $yesterdaysearning / $todaysearning * 100;
             }

         }elseif($todaysearning>$yesterdaysearning){
             $thanyesterdayamount = $todaysearning - $yesterdaysearning;
             if($yesterdaysearning<1){
                 $thanyesterdaypercent = 0;
             }else{
                 $thanyesterdaypercent = $todaysearning / $yesterdaysearning * 100;
             }

         }else{
             $thanyesterdayamount = 0;
             $thanyesterdaypercent = 0;
         }
        $wallet = Wallet::where('userid',Auth::user()->userid)->first();
        return view('livewire.dashboard.wallet-component',
        [
            'wallet' => $wallet->balance,
            'todaysearning'=>$todaysearning,
            'todayswithdrawal'=>$todayswithdrawal,
            'withdrawal'=>$withdrawal,
            'yesterdaysearning'=>$yesterdaysearning,
            'thanyesterdayamount'=>$thanyesterdayamount,
            'thanyesterdaypercent'=>$thanyesterdaypercent
            ])->layout('layouts.dashboard');
    }
}
