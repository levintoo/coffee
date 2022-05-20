<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Otp as Model;
use Carbon\Carbon;

class TwoFactorComponent extends Component
{
    public $otp;

    public function mount()
    {
        if (Session::has('twofactor' . md5(Auth::user()->name . Auth::user()->email))) {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.two-factor-component')->layout('layouts.dashboard');
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
        $otp = $this->generate(Auth::user()->id);
        $response = $this->validateotps(Auth::user()->id, $otp->token);
        Session::flash('status', $response->message);

        $twofactoridentifier = ('twofactor' . md5(Auth::user()->name . Auth::user()->email));
        session()->put($twofactoridentifier, $twofactoridentifier);
        return redirect()->route('home');
    }
    protected static function getFacadeAccessor()
    {
        return 'Otp';
    }
    public function generate(string $identifier, int $digits = 4, int $validity = 10): object
    {
        Model::where('identifier', $identifier)->where('valid', true)->delete();

        $token = str_pad((new TwoFactorComponent)->generatePin(), 4, '0', STR_PAD_LEFT);

        if ($digits == 5) $token = str_pad((new TwoFactorComponent)->generatePin(5), 5, '0', STR_PAD_LEFT);

        if ($digits == 6) $token = str_pad((new TwoFactorComponent)->generatePin(6), 6, '0', STR_PAD_LEFT);

        Model::create([
            'identifier' => $identifier,
            'token' => $token,
            'validity' => $validity
        ]);

        return (object)[
            'status' => true,
            'token' => $token,
            'message' => 'OTP generated'
        ];
    }

    /**
     * @param string $identifier
     * @param string $token
     * @return mixed
     */
    public function validateotps(string $identifier, string $token): object
    {
        $otp = Model::where('identifier', $identifier)->where('token', $token)->first();

        if ($otp == null) {
            return (object)[
                'status' => false,
                'message' => 'OTP does not exist'
            ];
        } else {
            if ($otp->valid == true) {
                $carbon = new Carbon;
                $now = $carbon->now();
                $validity = $otp->created_at->addMinutes($otp->validity);

                if (strtotime($validity) < strtotime($now)) {
                    $otp->valid = false;
                    $otp->save();

                    return (object)[
                        'status' => false,
                        'message' => 'OTP Expired'
                    ];
                } else {
                    $otp->valid = false;
                    $otp->save();

                    return (object)[
                        'status' => true,
                        'message' => 'OTP is valid'
                    ];
                }
            } else {
                return (object)[
                    'status' => false,
                    'message' => 'OTP is not valid'
                ];
            }
        }
    }

    /**
     * @param int $digits
     * @return string
     */
    private function generatePin($digits = 4)
    {
        $i = 0;
        $pin = "";

        while ($i < $digits) {
            $pin .= mt_rand(0, 9);
            $i++;
        }

        return $pin;
    }
}
