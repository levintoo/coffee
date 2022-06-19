<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Otp as Model;
use Carbon\Carbon;
class Helper
{
    // id generator
    public function generateID($model, $trow, $length = 4, $prefix){
        $data = $model::orderBy('id','desc')->first();
        if(!$data){
            $og_length = $length;
            $last_number ='';
        }else{
            $code = substr($data->$trow,strlen($prefix)+1);
            $actial_last_number = ($code/1)*1;
            $increment_last_number = $actial_last_number+1;
            $last_number_length = strlen($increment_last_number);
            $og_length= $length-$last_number_length;
            $last_number= $increment_last_number;
        }
        $zeros = '';
        for($i=0;$i<$og_length;$i++){
            $zeros.='0';
        }
        return $prefix.'-'.$zeros.$last_number;
    }

    // otp functions
    public function validateOtp()
    {
        $this->validate([
            'otp' => 'required|numeric|min:4',
        ]);
        $response = $this->validateotps(Auth::user()->id, $this->otp);

        if ($response->status == "true") {
            $twofactoridentifier = ('twofactor' . md5(Auth::user()->name . Auth::user()->email));
            session()->put($twofactoridentifier, $twofactoridentifier);
            $this->sendNoty();
            return redirect()->route('dashboard');
        } else {
            session::flash('status', $response->message);
        }
    }

    protected static function getFacadeAccessor()
    {
        return 'Otp';
    }

    public function generate(string $identifier, int $digits = 4, int $validity = 10): object
    {
        Model::where('identifier', $identifier)->where('valid', true)->delete();

        $token = str_pad((new Helper)->generatePin(), 4, '0', STR_PAD_LEFT);

        if ($digits == 5) $token = str_pad((new Helper)->generatePin(5), 5, '0', STR_PAD_LEFT);

        if ($digits == 6) $token = str_pad((new Helper)->generatePin(6), 6, '0', STR_PAD_LEFT);

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
                'message' => 'code does not exist'
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
                        'message' => 'code Expired'
                    ];
                } else {
                    $otp->valid = false;
                    $otp->save();

                    return (object)[
                        'status' => true,
                        'message' => 'code is valid'
                    ];
                }
            } else {
                return (object)[
                    'status' => false,
                    'message' => 'code is not valid'
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
    // end of otp code

}
