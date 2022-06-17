<?php

namespace App\Http\Livewire;

use App\Models\Donation;
use App\Models\Notification;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Donate extends Component
{
    public $input_name;
    public $input_message;
    public $name;
    public $other_amount;
    public $payment_method;
    public function mount($username)
    {
        $this->name = $username;
    }
    public function render()
    {
        $user = User::where('username',$this->name)->first();
        if(empty($user))
        {
            abort(404);
        }
        return view('livewire.donate',['user'=>  $user])->layout('layouts.guest');
    }

    protected $messages = [
        'payment_method.required' => 'Please select your preferred method of payment.',
        'other_amount.required' => 'The amount field is required.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,[
            'other_amount' => 'required|numeric|min:100',
            'payment_method' => 'required|string|max:10',
            'input_name' => 'string|max:255',
            'input_message' => 'string|max:2550',
        ]);
    }

    public function donate()
    {
        $this->validate([
            'other_amount' => 'required|numeric|min:100',
            'payment_method' => 'required|string|max:10',
            'input_name' => 'string|max:255',
            'input_message' => 'string|max:2550',
        ]);
        if($this->payment_method == "mpesa")
        {
            $this->donateMpesa();
        }
        else if($this->payment_method == "paypal")
        {
            $this->donatePaypal();
        }
        else
        {
            session::flash('status',"please input the payment method");
        }
    }

    public function donateMpesa()
    {
        $this->validate([
            'other_amount' => 'required|numeric|min:100',
            'payment_method' => 'required|string|max:10',
            'input_name' => 'string|max:255',
            'input_message' => 'string|max:2550',
        ]);
        $user = User::where('username',$this->name)->select('phone','email','userid')->first();
        if(empty($user))
        {
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => "warning",
                'title'=> "Oops!",
                'text'=> "An unexpected error occurred, please check the username and try again!",
                'icon'=> "warning",
                'button'=> "close",
            ]);
        }
        else
        {
        $wallet = Wallet::select('balance','userid')->where('userid',$user->userid)->first();
        if(empty($wallet))
        {
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => "warning",
                'title'=> "Oops!",
                'text'=> "An unexpected error occurred!",
                'icon'=> "warning",
                'button'=> "close",
            ]);
        }
        else{
            $new_walletamount = $wallet->balance + $this->other_amount;
            $transaction = Transaction::create([
                'userid' => $user->userid,
                'transaction_id' => "ASDASGAF!@#",
                'purpose' => 'donation',
                'mode_of_payment' => 'mpesa',
                'amount' => $this->other_amount,
                'transacted_at' => Carbon::now(),
                'status' => '2',
                'type' => 'credit',
                'received_by' => $user->phone,
            ]);
            $new_wallet = Wallet::where('userid',$user->userid)->update([
                'balance' => $new_walletamount,
                'prev_balance' => $wallet->balance,
            ]);
            $donation = Donation::create([
                'userid' => $user->userid,
                'transaction_id' => 'ASDASGAF!@#',
                'mode_of_payment' => $this->payment_method,
                'amount' => $this->other_amount,
                'donated_at' => Carbon::now(),
                'name' => $this->input_name,
                'message' => $this->input_message,
                'status' => '2',
            ]);
            $noty = Notification::create([
                'userid' => $user->userid,
                'title' => 'Donation',
                'message' => 'You have a donation',
                'status' => '0',
            ]);
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => "warning",
                'title'=> "Good job!",
                'text'=> "You successfully donated $$this->other_amount to $this->name!",
                'icon'=> "success",
                'button'=> "close!",
            ]);
        }
    }

    }
    public function donatePaypal()
    {
        $this->validate([
            'other_amount' => 'required|numeric|min:100',
            'payment_method' => 'required|string|max:10',
            'input_name' => 'string|max:255',
            'input_message' => 'string|max:2550',
        ]);
        $user = User::where('username',$this->name)->select('phone','email','userid')->first();
        if(empty($user))
        {
            $this->dispatchBrowserEvent('swal:modal',[
                'type' => "warning",
                'title'=> "Oops!",
                'text'=> "An unexpected error occurred, please check the username and try again!",
                'icon'=> "warning",
                'button'=> "close",
            ]);
        }
        else
        {
            $wallet = Wallet::select('balance','userid')->where('userid',$user->userid)->first();
            if(empty($wallet))
            {
                $this->dispatchBrowserEvent('swal:modal',[
                    'type' => "warning",
                    'title'=> "Oops!",
                    'text'=> "An unexpected error occurred!",
                    'icon'=> "warning",
                    'button'=> "close",
                ]);
            }
            else{
                $new_walletamount = $wallet->balance + $this->other_amount;
                $transaction = Transaction::create([
                    'userid' => $user->userid,
                    'transaction_id' => "ASPPPPF!@#",
                    'purpose' => 'donation',
                    'mode_of_payment' => 'paypal',
                    'amount' => $this->other_amount,
                    'transacted_at' => Carbon::now(),
                    'status' => '2',
                    'type' => 'credit',
                    'received_by' => $user->phone,
                ]);
                $new_wallet = Wallet::where('userid',$user->userid)->update([
                    'balance' => $new_walletamount,
                    'prev_balance' => $wallet->balance,
                ]);
                $donation = Donation::create([
                    'userid' => $user->userid,
                    'transaction_id' => "ASPPPPF!@#",
                    'mode_of_payment' => $this->payment_method,
                    'amount' => $this->other_amount,
                    'donated_at' => Carbon::now(),
                    'status' => '2',
                    'name' => $this->input_name,
                    'message' => $this->input_message,
                ]);
                $noty = Notification::create([
                    'userid' => $user->userid,
                    'title' => 'Donation',
                    'message' => 'You have a donation',
                    'status' => '0',
                ]);
                $this->dispatchBrowserEvent('swal:modal',[
                    'type' => "warning",
                    'title'=> "Good job!",
                    'text'=> "You successfully donated $$this->other_amount to $this->name!",
                    'icon'=> "success",
                    'button'=> "close!",
                ]);
            }
        }

    }
}
