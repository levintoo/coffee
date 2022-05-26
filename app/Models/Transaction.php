<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userid',
        'transaction_id',
        'purpose',
        'mode_of_payment',
        'amount',
        'transacted_at',
        'status',
        'type',
        'received_by'
    ];
    protected $appends = [
        'readable_transacted_at_time',
        'readable_transacted_at_day',
        'image',
    ];

    public function getReadableTransactedAtTimeAttribute()
    {
        $redable = Carbon::parse($this->transacted_at)->format('H:i A');
        return $redable;
    }

    public function getReadableTransactedAtDayAttribute()
    {
        $redable = Carbon::parse($this->transacted_at)->format('F j, Y');
        return $redable;
    }

    public function getimageAttribute()
    {
        if($this->mode_of_payment == 'paypal' ){
            $image = "paypal.png";
        }elseif($this->mode_of_payment == 'mpesa' ){
            $image = "mpesa.png";
        }
        return $image;
    }
}
