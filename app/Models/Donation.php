<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'userid',
        'transaction_id',
        'mode_of_payment',
        'amount',
        'donated_at',
        'status',
        'name',
        'message',
    ];
    protected $appends = [
        'readable_donated_at',
        'readable_amount',
    ];
    public function getReadableDonatedAtAttribute()
    {
        Carbon::parse( $this->donated_at)->isToday() ? $time= Carbon::parse( $this->donated_at)->diffForHumans() : $time = Carbon::parse( $this->donated_at)->toFormattedDateString();
        return $time;
    }
    public function getReadableAmountAttribute()
    {
        $n = $this->amount;
        $precision = 1;
        if ($n < 1000) {
            // 0 - 900
            $n_format = number_format($n, $precision);
            $suffix = '';
        } else if ($n < 999999) {
            // 0.9k-850k
            $n_format = number_format($n / 1000, $precision);
            $suffix = 'K';
        } else if ($n < 900000000) {
            // 0.9m-850m
            $n_format = number_format($n / 1000000, $precision);
            $suffix = 'M';
        } else if ($n < 900000000000) {
            // 0.9b-850b
            $n_format = number_format($n / 1000000000, $precision);
            $suffix = 'B';
        } else {
            // 0.9t+
            $n_format = number_format($n / 1000000000000, $precision);
            $suffix = 'T';
        }

        // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
        // Intentionally does not affect partials, eg "1.50" -> "1.50"
        if ( $precision > 0 ) {
            $dotzero = '.' . str_repeat( '0', $precision );
            $n_format = str_replace( $dotzero, '', $n_format );
        }

        return $n_format . $suffix;
    }
}
