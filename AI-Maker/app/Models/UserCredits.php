<?php

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserCredit extends Model
{
    protected $fillable = ['user_id', 'credits', 'total_spend', 'expires_at'];

    protected $dates = ['expires_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isExpired()
    {
        return $this->expires_at->isPast();
    }
}

