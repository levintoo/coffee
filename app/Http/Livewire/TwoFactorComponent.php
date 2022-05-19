<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TwoFactorComponent extends Component
{
    public $otp;

    public function mount()
    {
        if (Session::has('twofactor'. md5(Auth::user()->name . Auth::user()->email))) {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.two-factor-component')->layout('layouts.base');
    }

    public function updated($updated)
    {
        $this->validateOnly($updated, [
            'otp' => 'min:6',
        ]);
    }
    public function validateOtp()
    {
        $this->validate([
            'otp' => 'required|min:6',
        ]);
        $twofactoridentifier = ('twofactor' . md5(Auth::user()->name . Auth::user()->email));
        session()->put($twofactoridentifier, $twofactoridentifier);
        return redirect()->route('home');
    }
}
