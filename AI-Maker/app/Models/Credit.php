<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = ['credit', 'total_spend', 'user_id', 'fecha_hora', 'caducidad'];

    public function user()
    {
        return $this->belongsTo(User::class);
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
