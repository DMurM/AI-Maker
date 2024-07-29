<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'credit',
        'plan_id'
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

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    // Método para crear un nuevo usuario
    public static function createUser($data)
    {
        return self::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'] ?? null, // Si 'lastname' está presente
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'credit' => $data['credit'] ?? 0, // Valor por defecto si no está presente
            'plan_id' => $data['plan_id'] ?? null, // Si 'plan_id' está presente
        ]);
    }

    // Método para validar las credenciales de inicio de sesión
    public static function validateCredentials($credentials)
    {
        return auth()->attempt($credentials);
    }
}
