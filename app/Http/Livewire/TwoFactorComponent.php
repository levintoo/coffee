<?php

namespace App\Http\Livewire;

use App\Models\Notification;
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
            return redirect()->route('dashboard');
        }
    }

    public function render()
    {
        return view('livewire.two-factor-component')->layout('layouts.guest');
    }

    public function updated($updated)
    {
        $this->validateOnly($updated, [
            'otp' => 'required|numeric|min:4',
        ]);
    }

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

    public function resendOtp()
    {
        $otp = $this->generate(Auth::user()->id);
        session()->flash('status', "$otp->token code resent");
        // sms the code
    }

    public function sendNoty()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://ip-api.com/json/');
        $response = json_decode($response->getBody());
        if ($response->status == 'success') {
            $ua = $this->getBrowser();
            $message = "Your account was just signed in from " . $ua['name'] . " on " . $ua['platform'] . " in " . $response->city . " ," . $response->country;
            Notification::create([
                'userid' => Auth::user()->userid,
                'title' => "Login Activity",
                'message' => $message,
                'status' => '0',
            ]);
        } else {
            $message = "Your account was just signed in from an unrecognized device";
            Notification::create([
                'userid' => Auth::user()->userid,
                'title' => "Login Activity",
                'message' => $message,
                'status' => '0',
            ]);
        }
    }
    public function getBrowser()
    {
        $u_agent = $_SERVER['HTTP_USER_AGENT'];
        $bname = 'Unknown';
        $platform = 'Unknown';
        $version = "";

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        } elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
            $bname = 'Internet Explorer';
            $ub = "MSIE";
        } elseif (preg_match('/Firefox/i', $u_agent)) {
            $bname = 'Mozilla Firefox';
            $ub = "Firefox";
        } elseif (preg_match('/Chrome/i', $u_agent)) {
            $bname = 'Google Chrome';
            $ub = "Chrome";
        } elseif (preg_match('/Safari/i', $u_agent)) {
            $bname = 'Apple Safari';
            $ub = "Safari";
        } elseif (preg_match('/Opera/i', $u_agent)) {
            $bname = 'Opera';
            $ub = "Opera";
        } elseif (preg_match('/Netscape/i', $u_agent)) {
            $bname = 'Netscape';
            $ub = "Netscape";
        }

        // finally get the correct version number
        $known = array('Version', $ub, 'other');
        $pattern = '#(?<browser>' . join('|', $known) .
            ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
        if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        }

        // see how many we have
        $i = count($matches['browser']);
        if ($i != 1) {
            //we will have two since we are not using 'other' argument yet
            //see if version is before or after the name
            if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
                $version = $matches['version'][0];
            } else {
                $version = $matches['version'][1];
            }
        } else {
            $version = $matches['version'][0];
        }

        // check if we have a number
        if ($version == null || $version == "") {
            $version = "?";
        }

        return array(
            'userAgent' => $u_agent,
            'name' => $bname,
            'version' => $version,
            'platform' => $platform,
            'pattern' => $pattern
        );
    }

}
