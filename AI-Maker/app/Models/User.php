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
        'name', 'lastname', 'email', 'password', 'plan_id', 'profile_picture'
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

    public function activeCredit()
    {
        return $this->hasOne(Credit::class)->latest();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public static function createUser($data)
    {
        $data['password'] = bcrypt($data['password']);
        return self::create($data);
    }

    public function getFullNameAttribute()
    {
        return ucwords($this->name . ' ' . $this->lastname);
    }

    public function getUserNameAttribute()
    {
        return ucfirst($this->name) . ucfirst($this->lastname);
    }
    
    public static function adminCreateUser($data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = self::create($data);
        $user->roles()->sync($data['roles']);
        return $user;
    }

    public function updateUser($data)
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $this->update($data);
        $this->roles()->sync($data['roles']);
    }

    public function deleteUser()
    {
        $this->roles()->detach();
        $this->delete();
    }
}
