<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Wallet;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'phone' => ['required','regex:/^[0-9]+$/','min:9', 'max:10', 'unique:users'],
            'country' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string','max:2048'],
            'profession' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $userid = $this->generateID(new User(),'userid',4,'COF');
        $number = substr($data['phone'], 0, 1);
        if($number != '0')
        {
            $number = $data['phone'];
        }else{
            $number = substr($data['phone'] , -9);
        }
        $wallet = Wallet::create([
            'userid' => $userid,
            'balance' => 0,
            'prev_balance' => 0,
        ]);
        return User::create([
            'userid' => $userid,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'phone' => $number,
            'country' => $data['country'],
            'description' => $data['description'],
            'profession' => $data['profession'],
            'status' => '1',
        ]);
    }
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
}
