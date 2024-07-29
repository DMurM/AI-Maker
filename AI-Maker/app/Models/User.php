<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'plan_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false; // Disable timestamps if not needed

    public static function createUser(array $data)
    {
        return self::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'plan_id' => $data['plan_id'], // Include the plan_id field
        ]);
    }
}