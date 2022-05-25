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

    $todaywithdrawal = Transaction::whereDay('created_at','=',Carbon::now()->day)->where('userid','=',Auth::user()->userid)->where('type','=','debit')->where('purpose','=','withdrawal')->get();
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

    public $mpesa_amount;
    public $mpesa_number;
    public $paypal_amount;
    public $paypal_email;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,[
            'mpesa_amount' => 'required|numeric|min:100',
            'mpesa_number' => 'required|regex:/^[0-9]+$/|min:9|max:10',
            'paypal_amount' => 'required|numeric|min:100',
            'paypal_email' => 'required|string|email',
        ]);
    }

    public function withdrawMpesa()
    {
        $this->validate([
            'mpesa_amount' => 'required|numeric|min:100',
            'mpesa_number' => 'required|regex:/^[0-9]+$/|min:9|max:10',
        ]);
        session::flash('status','Initiated transaction');
        $wallet = Wallet::where('userid',Auth::user()->userid)->first();
        if($wallet->balance > $this->paypal_amount || $wallet->balance == $this->paypal_amount)
        {
            $new_walletamount = $wallet->balance - $this->mpesa_amount;
            $new_wallet = Wallet::where('userid',Auth::user()->userid)->update([
                'balance' => $new_walletamount,
                'prev_balance' => $wallet->balance,
            ]);
            $transaction = Transaction::create([
                'userid' => Auth::user()->userid,
                'transaction_id' => "ASDASGAF!@#",
                'purpose' => 'withdrawal',
                'mode_of_payment' => 'mpesa',
                'amount' => $this->mpesa_amount,
                'transacted_at' => Carbon::now(),
                'status' => '2',
                'type' => 'debit',
            ]);
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => "warning",
                'title'=> "Good job!",
                'text'=> "You successfully have withdrawn $$this->mpesa_amount to $this->mpesa_number!",
                'icon'=> "success",
                'button'=> "close!",
            ]);
        }
        else{
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => "warning",
                'title'=> "Oops!",
                'text'=> "Your wallet balance is too low to complete this transaction!",
                'icon'=> "warning",
                'button'=> "close!",
            ]);
        }
    }

    public function withdrawPaypal()
    {
        $this->validate([
            'paypal_amount' => 'required|numeric|min:100',
            'paypal_email' => 'required|string|email',
        ]);
        session::flash('status','Initiated transaction');
        $wallet = Wallet::where('userid',Auth::user()->userid)->first();
        if($wallet->balance > $this->paypal_amount || $wallet->balance == $this->paypal_amount)
        {
            $new_walletamount = $wallet->balance - $this->paypal_amount;
            $new_wallet = Wallet::where('userid',Auth::user()->userid)->update([
                'balance' => $new_walletamount,
                'prev_balance' => $wallet->balance,
            ]);
            $transaction = Transaction::create([
                'userid' => Auth::user()->userid,
                'transaction_id' => "ASPPPSGAF!@#",
                'purpose' => 'withdrawal',
                'mode_of_payment' => 'paypal',
                'amount' => $this->paypal_amount,
                'transacted_at' => Carbon::now(),
                'status' => '2',
                'type' => 'debit',
            ]);
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => "warning",
                'title'=> "Good job!",
                'text'=> "You successfully have withdrawn $$this->paypal_amount to $this->paypal_email!",
                'icon'=> "success",
                'button'=> "close!",
            ]);
        }else
        {
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => "warning",
                'title'=> "Oops!",
                'text'=> "Your wallet balance is too low to complete this transaction!",
                'icon'=> "warning",
                'button'=> "close!",
            ]);
        }
    }
}
