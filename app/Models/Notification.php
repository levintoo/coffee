<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'userid',
        'title',
        'message',
        'status',
    ];

    protected $appends = [
        'notified_at',
        'short_notified_at',
        'short_title',
        'short_message',
    ];

    public function getShortNotifiedAtAttribute()
    {
        $this->created_at->isToday() ? $time = Carbon::parse( $this->created_at)->format('H:i') : $time = Carbon::parse( $this->created_at)->format('j F');
        return $time;
    }

    public function getNotifiedAtAttribute()
    {
        $this->created_at->isToday() ? $time = Carbon::parse( $this->created_at)->format('H:i A') : $time = Carbon::parse( $this->created_at)->format('j F');
        return $time;
    }
    public function getShortTitleAttribute()
    {
        return substr($this->message, 0, 10);
    }
    public function getShortMessageAttribute()
    {
        return substr($this->message, 0, 45);
    }
}

