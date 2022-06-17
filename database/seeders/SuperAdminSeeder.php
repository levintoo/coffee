<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userid = $this->generateID(new User(),'userid',4,'COF');
        $wallet = Wallet::create([
            'userid' => $userid,
            'balance' => 0,
            'prev_balance' => 0,
        ]);
        $user = User::create([
            'userid' => $userid,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'username' => 'admin',
            'phone' => '187115283',
            'country' => 'Kenya',
            'description' => 'brief description description',
            'profession' => 'profession',
            'status' => '1',
        ]);
        $user->assignRole('regular-user');
        return $user;

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
