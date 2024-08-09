<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\UserCredit;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = [
        'credits',
        'total_spend',
        'expires_at'
    ];

    // Relación con el modelo User (many-to-many a través de user_credits)
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_credits')
            ->withTimestamps();
    }

    // Relación con el modelo UserCredit (one-to-many)
    public function userCredits()
    {
        return $this->hasMany(UserCredit::class);
    }

    public function hasEnoughCredits($cost)
    {
        return $this->credit >= $cost;
    }

    public function deductCredits($cost)
    {
        $this->credit -= $cost;
        $this->save();
    }
}
