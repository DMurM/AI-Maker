<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['plan_name', 'image_lifetime', 'credit_cost'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
