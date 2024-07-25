<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['team_name', 'user_id', 'max_members', 'roles'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
