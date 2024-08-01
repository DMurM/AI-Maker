<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'plan_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function credits()
    {
        return $this->hasMany(Credit::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public static function createUser($data)
    {
        $data['password'] = bcrypt($data['password']);
        return self::create($data);
    }

    // Guarda el nombre completo del usuario
    public function getFullNameAttribute()
    {
        return ucwords($this->name . ' ' . $this->lastname);
    }

    public function getUserNameAttribute()
    {
        return ucfirst($this->name) . ucfirst($this->lastname);
    }
}
